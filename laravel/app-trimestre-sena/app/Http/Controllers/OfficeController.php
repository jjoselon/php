<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Office;

class OfficeController extends Controller
{
    // public function index()
    // {
    //     return view('office.index')->with('offices', Office::all());
    // }

    public function createnew()
    {
        $office = new Office();
        $office->officeCode = $_POST['codigo'];
        $office->city = $_POST['ciudad'];
        $office->phone = $_POST['telefono'];
        $office->addressLine1 = $_POST['direccion'];
        $office->country = $_POST['pais'];
        $office->postalCode = $_POST['postal'];
        $office->territory = $_POST['territorio'];

        $office->save();
        echo  "guardado";
    }

    public function formCreate()
    {
        return view('office.new');
    }
}
