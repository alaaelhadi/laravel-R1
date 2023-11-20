<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    // public function test1() {
    //     return view("login");
    // }

    public function addCarForm() {
        return view("addCar");
    }

    public function showCarInfo(Request $request) {
        $title = $request->input("title");
        $price = $request->input("price");
        $description = $request->input('description');
        echo "The title of the car is => " . $title . ".<br>";
        echo "The price of the car is => " . $price . ".<br>";
        echo "The description of the car is => " . $description . ".<br>";
        $published = $request->input("remember");
        if($published){
            echo "This car is published.";
        }else{
            echo "This car is not published.";
        }
    }
    
}
