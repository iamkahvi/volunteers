<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\UserUpload;
use App\Events\UserRegistered;
use App\Http\Requests\UserRequest;
use App\Events\FileChanged;
use App\Models\Role;
use App\Models\UserRole;

class AdminController extends Controller
{
    // All profile functions require admin authentication
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('bindings');
    }

    // Create a new user
    public function create(UserRequest $request)
    {
        // Create user based on post input
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        // Is this the first user?
        if($user->id == 1)
        {
            UserRole::assign($user, 'admin');
        }
        else
        {
            // Otherwise assign to volunteer role by default
            UserRole::assign($user, 'volunteer');
        }

        // Send notification emails
        event(new UserRegistered($user));

        $request->session()->flash('success', ['title' => 'The account has been registered!', 'message' => "Before the user can sign up for volunteer shifts, they must enter their full name in the profile section page. All other fields are optional."]);

        $users = User::latest()->get();
        $userroles = UserRole::latest()->get();
        $roles = Role::get();
        return view('pages/admin/user-list', compact('users', 'userroles', 'roles'));
    }

    // List of users
    function userList()
    {
        $users = User::latest()->get();
        $userroles = UserRole::latest()->get();
        $roles = Role::get();

        return view('pages/admin/user-list', compact('users', 'userroles', 'roles'));
    }

    // View an indivual user profile
    function userProfile(User $user)
    {
        $roles = Role::get();
        $roleNames = [];

        foreach($roles as $role)
        {
            $roleNames[$role->name] = $role->name;
        }

        return view('pages/admin/user-profile', compact('user', 'roleNames'));
    }

    // Update information about a user
    function userEdit(User $user, Request $request)
    {
        $roles = $request->get('roles');

        if($roles)
        {
            UserRole::clear($user);
            UserRole::assign($user, $roles);
        }

        return;
    }

    // List of uploaded files
    function uploadList()
    {
        $uploads = UserUpload::latest()->get();
        return view('pages/admin/upload-list', compact('uploads'));
    }

    // Update information about an uploaded file
    function uploadEdit(UserUpload $upload, Request $request)
    {
        $upload->status = $request->get('status');
        $upload->save();

        // A map of statuses to user roles
        $statusMap =
        [
            'approved-medical' => 'medical',
            'approved-fire' => 'fire',
            'approved-ranger' => 'ranger'
        ];

        // If an admin sets an uploaded document to be approved
        if(isset($statusMap[$upload->status]))
        {
            // Assign them to their approved role
            UserRole::assign($upload->user, $statusMap[$upload->status]);
        }

        event(new FileChanged($upload));

        return;
    }

    // General purpose function for displaying views
    public function view(Request $request)
    {
        return view('pages/' . $request->path());
    }

    public function delete($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();

        $users = User::latest()->get();
        return view('pages/admin/user-list', compact('users'));
    }
}
