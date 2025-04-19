<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Jobs;

$jobs = [
    [
        "id" => 1,
        "title" => "Programmer",
        "sallary" => "50k",
    ],
    [
        "id" => 2,
        "title" => "Content writter",
        "sallary" => "20k",
    ],
    [
        "id" => 3,
        "title" => "News Ankar",
        "sallary" => "10k",
    ],
];

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () use ($jobs) {
    return view('jobs', [
        "jobs" => $jobs,
    ]);
});

Route::get('/job/{id}', function ($id) use ($jobs) {
    $jobs = Arr::first($jobs, fn($jobs) => $jobs["id"] == $id);
    return view('job', ["job" => $jobs]);
});

// Route::get('/jobs/{id}', function ($id) {
//     $jobs = [
//         [
//             "id" => 1,
//             "title" => "Programmer",
//             "sallary" => "50k",
//         ],
//         [
//             "id" => 2,
//             "title" => "Content writter",
//             "sallary" => "50k",
//         ],
//         [
//             "id" => 3,
//             "title" => "News Ankar",
//             "sallary" => "50k",
//         ],
//     ];
//     $jobs = Arr::first($jobs, fn($jobs) => $jobs["id"] == $id);
//     return view('job', ["job" => $jobs]);
// });

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});




Route::get('/form', function (Request $request) {
    return view('form');
});

Route::post('/form', function (Request $request) {
    $validation = $request->validate([
        "name" => "required|min:5|max:20",
        "email" => "required|email|min:10|max:30",
        "password" => "required|min:8|max:30",
        "conform_password" => "required|same:password",
        "profile_image" => "required|mimes:png,jpg,jpeg|image|max:2048",
    ]);

    $path = $request->file("profile_image")->store("images", "public");
    // dd($validation["name"]);
    $data = [
        ...$request->all(),
        "profile_image" => $path,
    ];

    session()->put("user_form", $data);



    // dd(session("user_form.profile_image"));
    return view('form', compact('alldata'));
    // return redirect("/form");
});


// Route::get('/form', function (Request $request) {
//     session()->put("user_form", $request->all());
//     if (empty($request->input("name"))) {
//         $request->validate("required");
//         redirect("/form");
//     }
//     return view('form');
// });


// Route::get('/form', function (Request $request) {
//     if (! empty($request->input("name"))) {
//         dd($request->all());
//         return redirect("/form");
//     }
//     return view('form');
// });


// Route::get('/form', function (Request $request) {
//     if (empty($request->input("name"))) {
//         $request->validate("required");
//     }
//     $request->validate([
//         "name" => "required|min:5|max:10",
//     ]);
//     return redirect("/form");
//     return view('form');
// });




// Route::post('/register', function (Request $request) {
//     $request->validate([
//         'name' => 'required|min:3|max:100',
//         'email' => 'required|email:rfc,dns',
//         'password' => 'required|min:8',
//         'password_confirmation' => 'required|same:password',
//         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//     ]);

//     $filePath = $request->file('image')->store('images');

//     dd($filePath);

//     $userData = [
//         ...$request->all(),
//         'image' => $filePath,
//     ];

//     session()->put('user_data_two', $userData);

//     return redirect('/register');
// });
