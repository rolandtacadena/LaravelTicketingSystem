<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Initial page for admin
     */
    public function admin()
    {
        return 'admin';
    }

    /**
     * User profile
     */
    public function profile()
    {

    }

    /**
     * User settings
     */
    public function settings()
    {

    }
}
