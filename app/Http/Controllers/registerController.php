<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Auth\Events\Validated;
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
            "first_name" => "required|min:10|max:40",
            "last_name" => "required|min:10|max:40",
            "email" => "required|email|unique:users,email|min:10|max:50",
            "password" => "required|min:10|max:100",
            "confirm_password" => "required|same:password|min:10|max:50",

        ]);
        unset($validated['confirm_password']);

        $user = User::create($validated);
        Auth::login($user);
        return redirect("/");
        return view("auth.register");
    }
}
