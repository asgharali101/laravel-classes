<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sessionController extends Controller
{
    public function create()
    {
        return view("auth.login");
    }
    // public function store()
    // {
    //     return view("auth.login");
    // }
}
