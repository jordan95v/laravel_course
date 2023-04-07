@props(['job'])

@php
    $tags = explode(',', $job->tags);
@endphp


<div class="card w-full shadow-xl">
    <a href="/jobs/{{ $job->id }}">
        <img src="{{ $job->image ? asset('storage/' . $job->image) : asset('images/code.jpg') }}" class="rounded"
            alt="">
    </a>

    <div class="card-body">
        <a href="/jobs/{{ $job->id }}" class="text-3xl hover:text-purple-700">{{ $job->title }}</a>
        <div>
            <b>{{ $job->company }}</b> - <a href="mailto:{{ $job->company_email }}"
                class="italic text-purple-700">{{ $job->company_email }}</a>
        </div>
        <div class="mb-5">
            @foreach ($tags as $tag)
                <a href="/?tags={{ $tag }}">
                    <button class="btn">{{ $tag }}</button>
                </a>
            @endforeach
        </div>
        <p class="text-justify pt-4">{{ $job->description }}</p>
    </div>
</div>
