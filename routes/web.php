<?php

use App\Http\Controllers\JobsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Show all
Route::get('/', [JobsController::class, "index"]);

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

// Create user
Route::get("/register", [UserController::class, "create"])->middleware("guest");
Route::post("/users", [UserController::class, "store"]);

// Update user
Route::get("/users/{user}/edit", [UserController::class, "edit"])->middleware("auth");
Route::put("/users/{user}", [UserController::class, "update"])->middleware("auth");
Route::delete("/users/{user}", [UserController::class, "destroy"])->middleware("auth");

// Login / Logout
Route::get("/login", [UserController::class, "showLogin"])->name("login")->middleware("guest");
Route::post("/login", [UserController::class, "login"]);
Route::get("/logout", [UserController::class, "logout"])->middleware("auth");
