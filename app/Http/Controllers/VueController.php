<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class VueController extends Controller
{
    public function index(){
        return view("vue");
    }
}
