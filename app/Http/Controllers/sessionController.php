<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class sessionController extends Controller
{
    public function create()
    {
        return view("auth.login");
    }
    public function store()
    {
        $validated = Request()->validate([
            "email" => "required|email|unique:users,email",
            "password" => "required",
        ]);

        if (! Auth::attempt($validated)) {
            throw ValidationException::withMessages([
                "email" => "Sorry, your credentails do not match",
            ]);
        }


        request()->session()->regenerate();

        return redirect("/");
        return view("auth.login");
    }

    public function destroy()
    {
        Auth::logout();
        return redirect("/");
    }
}
