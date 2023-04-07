@props(['name', 'hint', 'error', 'job'])

@php
    if (isset($job)) {
        $value = $job[$name];
    } else {
        $value = old($name);
    }
@endphp

<input type="text" name="{{ $name }}" placeholder="{{ $hint }}"
    class="input input-bordered border-2 w-full hover:border-purple-700" value="{{ $value }}" />

@if ($error == '1')
    @error($name)
        <p class="text-red-600 ms-2">{{ $message }}</p>
    @enderror
@endif
