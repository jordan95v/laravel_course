<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobsRequest;
use App\Http\Requests\UpdateJobsRequest;
use App\Models\Jobs;
use Illuminate\Http\RedirectResponse;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("jobs.index", ["jobs" => Jobs::latest()
            ->filter(request(["tags", "search"]))->simplePaginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("jobs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobsRequest $request): RedirectResponse
    {
        $form = $request->validate([
            "title" => "required",
            "company" => ["required"],
            "company_email" => ["required", "email"],
            "tags" => "required",
            "description" => "required",
        ]);

        if ($request->hasFile("image")) {
            $form["image"] = $request->file("image")->store("logos", "public");
        }

        Jobs::create($form);

        return redirect("/jobs/create")->with("success", "The job have been created :)");
    }

    /**
     * Display the specified resource.
     */
    public function show(Jobs $job)
    {
        return view("jobs.show", ["job" => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jobs $job)
    {
        return view("jobs.edit", ["job" => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobsRequest $request, Jobs $job)
    {
        $form = $request->validate([
            "title" => "required",
            "company" => ["required"],
            "company_email" => ["required", "email"],
            "tags" => "required",
            "description" => "required",
        ]);

        if ($request->hasFile("image")) {
            $form["image"] = $request->file("image")->store("logos", "public");
            unlink("storage/$job->image");
        }

        $job->update($form);

        return redirect("/jobs/$job->id")->with("success", "The job have been updated :)");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobs $job)
    {
        $job->delete();
        return redirect("/")->with("success", "The job have been deleted :(");
    }
}
