@extends('main-layout')

@section('title')
    Manage gigs
@endsection

@section('content')
    <div class="flex justify-center my-10">
        <div class="card w-1/2 shadow-xl">
            <div class="card-body">
                <p class="card-title flex justify-center mb-4">Jobs listing</p>

                <table class="table table-normal w-full text-center">
                    <thead>
                        <tr>
                            <th>Job id</th>
                            <th>Title</th>
                            <th>Company</th>
                            <th>Company email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $job)
                            <tr>
                                <th>{{ $job->id }}</th>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->company }}</td>
                                <td>{{ $job->company_email }}</td>
                                <td>
                                    <a href="/jobs/{{ $job->id }}/edit">
                                        <button class="btn bg-purple-700 hover:bg-purple-900">
                                            <i class="fa-solid fa-trash me-2"></i>Edit
                                        </button>
                                    </a>
                                    <!-- Open delete modal -->
                                    <label for="delete-modal-{{ $job->id }}" class="btn btn-error"><i
                                            class="fa-solid fa-trash me-2"></i>Delete gig</label>

                                    <!-- Delete modal -->
                                    <input type="checkbox" id="delete-modal-{{ $job->id }}" class="modal-toggle" />
                                    <div class="modal modal-bottom sm:modal-middle">
                                        <div class="modal-box">
                                            <form action="/jobs/{{ $job->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <label for="delete-modal-{{ $job->id }}"
                                                    class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                                <h3 class="font-bold text-lg mb-4">Are you sure you wanna delete this gig ?
                                                </h3>

                                                <div class="flex justify-center">
                                                    <button class="btn btn-error w-3/5"><i
                                                            class="fa-solid fa-trash me-2"></i>Delete gig</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
