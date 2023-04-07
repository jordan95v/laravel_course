@extends('main-layout')

@section('title')
    Edit {{ $job->title }}
@endsection

@section('content')
    <div class="flex justify-center my-10">
        <div class="card w-120 border shadow-xl">
            <form method="post" class="card-body" action="/jobs/{{ $job->id }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <h2 class="text-3xl text-center pb-2">Edit a gig</h2>

                {{-- Title --}}
                <x-form-input name="title" hint="Job title" error="1" :job="$job" />

                {{-- Image --}}
                <input type="file" name="image" class="file-input w-full" />
                <label class="label pt-0">
                    <span class="label-text ">Select a new gig image if you want (below is current image)</span>
                </label>
                <img src="{{ asset('storage/' . $job->image) }}" class="rounded max-w-lg w-full pt-0 shadow-lg mb-4"
                    alt="">

                {{-- Company --}}
                <div class="grid grid-cols-2 gap-4">
                    <x-form-input name="company" hint="Company name" error="0" :job="$job" />
                    <x-form-input name="company_email" hint="Company email" error="0" :job="$job" />
                </div>
                @error('company')
                    <p class="text-red-600 ms-2">{{ $message }}</p>
                @enderror
                @error('company_email')
                    <p class="text-red-600 ms-2">{{ $message }}</p>
                @enderror

                {{-- Tags --}}
                <x-form-input name="tags" hint="Tags (comma separated ...)" error="1" :job="$job" />

                {{-- Description --}}
                <textarea rows=9 class="textarea input-bordered border-2 hover:border-purple-700" name="description"
                    placeholder="Enter the gig's description">{{ $job->description }}</textarea>
                @error('description')
                    <p class="text-red-600 ms-2">{{ $message }}</p>
                @enderror

                {{-- Confirm button --}}
                <div class="flex justify-center">
                    <button class="btn bg-purple-700 w-3/5 mt-2 hover:bg-purple-900">Update gig</button>
                </div>

            </form>
        </div>
    </div>
@endsection
