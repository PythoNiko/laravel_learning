<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller{
    public function home(){
        return view('welcome', [
            'title' => 'Laravel'
        ]);
    }

    public function about(){
        return view('about', [
            'title' => 'About'
        ]);
    }

    public function contact(){
        return view('contact', [
            'title' => 'Contact'
        ]);
    }

    public function test(){
        return view('test', [
            'title' => 'Test'
        ]);
    }

    public function multiplier($numone, $numtwo){
        return $numone * $numtwo;
    }
}
