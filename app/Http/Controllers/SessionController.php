<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SessionController extends Controller {
    public function accessSessionData(Request $request) {
        if($request->session()->has('my_name'))
            echo $request->session()->get('my_name');
        else
            echo 'No data in the session';
    }
    public function storeSessionData(Request $request) {
        $request->session()->put('my_name', 'niko');
        echo "Data has been added to session";
    }
    public function deleteSessionData(Request $request) {
        $request->session()->forget('my_name');
        echo "Data has been removed from session.";
    }
    public function sessionHandler(Request $request) {
        $request->session()->put('name', 'Niko');
        $request->session()->put('works', 'SilverBullet');

        if($request->session()->has('name') && $request->session()->has('works')){
            $user_name = $request->session()->get('name');
            $user_works = $request->session()->get('works');
        } else{
            echo 'No data in the session';
        }

        return view("/sessionForm", compact(
            'user_name',
            'user_works'
        ));
    }
}
