<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("about", function () {
    return "Welcome, You Are In About Page.";
});

Route::get("contactus", function () {
    return "Welcome, You Are In Contact Us Page.";
});

Route::prefix("support")->group(function (){
    Route::get("/", function () {
        return "Welcome, You Are In Support Page.";
    });

    Route::get("chat", function () {
        return "Welcome, You Are In Chat Page.";
    });
    
    Route::get("call", function () {
        return "Welcome, You Are In Call Page.";
    });

    Route::get("ticket", function () {
        return "Welcome, You Are In Ticket Page.";
    });
});

Route::prefix("training")->group(function () {
    Route::get("/", function () {
        return "Welcome, You Are In Training Page.";
    });
    
    Route::get("hr", function () {
        return "Welcome, You Are In HR Page.";
    });

    Route::get("ict", function () {
        return "Welcome, You Are In ICT Page.";
    });

    Route::get("marketing", function () {
        return "Welcome, You Are In Marketing Page.";
    });

    Route::get("logistics", function () {
        return "Welcome, You Are In Logistics Page.";
    });
});
