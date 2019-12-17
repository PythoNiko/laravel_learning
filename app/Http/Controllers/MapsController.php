<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function index(){
        return view("maps");
    }
}
