<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;


class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show()
    {
        if (View::exists('user.profilee')) {
          return view('user.profilee', ['user' => '88']);  
        } 
        return view('user.profile', ['user' => '88']);
    }
}
