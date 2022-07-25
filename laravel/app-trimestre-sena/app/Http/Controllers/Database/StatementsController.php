<?php

namespace App\Http\Controllers\Database;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class StatementsController extends Controller
{
    /**
     * Run a select sql statement.
     * @see https://laravel.com/docs/5.8/database#running-queries
     * @return View with an simple string
     */
     /*
    public function select()
    {
        $users = DB::select('select * from user');

        return view('database.select', ['users' => $users]);
    }*/

    public function index()
    {
        return view('database.index');
    }

    public function runningRawSQLQueries(Request $request)
    {
        switch ($request->input('article'))
        {
            //case ''
        }
    }


}
