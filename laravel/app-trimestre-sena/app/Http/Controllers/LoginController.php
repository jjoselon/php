<?php

namespace App\Http\Controllers;

// Illuminate se refiere a todo el framework de laravel
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; # Codificar la contraseña
use Illuminate\Support\Facades\Validator; # Validador de datos de entrada
use App\User; # necesario para registrar el usuario

class LoginController extends Controller
{
    /**
     * Muestra formulario login
     */
    public function init()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $rules = array(
            'email' => 'required',
            'password' => 'required'
        );
        if (($v = Validator::make($_POST, $rules /*,$messages*/))->fails()) {
            return redirect('login')->withErrors($v);
        } else {
            if(!Auth::attempt($request->only('email', 'password')))
            {
                return redirect('login')->with('error', 'Usuario o contraseña incorrectos');
            }
            return redirect('films');
        }

        // var_dump($request->input('password'));
        // var_dump($request->only('password', 'username'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');

    }

    public function signIn() {
        if (!Auth::check()) {
            return redirect('login');
        }
        return view('login.new');
    }

    public function register(Request $request) {

        $rules = array(
            'name' => 'required',
            // 'lastname' => 'required',
            'email' => 'required',
            'username' => 'required|unique:staff,username',
            // validación archivo
            'photo' => 'required|image'
        );
        $messages = array(
            'required' => 'Nombre completo'
        );

        if (($v = Validator::make($request->all(), $rules ,$messages))->fails()) {
            return redirect('singin')->withErrors($v);
        }
        $employee = new User;
        $employee->first_name = $request->input('name');
        $employee->last_name = $request->input('lastname');
        $employee->email = $request->input('email');
        $employee->username = $request->input('username');
        $employee->password = Hash::make($request->input('password'));
        $employee->picture = $request->file('photo')->getClientOriginalName();
        # claves foraneas
        $employee->address_id = 1;
        $employee->store_id = 1;
        $employee->active = 1;

        $employee->save();

        # Guarda archivo
        // $request->file('photo')->store('images/staff'); # Primera forma
        $request->file('photo')->storeas('images/staff', $request->file('photo')->getClientOriginalName());

        return redirect('login')->with('saved', 'Employee saved!');

    }
}
