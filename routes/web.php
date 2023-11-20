<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;
// use App\Models\News;

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

// Route::get("about", function () {
//     return "Welcome, You Are In About Page.";
// });

// Route::get("contactus", function () {
//     return "Welcome, You Are In Contact Us Page.";
// });

// Route::prefix("support")->group(function (){
//     Route::get("/", function () {
//         return "Welcome, You Are In Support Page.";
//     });

//     Route::get("chat", function () {
//         return "Welcome, You Are In Chat Page.";
//     });
    
//     Route::get("call", function () {
//         return "Welcome, You Are In Call Page.";
//     });

//     Route::get("ticket", function () {
//         return "Welcome, You Are In Ticket Page.";
//     });
// });

// Route::prefix("training")->group(function () {
//     Route::get("/", function () {
//         return "Welcome, You Are In Training Page.";
//     });
    
//     Route::get("hr", function () {
//         return "Welcome, You Are In HR Page.";
//     });

//     Route::get("ict", function () {
//         return "Welcome, You Are In ICT Page.";
//     });

//     Route::get("marketing", function () {
//         return "Welcome, You Are In Marketing Page.";
//     });

//     Route::get("logistics", function () {
//         return "Welcome, You Are In Logistics Page.";
//     });
// });

// Route::fallback(function () {
//     return redirect("/");
// });

// Route::get("cv", function () {
//     return view("cv");
// });

// Route::get("login", function () {
//     return view("login");
// });

// Route::post("recieve", function () {
//     return "Recieved Data";
// })->name("recieve");

// Route::get("test1",[ExampleController::class, "test1"]);

// Route::get("addCarForm",[ExampleController::class, "addCarForm"]);

// Route::post("carInfo",[ExampleController::class, "showCarInfo"])->name("carInfo");

// Route::get("addcar",[CarController::class, "store"])->name("carInfo");

// Route::get("addcar",[CarController::class, "store"]);

// Route::post("carInfo",[CarController::class, "store"])->name("carInfo");

Route::get("addNews",[NewsController::class, "create"]);

Route::post("newsInfo",[NewsController::class, "store"])->name("newsInfo");