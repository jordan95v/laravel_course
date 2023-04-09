@extends('main-layout')

@section('title')
    {{ $job->title }}
@endsection

@section('content')
    <div class="flex h-screen">
        <div class="max-w-lg m-auto mt-4">
            <x-job-card :job=$job />

            @auth
                {{-- Edit and Delete button --}}
                <div class="flex grid grid-cols-2 gap-4 justify-center mt-10">
                    <a href="/jobs/{{ $job->id }}/edit" class="text-center">
                        <button class="btn bg-purple-700 w-full">
                            <i class="fa-solid fa-pen me-2"></i>Edit
                        </button>
                    </a>

                    <!-- Open delete modal -->
                    <label for="delete-modal" class="btn btn-error"><i class="fa-solid fa-trash me-2"></i>Delete gig</label>
                </div>
            @endauth

            {{-- Return main link --}}
            <div class="flex justify-center mt-4">
                <a class="hover:text-purple-700 link" href="/">Return to listing</a>
            </div>
        </div>
    </div>

    @auth
        <!-- Delete modal -->
        <input type="checkbox" id="delete-modal" class="modal-toggle" />
        <div class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <form action="/jobs/{{ $job->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <label for="delete-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                    <h3 class="font-bold text-lg mb-4">Are you sure you wanna delete this gig ?</h3>

                    <div class="flex justify-center">
                        <button class="btn btn-error w-3/5"><i class="fa-solid fa-trash me-2"></i>Delete gig</button>
                    </div>
                </form>
            </div>
        </div>
    @endauth
@endsection
