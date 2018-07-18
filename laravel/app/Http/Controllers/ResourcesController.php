<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Event;

class ResourcesController extends Controller
{

    // General purpose function for displaying views
    public function view(Request $request)
    {
        return view('pages/resources/' . $request->path());
    }


}
