<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhpController extends Controller
{
    public function index(){

        $static_keyword = "Any method declared as static is accessible without the creation of an object.";

        return view("php",
            compact('static_keyword'));
    }
}
