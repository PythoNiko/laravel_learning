<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $tests = Test::all();
        return view("/tests", compact('tests'));
    }

    public function create(){
        return view("/tests");
    }

    public function store(){
        $test = new Test();

        $test->test_name = request('test_name');
        $test->test_description = request('test_description');

        $test->save();

        return redirect('/tests');
    }
}
