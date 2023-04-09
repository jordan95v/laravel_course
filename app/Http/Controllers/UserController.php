<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.register");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form = $request->validate([
            "name" => ["required", "min:4",  Rule::unique("users", "name")],
            "email" => ["required", "email", Rule::unique("users", "email")],
            "password" => ["required", "confirmed", "min:6"]
        ]);

        $form["password"] = bcrypt($form["password"]);
        User::create($form);
        return redirect("/")->with("success", "User account have been succefully created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if (auth()->user()->id != $user->id) {
            return redirect("/")->with("error", "You cannot do that");
        }
        return view('users.edit', ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if (auth()->user()->id != $user->id) {
            return redirect("/")->with("error", "You are not allowed to do this");
        }

        $form = $request->validate([
            "name" => "required|unique:users,name,$user->id",
            "email" => "required|unique:users,email,$user->id",
        ]);


        if ($request["password"] != null) {
            $request->validate([
                "password" => "confirmed|min:6"
            ]);
            $form["password"] = bcrypt($request["password"]);
        }
        $user->update($form);
        return redirect("/users/$user->id/edit")->with("success", "You succefully edited your profile");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function showLogin()
    {
        return view("users.login");
    }

    public function login(Request $request)
    {
        $form = $request->validate([
            "email" => ["required", "email"],
            "password" => "required"
        ]);

        if (auth()->attempt($form)) {
            $request->session()->regenerate();
            return redirect("/")->with("success", "You have succefully logged in :)");
        }
        return back()->with("error", "Invalid credentials");
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/")->with("success", "You have successfully logged out");
    }
}
