@props([
    'post' => null,
    'delete' => null,
    'put' => null,
    'patch' => null,
    'flat' => false
])

@php

    $method = ($post or $delete or $put or $patch) ? 'POST' : 'GET';

@endphp

<form {{ $attributes->class(["w-full flex flex-col justify-center items-center"]) }} enctype="multipart/form-data" method="{{ $method }}">

    @if ($method != 'GET')
        @csrf
    @endif

    @if ($patch)
        @method('PATCH')
    @endif

    @if ($put)
        @method('PUT')
    @endif

    @if ($delete)
        @method('DELETE')
    @endif


    {{ $slot }}

</form>
