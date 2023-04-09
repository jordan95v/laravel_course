<?php

use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;


// Show all
Route::get('/', [JobsController::class, "index"]);

// Manage listings
Route::get("jobs/manage", [JobsController::class, "manage"])->middleware("auth");

// Create
Route::get("jobs/create", [JobsController::class, "create"])->middleware("auth");
Route::post("jobs/", [JobsController::class, "store"])->middleware("auth");

// Update
Route::get("jobs/{job}/edit", [JobsController::class, "edit"])->middleware("auth");
Route::put("jobs/{job}", [JobsController::class, "update"])->middleware("auth");

// Destroy
Route::delete("jobs/{job}", [JobsController::class, "destroy"])->middleware("auth");

// Show single
Route::get("jobs/{job}", [JobsController::class, "show"]);
