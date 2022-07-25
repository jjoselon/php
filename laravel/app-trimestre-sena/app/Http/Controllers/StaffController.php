<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Staff;

class StaffController extends Controller
{
    public function all()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        return view('staff.index')->with('staffs', Staff::all());
    }
}
