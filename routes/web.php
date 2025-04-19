<?php

use App\Http\Controllers\blogcontroller;
use App\Http\Controllers\companycontroller;
use App\Http\Controllers\coursecontroller;
use App\Http\Controllers\Jobcontroller;
use App\Http\Controllers\employercontroller;

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

// use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home');
});

// resources Method
route::resource("/jobs", Jobcontroller::class);


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


Route::get('/courses', [coursecontroller::class, "index"]);
Route::get('/course/{course}', [coursecontroller::class, "show"]);
Route::get('/courses/create', [coursecontroller::class, "create"]);
Route::post('/courses/store', [coursecontroller::class, "store"]);
Route::get('/course/edit/{course}', [coursecontroller::class, "edit"]);
Route::patch('/courses/update/{course}', [coursecontroller::class, "update"]);
Route::delete('/courses/delete/{course}', [coursecontroller::class, "delete"]);


Route::get('/employers', [employercontroller::class, "index"]);
Route::get('/employer/{employer}', [employercontroller::class, "show"]);
Route::get('/employers/create', [employercontroller::class, "create"]);
Route::post('/employer/store', [employercontroller::class, "store"]);
Route::get('/employer/edit/{employer}', [employercontroller::class, "edit"]);
Route::patch('/employer/update/{employer}', [employercontroller::class, "update"]);
Route::delete('/employer/delete/{employer}', [employercontroller::class, "delete"]);





Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('contact');
});
Route::get('/', function () {
    return view('home');
});




Route::get('/form', function () {
    return view('form');
});

Route::post('/form', function () {
    $validation = request()->validate([
        "name" => "required|min:5|max:20",
        "email" => "required|email|min:10|max:30",
        "password" => "required|min:8|max:30",
        "conform_password" => "required|same:password",
        "profile_image" => "required|mimes:png,jpg,jpeg|image|max:2048",
    ]);

    $path = request()->file("profile_image")->store("images", "public");
    // dd($validation["name"]);
    $data = [
        ...request()->all(),
        "profile_image" => $path,
    ];

    session()->put("user_form", $data);



    // dd(session("user_form.profile_image"));
    return view('form', compact('alldata'));
    // return redirect("/form");
});
