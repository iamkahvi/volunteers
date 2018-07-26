<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Shift;
use App\Models\Schedule;
use App\Models\Slot;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\DB;


class slotTaken extends Notification
{

    protected $slot;
    protected $volunteer;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Slot $slot, User $volunteer)
    {
        $this->slot = $slot;
        $this->volunteer = $volunteer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        // Get the shift object
        $schedules = Schedule::get()->where('id', '=', $this->slot->schedule_id);
        foreach ($schedules as $schedule)
        {
           if (Shift::get()->where('id', '=', $schedule->shift_id)->isEmpty())
           {

           } else
           {
               $theShift = Shift::get()->where('id', '=', $schedule->shift_id)->first();
           }
        }

        return (new MailMessage)
                    ->subject($this->volunteer->name.' has signed up for a shift')
                    ->greeting($this->volunteer->name.' has signed up for '.$theShift->name)
                    ->line('The program: '.$this->slot->getEventAttribute()->name)
                    ->line('The department: '.$this->slot->getDepartmentAttribute()->name)
                    ->action('View Shift',env('SITE_URL').'/slot/'.$this->slot->id.'/view');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
