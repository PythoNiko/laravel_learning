<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PagesController extends Controller{
    public function home(){
        return view('welcome', [
            'title'         => 'Laravel',
            'purpose'       => 'Testing Ground',
            'projectTitle'  => 'Adminpanel to manage companies'
        ]);
    }

    public function about(){
        return view('about', [
            'title' => 'About'
        ]);
    }

    public function test(){
        return view('test', [
            'title' => 'Test',
            'name' => 'Niko'
        ]);
    }
    public function test2(){
        return view('test2', [
            'title' => 'Test 2',
            'name' => 'Docho'
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
