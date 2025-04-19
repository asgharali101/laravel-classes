<?php

namespace App\Http\Controllers;

use App\Models\blog;

use Illuminate\Auth\Events\Validated;

class blogcontroller extends Controller
{
    public function index()
    {
        $blogs = blog::latest()->paginate(6);
        return view('blogs.index', [
            "blogs" => $blogs,
        ]);
    }

    public function show(blog $blog)
    {

        return view(
            "blogs.show",
            [
                "blog" => $blog
            ]
        );
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store()
    {
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
    }

    public function edit(blog $blog)
    {
        return view('blogs.edit', [
            "blog" => $blog,
        ]);
    }

    public function update(blog $blog)
    {
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
    }

    public function delete(blog $blog)
    {
        $blog->delete();
        return redirect("/blogs");
    }
}
