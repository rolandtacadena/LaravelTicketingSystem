<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Initial page for admin
     */
    public function show_profile()
    {

        return view('user.profile');
    }

    /**
     * User settings
     */
    public function settings()
    {

    }
}
