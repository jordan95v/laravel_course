@extends('main-layout')

@section('title')
    Login
@endsection

@section('content')
    <div class="flex justify-center my-10">
        <div class="card shadow-xl">
            <form action="/login" method="post" class="card-body">
                @csrf
                <h2 class="card-title flex justify-center text-2xl pb-2">Log in</h2>

                <x-form-input name="email" type="email" hint="Enter your email" error="1" />
                <x-form-input name="password" type="password" hint="Enter your password" error="1" />

                <button class="btn mt-4 bg-purple-700 hover:bg-purple-900">Login</button>

                <div class="divider"></div>
                <p class="text-center">
                    Don't have an account ?
                    <a href="/register" class="link hover:text-purple-700">Create an account</a>
                </p>
            </form>
        </div>
    </div>
@endsection
