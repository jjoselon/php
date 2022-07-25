<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetRequestsController extends Controller
{
    public function request()
    {
        return ["hola", "mundo", "OK" => 1];
    }
}