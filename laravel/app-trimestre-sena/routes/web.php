<?php

use App\Office;
use App\Employee;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
  return view('welcome');
})
->name('welcome');

Route::get('/profile', function () {
  return 'profiles ' . route('welcome');
});

Route::get('user', 'UserController@show');
Route::get('contact', 'Homepage\ContactController@show');

Route::view('/gretting', 'gretting', ['name' => 'José']);


# Resources Controllers

Route::resource('photos', 'PhotoController');
//Route::redirect('/', 'gretting');


# Validation
# https://laravel.com/docs/5.8/validation#validation-quickstart
Route::get('post/create', 'Posts\PostController@create'); // show form

Route::post('post', 'Posts\PostController@store'); // store blog post in the database


# AJAX Example

Route::get('ajax/example', 'Ajax\GetRequestsController@request');


# Databases

Route::get('office/form-create', 'OfficeController@formCreate');
Route::post('office/createnew', 'OfficeController@createnew');
Route::get('staff/show-all', 'StaffController@all');

Route::get('employees', function () {

    return view('employees')->with('employees',
        Employee::select('lastName', 'firstName', 'email')->where('jobTitle', '=', 'Sales Rep')->where('officeCode', '=', 2)->get()
    );
});

Route::get('select', function () {
    // RAW
    $oficinas = Illuminate\Support\Facades\DB::select("SELECT * FROM offices");
    // Eloquent ORM
    $oficinas2 = Office::all();

    $oficinas3 = Office::select('city')->where('city', '=', 'Boston')->get();

    // return view('offices');
    echo "<pre>";
    var_dump($oficinas3);
    echo "</pre>";
});

Route::get('database/mysql', 'Database\StatementsController@runningRawSQLQueries')
->name('running-a-select-query');

Route::get('database/mysql', 'Database\StatementsController@runningRawSQLQueries')
->name('using-named-bindings');

Route::get('database/index', 'Database\StatementsController@index');

# Autenticación

Route::get('password', function () {
    $empleado = App\User::find(1);
    $empleado->password = Hash::make("123");
    $empleado->save();
    // var_dump($empleado);
});

Route::get('login', 'LoginController@init');
Route::post('login', 'LoginController@login');

Route::get('films', 'FilmController@all');
Route::post('logout', 'LoginController@logout');
Route::get('singin', 'LoginController@signIn');
Route::post('register', 'LoginController@register');
