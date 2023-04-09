@extends('main-layout')

@section('title')
    Edit user
@endsection

@section('content')
    <div class="flex justify-center my-10">
        <div class="card shadow-xl">
            <form action="/users/{{ $user->id }}" method="post" class="card-body">
                @csrf
                @method('put')
                <h2 class="card-title flex justify-center text-2xl pb-2">Register now !</h2>

                <x-form-input name="name" type="text" hint="Chnage your username" error="1" :target="$user" />
                <x-form-input name="email" type="email" hint="Enter your email" error="1" :target="$user" />
                <div class="grid md:grid-cols-2 grid-cols-1 gap-2">
                    <x-form-input name="password" type="password" hint="Enter your password" error="0" />
                    <x-form-input name="password_confirmation" type="password" hint="Confirm your password"
                        error="0" />
                </div>
                @error('password')
                    <p class="text-red-600 ms-2">{{ $message }}</p>
                @enderror

                <button class="btn mt-4 bg-purple-700 hover:bg-purple-900">Update my account</button>
                <div class="divider"></div>
                <p class="text-center">Forgot your password ? <a href="" class="link">Click here</a></p>

            </form>
        </div>
    </div>
@endsection
