<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Film;

class FilmController extends Controller
{
    public function all()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        return view('film.index')->with('films', Film::paginate(5));
        return view('film.index')->with('films', Film::all());
    }
}
