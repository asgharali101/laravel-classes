<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;


class userController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user', [
            "users" => $users,
        ]);
    }
}
