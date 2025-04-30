<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;

class companycontroller extends Controller
{
    public function index()
    {
        $companies = company::with('employer')->latest()->paginate(6);
        return view('companies.index', [
            "companies" => $companies,
        ]);
    }

    public function show(company $company)
    {
        return view(
            "companies.show",
            [
                "company" => $company
            ]
        );
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store()
    {
        $companies = request()->validate([
            "name" => "required|min:10|max:30",
            "description" => "required|min:10|max:300",
        ]);

        company::create([
            'name' => $companies["name"],
            'description' => $companies["description"],
            'employers_id' => 1,
        ]);

        return redirect("companies");
        return view('companies.create');
    }

    public function edit(company $company)
    {
        if (Auth::guest()) {
            return redirect("/login");
        }

        if ($company->employer->user_id !== (Auth::user())) {
            return redirect("/companies");
        }

        return view('companies.edit', [
            "company" => $company,
        ]);
    }

    public function update(company $company)
    {
        $validation = request()->validate([
            "name" => "required|min:10|max:30",
            "description" => "required|min:10|max:300",
        ]);
        $company->update([
            ...$validation,
            "employers_id" => $company["employers_id"],
        ]);
        return redirect("companies");
        return view('companies.edit');
    }

    public function delete(company $company)
    {
        $company->delete();
        return redirect("/companies");
    }
}
