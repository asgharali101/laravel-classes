<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Auth\Events\Validated;


class coursecontroller extends Controller
{
    public function index()
    {
        $courses = Course::latest()->simplepaginate(4);
        return view('courses.index', [
            "courses" => $courses,
        ]);
    }

    public function show(course $course)
    {
        return view(
            "courses.show",
            [
                "course" => $course
            ]
        );
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store()
    {
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
    }

    public function edit(course $course)
    {
        return view('courses.edit', [
            "course" => $course,
        ]);
    }

    public function update(course $course)
    {
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
    }

    public function delete(course $course)
    {
        $course->delete();
        return redirect("/courses");
    }
}
