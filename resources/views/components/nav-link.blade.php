@props(['active'])

@php
    $classes = ($active ?? false)
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-purple text-sm font-bold leading-5 text-purple focus:outline-none focus:border-purple transition duration-150 ease-in-out'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm leading-5 text-black font-bold hover:text-purple hover:border-purple/50 focus:outline-none focus:text-purple focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>