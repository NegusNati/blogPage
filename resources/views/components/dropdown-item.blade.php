@props(['active' => false])

@php
    $classes = "block text-left px-3 text-sm leading-7 hover:bg-blue-300 focus:bg-blue-300 hover:text-white focus:text-white rounded-xl ";

    if($active) $classes .= "bg-blue-300 text-white";
@endphp

<a {{ $attributes(['class' => $classes ])}}>
    {{$slot}}</a>