<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;

use App\Models\employers;
use Illuminate\Support\Facades\Auth;

class employercontroller extends Controller
{
    public function index()
    {
        $employers = employers::latest()->paginate(5);
        return view(
            'employers.index',
            [
                "employers" => $employers
            ]
        );
    }

    public function show(employers $employer)
    {
        return view(
            "employers.show",
            [
                "employer" => $employer
            ]
        );
    }

    public function create()
    {
        return view('employers.create');
    }

    public function store()
    {
        $employers = request()->validate([
            'name' => "required|min:10|max:30",
        ]);
        employers::create(
            $employers,
        );
        return redirect("employers");
        return view('employers.create');
    }

    public function edit(employers $employer)
    {
        if (Auth::guest()) {
            redirect("/login");
        }

        if ($employer->user_id !== (Auth::user())) {
            abort(403);
        }

        return view('employers.edit', [
            "employer" => $employer,
        ]);
    }

    public function update(employers $employer)
    {
        $validation = request()->validate([
            'name' => "required|min:10|max:30",
        ]);
        $employer->update($validation);
        return redirect("employers");
        return view('employers.edit');
    }

    public function delete(employers $employer)
    {
        $employer->delete();
        return redirect("/employers");
    }
}
