<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller {

    public function sessionHandler(Request $request) {

        // Add data to the session put(key, val)
        session()->put('name', 'Niko');
        session()->put('works', 'SilverBullet');
        Session::put('age', 28);

        // Difference between using facade and Laravel Helper Methods - Dev's own preference
        $all = Session::all(); // facade
        $all = session()->all(); // Laravel Helpers

        // random check and adding session vals to variables
        if($request->session()->has('name') && $request->session()->has('works')){
            $user_name = $request->session()->get('name');
            $user_works = $request->session()->get('works');
            $age = Session::get('age');
        } else{
            echo 'No data in the session';
        }

        // passing these session vals to the view
        return view("/sessionForm", compact(
            'user_name',
            'user_works',
            'age'
        ));
    }
}
