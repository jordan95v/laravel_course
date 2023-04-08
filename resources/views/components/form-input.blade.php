@props(['name', 'type', 'hint', 'error', 'target'])

@php
    if (isset($target)) {
        $value = $target[$name];
    } else {
        $value = old($name);
    }
@endphp

<input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $hint }}"
    class="input input-bordered border-2 w-full hover:border-purple-700" value="{{ $value }}" />

@if ($error == '1')
    @error($name)
        <p class="text-red-600 ms-2">{{ $message }}</p>
    @enderror
@endif
