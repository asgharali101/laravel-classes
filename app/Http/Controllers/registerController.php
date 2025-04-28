<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class registerController extends Controller
{
    public function create()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "first_name" => "required|min:5|max:30",
            "last_name" => "required|min:5|max:30",
            "email" => "required|email|unique:users,email|min:10|max:30",
            "password" => "required|min:8|max:50",
            "confirm_password" => "required|min:8|max:50|same:password"

        ]);
        $user = User::create($validated);
        Auth::login($user);

        return redirect("/");
        return view("auth.register");
    }
}
