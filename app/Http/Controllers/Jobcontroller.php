<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;

class Jobcontroller extends Controller
{
    public function index()
    {
        $jobs = Job::with("employer")->latest()->paginate(6);

        return view('jobs.index', [
            "jobs" => $jobs,
        ]);
    }


    public function create()
    {
        return view('jobs.create');
    }


    public function store()
    {
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
    }



    public function show(Job $job)
    {

        return view(
            "jobs.show",
            [
                "job" => $job
            ]
        );
    }




    public function edit(Job $job)
    {
        if (Auth::guest()) {
            return redirect("/login");
        }

        if ($job->employer->user_id !== (Auth::User())) {
            return redirect("/jobs");
        }
        return view('jobs.edit', [
            "job" => $job,
        ]);
    }

    public function update(Job $job)
    {
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
    }

    public function delete(Job $job)
    {
        $job->delete();
        return redirect("/jobs");
    }
}
