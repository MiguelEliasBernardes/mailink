@props([
    'post' => null,
    'delete' => null,
    'put' => null,
    'flat' => false
])

@php

    $method = ($post or $delete or $put) ? 'POST' : 'GET';

@endphp

<form {{ $attributes->class(["w-full flex flex-col justify-center items-center"]) }} enctype="multipart/form-data" method="{{ $method }}">

    @if ($method != 'GET')
        @csrf
    @endif

    @if ($put)
        @method('PUT')
    @endif

    @if ($delete)
        @method('DELETE')
    @endif


    {{ $slot }}

</form>
