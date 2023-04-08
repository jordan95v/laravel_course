@extends('main-layout')

@section('title')
    Register
@endsection

@section('content')
    <div class="flex justify-center my-10">
        <div class="card shadow-xl">
            <form action="/users" method="post" class="card-body">
                @csrf
                <h2 class="card-title flex justify-center text-2xl pb-2">Register now !</h2>

                <x-form-input name="name" type="text" hint="Enter you username" error="1" />
                <x-form-input name="email" type="email" hint="Enter your email" error="1" />
                <div class="grid md:grid-cols-2 grid-cols-1 gap-2">
                    <x-form-input name="password" type="password" hint="Enter your password" error="0" />
                    <x-form-input name="password_confirmation" type="password" hint="Confirm your password"
                        error="0" />
                </div>
                @error('password')
                    <p class="text-red-600 ms-2">{{ $message }}</p>
                @enderror

                <p class="text-sm">By creating an account, i agree to jogig's
                    <a href="#" class="link hover:text-purple-700">condition of use</a> and
                    <a href="#" class="link hover:text-purple-700">privacy policy</a>.
                </p>
                <button class="btn mt-4 bg-purple-700 hover:bg-purple-900">Create an account</button>

                <div class="divider"></div>
                <p class="text-center">
                    Already have an account ?
                    <a href="/login" class="link hover:text-purple-700">Log in</a>
                </p>
            </form>
        </div>
    </div>
@endsection
