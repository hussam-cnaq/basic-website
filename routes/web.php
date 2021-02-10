<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view("about");
});

Route::get('/search', function(){
    $valueReceived = request("id");
    return view('search', ["productId" => $valueReceived]);
});

Route::get('/users/{name}', function($name){
    $statuses = ["Zainab" => "Student", "Mr. X" => "Instructor"];
    if (!array_key_exists($name, $statuses)) {
        abort(404);
    }

    return view('users', ["userName" => $name, "userStatus" => $statuses[$name]]);
});

Route::get('/course/{code}', [CoursesController::class, 'findCourseCredit']);