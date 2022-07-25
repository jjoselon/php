<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;

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
        return view('user.profile', ['user' => '88']);
    }
}
