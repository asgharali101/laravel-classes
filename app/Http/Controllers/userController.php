<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;


class userController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('user', [
            "users" => $users,
        ]);
    }
}
