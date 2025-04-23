<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\blogcontroller;
use App\Http\Controllers\companycontroller;
use App\Http\Controllers\coursecontroller;
use App\Http\Controllers\Jobcontroller;
use App\Http\Controllers\employercontroller;
use App\Http\Controllers\registerController;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\usercontroller;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

// use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home');
});

// resources Method
// route::resource("/jobs", Jobcontroller::class);
route::controller(jobcontroller::class)->group(function () {
    Route::get('/jobs',  "index");
    Route::get('/job/{job}', "show");
    Route::get('/jobs/create', "create");
    Route::post('/jobs/store',  "store");
    Route::get('/jobs/edit/{job}', "edit");
    Route::patch('/jobs/update/{job}', "update");
    Route::delete('/jobs/delete/{job}', "delete");
});

// controller/Group Method
route::controller(blogcontroller::class)->group(function () {
    Route::get('/blogs',  "index");
    Route::get('/blog/{blog}', "show");
    Route::get('/blogs/create', "create");
    Route::post('/blogs/store',  "store");
    Route::get('/blogs/edit/{blog}', "edit");
    Route::patch('/blogs/update/{blog}', "update");
    Route::delete('/blogs/delete/{blog}', "delete");
});

// veiw Method
Route::get('/companies', [companycontroller::class, "index"]);
Route::get('/company/{company}', [companycontroller::class, "show"]);
Route::get('/companies/create', [companycontroller::class, "create"]);
Route::post('/companies/store', [companycontroller::class, "store"]);
Route::get('/company/edit/{company}', [companycontroller::class, "edit"]);
Route::patch('/company/update/{company}', [companycontroller::class, "update"]);
Route::delete('/company/delete/{company}', [companycontroller::class, "delete"]);

// course
Route::get('/courses', [coursecontroller::class, "index"]);
Route::get('/course/{course}', [coursecontroller::class, "show"]);
Route::get('/courses/create', [coursecontroller::class, "create"]);
Route::post('/courses/store', [coursecontroller::class, "store"]);
Route::get('/course/edit/{course}', [coursecontroller::class, "edit"]);
Route::patch('/courses/update/{course}', [coursecontroller::class, "update"]);
Route::delete('/courses/delete/{course}', [coursecontroller::class, "delete"]);

// employers
Route::get('/employers', [employercontroller::class, "index"]);
Route::get('/employer/{employer}', [employercontroller::class, "show"]);
Route::get('/employers/create', [employercontroller::class, "create"]);
Route::post('/employer/store', [employercontroller::class, "store"]);
Route::get('/employer/edit/{employer}', [employercontroller::class, "edit"]);
Route::patch('/employer/update/{employer}', [employercontroller::class, "update"]);
Route::delete('/employer/delete/{employer}', [employercontroller::class, "delete"]);

// user
route::controller(usercontroller::class)->group(function () {
    route::get("/users", "index");
});




Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('contact');
});
Route::get('/', function () {
    return view('home');
});

Route::controller(registerController::class)->group(function () {
    route::get("/register", "create");
    route::post("/register", "store");
});
Route::controller(sessionController::class)->group(function () {
    route::get("/login", "create");
    route::post("/login", "store");
});

route::get("/logout", [sessionController::class], "destroy");


Route::get('/', function () {
    return view('home');
});
