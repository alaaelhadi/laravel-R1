<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\HomeController;
use App\Models\Place;

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

// Route::get("test", function () {
//     return "Welcome to my first route";
// });

// Route::get("user/{name}/{age?}", function ($name, $age=NULL){
//     $msg = "Hello " . $name;
//     if(isset($age)){
//         $msg .=  " your age is " . $age;
//     }
//     return $msg;
// })->where(["name" => "[a-zA-Z0-9]+", "age" => "[0-9]+"]); //whereNumber(["age"]) //whereAlpha(["name"]) //whereIn("name" ,["Alaa", "Mohamed"])

// Route::prefix("product")->group(function () {
//     Route::get("/", function () {
//         return "Welcome, you are in product page";
//     });
//     Route::get("laptop", function () {
//         return "Welcome, you are in laptop page";
//     });
//     Route::get("camera", function () {
//         return "Welcome, you are in camera page";
//     });
//     Route::get("projector", function () {
//         return "Welcome, you are in projector page";
//     });
// });

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

Route::get("place",[ExampleController::class, "place"]);

Route::get("blog",[ExampleController::class, "blog"]);

// Cars section
Route::get("addcar",[CarController::class, "create"]);

Route::post("carInfo",[CarController::class, "store"])->name("carInfo");

Route::get("cars",[CarController::class, "index"]);

Route::get('editCar/{id}',[CarController::class, 'edit']);

Route::put('updateCar/{id}',[CarController::class, 'update'])->name('updateCar');

Route::get('carDetail/{id}',[CarController::class, 'show']);

Route::get('deleteCar/{id}',[CarController::class, 'destroy']);

Route::get('trashed',[CarController::class, 'trashed']);

Route::get('restoreCar/{id}',[CarController::class, 'restore']);

Route::get('finalDelete/{id}',[CarController::class, 'delete']);

// News section
// Route::get("addNews",[NewsController::class, "create"]);

// Route::post("newsInfo",[NewsController::class, "store"])->name("newsInfo");

// Route::get('news',[NewsController::class, 'index']);

// Route::get('editNews/{id}',[NewsController::class, 'edit']);

// Route::put('updateNews/{id}',[NewsController::class, 'update'])->name('updateNews');

// Route::get('newsDetail/{id}',[NewsController::class, 'show']);

// Route::get('deleteNews/{id}',[NewsController::class, 'destroy']);

// Route::get('trashedNews',[NewsController::class, 'trashedNews']);

// Route::get('restoreNews/{id}',[NewsController::class, 'restoreNews']);

// Route::get('finalDeleteOfNews/{id}',[NewsController::class, 'finalDeleteOfNews']);

// Posts section
// Route::get('addposts',[PostController::class, 'create']);

// Route::post('showposts',[PostController::class, 'store'])->name('showPosts');

// Route::get('posts',[PostController::class, 'index']);

// Route::get('postDetail/{id}',[PostController::class, 'show']);

// Route::get('editPost/{id}',[PostController::class, 'edit']);

// Route::put('updatePost/{id}',[PostController::class, 'update'])->name('updatePost');

// Route::get('deletePost/{id}',[PostController::class, 'destroy']);

// Route::get('trashedPosts',[PostController::class, 'trashedPosts']);

// Route::get('restorePost/{id}',[PostController::class, 'restorePost']);

// Route::get('finalDeletePost/{id}',[PostController::class, 'finalDeletePost']);

// Uploading Files
Route::get("showUpload",[ExampleController::class, "showUpload"]);

Route::post("upload",[ExampleController::class, "upload"])->name('upload');

// Places section
Route::get("addPlaces",[PlaceController::class, "create"]);

Route::post('showPlaces',[PlaceController::class, 'store'])->name('showPlaces');

Route::get("placesList",[PlaceController::class, "index"]);

Route::get("place",[PlaceController::class, "placeMainPage"]);

Route::get('placeDetail/{id}',[PlaceController::class, 'show']);

Route::get('editPlace/{id}',[PlaceController::class, 'edit']);

Route::put('updatePlace/{id}',[PlaceController::class, 'update'])->name('updatePlace');

Route::get('deletePlace/{id}',[PlaceController::class, 'destroy']);

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('contact', [HomeController::class, 'showContact']);

Route::post('contact', [HomeController::class, 'contact_mail'])->name('contact');