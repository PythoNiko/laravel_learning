<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
            'title' => 'Test',
            'name' => 'Niko'
        ]);
    }

    public static function multiplier($a, $b){
        return $c = $a * $b;
    }

    public static function name_printer($name){
        return "My name is: " . $name;
    }

    public static function data_type_printer(){
        $myString = "This is a string";
        $myInt = 123;
        $myFloat = 1.23;
        $myArray = array( 1, 2.3, "Test", array(1, 2, 3), True);
        $myBool = True;
        $myNull = NULL;

        echo "<br>";
        echo "String: " . $myString . "<br>";
        echo "Integer: " . $myInt . "<br>";
        echo "Float: " . $myFloat . "<br>";
        echo "Array: " . var_dump($myArray) . "<br>";
        echo "Boolean: " . $myBool . "<br>";
        echo "Null: " . $myNull . "<br>";
    }
}
