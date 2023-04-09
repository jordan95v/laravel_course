<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
