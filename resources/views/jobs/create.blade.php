@extends('main-layout')

@section('title')
    Create a job
@endsection

@section('content')
    <div class="flex justify-center my-10">
        <div class="card w-120 border shadow-xl">
            <form method="post" class="card-body" action="/jobs" enctype="multipart/form-data">
                @csrf

                <h2 class="text-3xl text-center pb-2">Create a gig</h2>

                {{-- Title --}}
                <x-form-input name="title" hint="Job title" error="1" />

                {{-- Image --}}
                <input type="file" name="image" class="file-input w-full" />
                <label class="label pt-0">
                    <span class="label-text ">Select the gig's image</span>
                </label>

                {{-- Company --}}
                <div class="grid grid-cols-2 gap-4">
                    <x-form-input name="company" hint="Company name" error="0" />
                    <x-form-input name="company_email" hint="Company email" error="0" />
                </div>
                @error('company')
                    <p class="text-red-600 ms-2">{{ $message }}</p>
                @enderror
                @error('company_email')
                    <p class="text-red-600 ms-2">{{ $message }}</p>
                @enderror

                {{-- Tags --}}
                <x-form-input name="tags" hint="Tags (comma separated ...)" error="1" />

                {{-- Description --}}
                <textarea rows=9 class="textarea input-bordered border-2 hover:border-purple-700" name="description"
                    placeholder="Enter the gig's description"></textarea>
                @error('description')
                    <p class="text-red-600 ms-2">{{ $message }}</p>
                @enderror

                {{-- Confirm button --}}
                <div class="flex justify-center">
                    <button class="btn bg-purple-700 w-3/5 mt-2 hover:bg-purple-900">Create</button>
                </div>

            </form>
        </div>
    </div>
@endsection
