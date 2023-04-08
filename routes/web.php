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
Route::get("jobs/create", [JobsController::class, "create"]);
Route::post("jobs/", [JobsController::class, "store"]);

// Update
Route::get("jobs/{job}/edit", [JobsController::class, "edit"]);
Route::put("jobs/{job}", [JobsController::class, "update"]);

// Destroy
Route::delete("jobs/{job}", [JobsController::class, "destroy"]);

// Show single
Route::get("jobs/{job}", [JobsController::class, "show"]);

// Create user
Route::get("/register", [UserController::class, "create"]);
Route::post("/users", [UserController::class, "store"]);

// Login / Logout
Route::get("/login", [UserController::class, "showLogin"]);
Route::post("/login", [UserController::class, "login"]);
Route::get("/logout", [UserController::class, "logout"]);
