<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\SlotRequest;
use App\Models\Slot;
use App\Models\User;
use App\Models\UserRole;

use Illuminate\Support\Facades\Auth;

use App\Events\SlotChanged;
use Carbon\Carbon;

use App\Notifications\slotTaken;
use App\Notifications\slotReleased;
use Illuminate\Notification\Notifications;

class SlotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('bindings');
    }

    // Helper function to determine if an event has passed
    private function eventHasPassed(Slot $slot)
    {
        $start_date = new Carbon($slot->start_date);
        $start_time = new Carbon($slot->start_time);

        if($start_date->subDays(3)->gte(Carbon::today()))
        {
            if($start_time->gt(Carbon::today()))
            {
                return false;
            }
        }

        return true;
    }

    // Helper function to determine allowed roles
    private function userAllowed(Slot $slot)
    {
        $user = Auth::user();
        $slotRoles = $slot->schedule->getRoles();
        $allowed = false;

        // Check each allowed role to see if the user has permission
        foreach($slotRoles as $slotRole)
        {
            if($user->hasRole($slotRole->role->name))
            {
                $allowed = true;
            }
        }

        return $allowed;
    }

    // Page to view slots
    public function view(Request $request, Slot $slot)
    {
        if(is_null(Auth::user()->data) or empty(Auth::user()->data->full_name))
        {
            $request->session()->flash('error', "You must enter your name before you can sign up for shifts.");
            return redirect('/profile/data/edit');
        }

        return view('pages/slot/view', compact('slot'));
    }

    // Add yourself to an existing slot
    public function take(SlotRequest $request, Slot $slot)
    {
        // Error handling
        if($slot->schedule->password)
        {
            // TODO: Succeptable to timing attacks? lol
            if($request->get('password') != $slot->schedule->password)
            {
                $request->session()->flash('error', 'The password you entered is incorrect. Please contact your department lead to make sure you have the right password.');
                return redirect()->back();
            }
        }
        else
        {
            if(!$this->userAllowed($slot))
            {
                $request->session()->flash('error', 'This shift is only available to certain user groups, your account must be approved by an administrator before signing up.');
                return redirect()->back();
            }
        }

        if($this->eventHasPassed($slot))
        {
            $request->session()->flash('error', 'This shift is starting soon or has already started, you are no longer able to sign up for shifts online.');
            return redirect()->back();
        }

        // Has somebody else already taken this slot?
        if(is_null($slot->user))
        {
            $slot->user_id = Auth::user()->id;
            $slot->save();

            event(new SlotChanged($slot, ['status' => 'taken', 'name' => Auth::user()->name]));
            $request->session()->flash('success', 'You signed up for a volunteer shift.');

            // Send notification to administrator
            $volunteer = Auth::user();

            $user = User::get()->where('name', '=', 'LovingSpoonful')->first();
            $user->notify(new slotTaken($slot, $volunteer));

            // If a password was used
            if($slot->schedule->password)
            {
                // Assign the user to any roles this shift requires
                $roles = [];

                foreach($slot->schedule->getRoles() as $role)
                {
                    $roles[] = $role->role->name;
                }

                UserRole::assign(Auth::user(), $roles);
            }
        }
        else
        {
            $request->session()->flash('error', 'This slot has already been taken by someone else.');
        }

        return redirect('/event/' . $slot->event->id);
    }

    // Remove yourself from a slot
    public function release(Request $request, Slot $slot)
    {
        if(!$this->userAllowed($slot))
        {
            $request->session()->flash('error', 'This shift is only available to certain user groups, your account must be approved by an administrator before signing up.');
        }
        else
        {
            if($this->eventHasPassed($slot))
            {
                $request->session()->flash('error', 'This shift is happening too soon. Please contact administrator to release shift.');
            }
            else
            {
                if(!is_null($slot->user) && $slot->user->id === Auth::user()->id)
                {
                    $slot->user_id = null;
                    $slot->save();

                    event(new SlotChanged($slot, ['status' => 'released']));
                    $request->session()->flash('success', 'You are no longer volunteering for your shift.');

                    // Send notification to administrator
                    $volunteer = Auth::user();

                    $user = User::get()->where('name', '=', 'LovingSpoonful')->first();
                    $user->notify(new slotReleased($slot, $volunteer));

                }
                else
                {
                    $request->session()->flash('error', 'You are not currently scheduled to volunteer for this shift.');
                }
            }
        }

        return redirect('/event/' . $slot->event->id);
    }
}
