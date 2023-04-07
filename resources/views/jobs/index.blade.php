@extends('main-layout')

@section('title')
    Home
@endsection

@section('content')
    <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 p-5">
        @foreach ($jobs as $job)
            <x-job-card :job=$job />
        @endforeach
    </div>
    <div class="p-10">
        {{ $jobs->links() }}
    </div>
@endsection
