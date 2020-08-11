<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SessionsController extends Controller {

    public function index(Request $request){

        // Add data to the session put(key, val)
        session()->put('name', 'Niko');
        session()->put('works', 'SilverBullet');
        Session::put('age', 28);
        Session::put('testString', 'This is my test string');

        // Difference between using facade and Laravel Helper Methods - Dev's own preference
        $all = Session::all(); // facade
        $all = session()->all(); // Laravel Helpers

        // random check and adding session vals to variables
        if($request->session()->has('name') && $request->session()->has('works')){
            $user_name = $request->session()->get('name');
            $user_works = $request->session()->get('works');
            $age = Session::get('age');
            $testString = Session::get('testString');
        } else {
            echo 'No data in the session';
        }

//        if ($request->input('testButton')) {
//            session()->forget('testString');
//            return redirect()->to(route('sessions.sessions'));
//        }

        // passing these session vals to the view
        return view("sessions.sessions", compact(
            'user_name',
            'user_works',
            'age',
            'testString'
        ));
    }
}
