<?php

namespace libronet\Http\Controllers;

use Illuminate\Http\Request;

class Controllerhome extends Controller
{
    //

    public function index(){

        return view('inicio');

    }

}
