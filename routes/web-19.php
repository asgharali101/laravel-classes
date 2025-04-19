<?php

use App\Models\blog;
use App\Models\company;
use App\Models\Course;
use App\Models\employers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Arr;
use App\Models\Job;
use Illuminate\Auth\Events\Validated;

Route::get('/', function () {
    return view('home');
});

//  index
Route::get('/blogs', function () {
    $blogs = blog::latest()->paginate(6);
    return view('blogs.index', [
        "blogs" => $blogs,
    ]);
});

//  show
Route::get('/blog/{blog}', function (Blog $blog) {
    return view('blogs.show', [
        "blog" => $blog,
    ]);
});

// create
Route::get('/blogs/create', function () {
    return view('blogs.create');
});




// store
Route::post('/blogs/create', function () {
    $validation = request()->validate([
        "title" => "required|min:10|max:40",
        "excerpt" => "required|min:10|max:300",
        "description" => "required|min:10|max:300",
        "feature_image" => "image|mimes:png,jpg,jpeg|max:2048",
        "video_path" => "file|mimes:mp4,wpem|max:50120",
    ]);
    $imagePath = request()->file("feature_image")->store("images", "public");
    $videoPath = request()->file("video_path")->store("videos", "public");


    Blog::create([
        ...$validation,
        "feature_image" => $imagePath,
        "video_path" => $videoPath,
    ]);
    return redirect("blogs");
    return view('blogs.create');
});

// edit
Route::get('/blogs/edit/{blog}', function (blog $blog) {
    // $blog = blog::findOrFail($id);
    return view('blogs.edit', [
        "blog" => $blog,
    ]);
});
// toupdate
Route::patch('/blogs/edit/{blog}', function (blog  $blog) {
    // $blog = blog::find($id);
    $validation = request()->validate([
        "title" => "required|min:10|max:30",
        "excerpt" => "required|min:10|max:200",
        "description" => "required|min:10|max:300",
        "feature_image" => "image|mimes:png,jpg,jpeg|max:2048",
        "video_path" => "file|mimes:mp4,wpem|max:2048",
    ]);

    $imagePath = request()->file("feature_image")->store("images", "public");
    $videoPath = request()->file("video_path")->store("videos", "public");

    $blog->update([
        ...$validation,
        "feature_image" => $imagePath,
        "video_path" => $videoPath,
    ]);
    return redirect("/blogs");
    return view('blogs.edit');
});

// delete
Route::delete('/blogs/delete/{blog}', function (blog $blog) {
    $blog->delete($blog);
    return redirect("/blogs");
});


Route::get('/companies', function () {
    $companies = company::with('employer')->latest()->paginate(6);
    return view('companies.index', [
        "companies" => $companies,
    ]);
});




Route::post('/companies/create', function () {
    $companies = request()->validate([
        "name" => "required|min:10|max:30",
        "description" => "required|min:10|max:300",
    ]);
    company::create([
        'name' => $companies["name"],
        'description' => $companies["description"],
        'employers_id' => 1,
    ]);
    return redirect("companies");
    return view('companies.create');
});

Route::get('/company/edit/{company}', function ($company) {
    // $company = company::findOrFail($id);
    return view('companies.edit', [
        "company" => $company,
    ]);
});

// show company
// show company 
Route::get('/company/{company}', function (Company $company) {
    // $company = company::findOrFail($id);
    return view('companies.show', [
        "company" => $company,
    ]);
});

Route::patch('/company/edit/{company}', function (company $company) {
    $validation = request()->validate([
        "name" => "required|min:10|max:30",
        "description" => "required|min:10|max:300",
    ]);
    $company->update([
        ...$validation,
        "employers_id" => $company["employers_id"],
    ]);
    return redirect("companies");
    return view('companies.edit');
});

Route::delete('/company/delete/{company}', function (company $company) {

    $company->delete($company);
    return redirect("companies");
});



Route::get('/courses', function () {
    $courses = Course::latest()->simplepaginate(4);
    return view('courses.index', [
        "courses" => $courses,
    ]);
});
Route::get('/courses/create', function () {
    return view('courses.create');
});

Route::post('/courses/create', function () {
    request()->validate([
        "title" => "required|min:10|max:30",
        "image_path" => "mimes:png,jpg,jpeg|image|max:2048",
        "body" => "required|min:10|max:300",
    ]);
    $path = request()->file("image_path")->store("images", "public");

    Course::create(
        [
            ...request()->all(),
            "image_path" => $path,

        ]
    );
    return redirect("courses");
    return view('courses.create');
});

Route::get('/course/edit/{course}', function (course $course) {

    return view('courses.edit', [
        "course" => $course,
    ]);
});

Route::delete('/courses/delete/{course}', function (Course $course) {
    $course->delete();
    return redirect("/courses");
    // return view('courses.delete');
});

Route::post('/courses/edit/{course}', function (course $course) {
    $validation = request()->validate([
        "title" => "required|min:10|max:30",
        "image_path" => "image|mimes:png,jpg,jpeg|max:2048",
        "body" => "required|min:10|max:300",
    ]);
    $path = request()->file("image_path")->store("images", "public");

    $course->update([
        ...$validation,
        "image_path" => $path,
    ]);

    return redirect("courses");
    return view('courses.edit');
});


Route::get('/course/{course}', function (Course $course) {
    return view('courses.show', [
        "course" => $course,
    ]);
});

Route::get('/employers', function () {
    $employers = employers::latest()->paginate(5);
    return view(
        'employers.index',
        [
            "employers" => $employers
        ]
    );
});

Route::post('/employers/create', function () {
    $employers = request()->validate([
        'name' => "required|min:10|max:30",
    ]);
    employers::create([
        $employers,
    ]);
    return redirect("employers");
    return view('employers.create');
});

Route::get('/employers/create', function () {
    return view('employers.create');
});


Route::get('/employer/edit/{employer}', function (employers $employer) {
    // $employers = employers::findOrFail($id);
    return view('employers.edit', [
        "employer" => $employer
    ]);
});
Route::post('/employer/edit/{employer}', function (Employers $employer) {
    // $employers = employers::findOrFail($id);
    $validation = request()->validate([
        'name' => "required|min:10|max:30",
    ]);
    $employer->update($validation);
    return redirect("employers");
    return view('employers.edit');
});

Route::delete('/employer/delete/{employer}', function (employers $employer) {

    $employer->delete($employer);
    return redirect("employers");
});




Route::get('/employer/{employer}', function (Employers $employer) {
    return view('employers.show', [
        'employer' => $employer
    ]);
});

Route::get('/jobs', function () {
    $jobs = Job::with("employer")->latest()->paginate(6);

    return view('jobs.index', [
        "jobs" => $jobs,
    ]);
});

Route::get('/job/create', function () {
    return view('jobs.create');
});

Route::post('/job/create', function () {
    $jobs = request()->validate([
        "title" => "required|min:10|max:30|",
        "sallary" => "required|min:3|max:15",
    ]);

    Job::create([
        "title" => $jobs["title"],
        "sallary" => $jobs["sallary"],
        "employers_id" => 5,
    ]);
    return  redirect("jobs");
    return view('jobs.create');
});

Route::get('/job/edit/{job}', function (Job $job) {
    return view('jobs.edit', [
        "job" => $job,
    ]);
});

Route::post('/job/edit/{job}', function (Job $job) {
    $jobs = request()->validate([
        "title" => "required|min:10|max:30",
        "sallary" => "required|min:3|max:15",
    ]);
    $job->update([
        ...request()->all(),
        "employers_id" => $job["employers_id"],
    ]);
    return redirect("/jobs");
    return view('jobs.edit');
});
Route::delete('/job/delete/{job}', function (Job $job) {
    $job = job::findOrFail($id);

    $job->delete();
    return redirect("/jobs");
});

Route::get('/job/{job}', function (Job $job) {
    // $job = job::findOrFail($id);
    return view('jobs.show', ["job" => $job]);
});

// Route::get('/jobs', function () {
//     return view('jobs', [
//         "jobs" => Job::all(),
//     ]);
// });

// Route::get('/job/{id}', function ($id) {
//     $jobs = Job::findOrFail($id);
//     return view('job', ["job" => $jobs]);
// });

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


// Route::get('/form', function (Request request()) {
//     session()->put("user_form", request()->all());
//     if (empty(request()->input("name"))) {
//         request()->validate("required");
//         redirect("/form");
//     }
//     return view('form');
// });


// Route::get('/form', function (Request request()) {
//     if (! empty(request()->input("name"))) {
//         dd(request()->all());
//         return redirect("/form");
//     }
//     return view('form');
// });


// Route::get('/form', function (Request request()) {
//     if (empty(request()->input("name"))) {
//         request()->validate("required");
//     }
//     request()->validate([
//         "name" => "required|min:5|max:10",
//     ]);
//     return redirect("/form");
//     return view('form');
// });




// Route::post('/register', function (Request request()) {
//     request()->validate([
//         'name' => 'required|min:3|max:100',
//         'email' => 'required|email:rfc,dns',
//         'password' => 'required|min:8',
//         'password_confirmation' => 'required|same:password',
//         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//     ]);

//     $filePath = request()->file('image')->store('images');

//     dd($filePath);

//     $userData = [
//         ...request()->all(),
//         'image' => $filePath,
//     ];

//     session()->put('user_data_two', $userData);

//     return redirect('/register');
// });
