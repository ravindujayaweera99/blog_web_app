@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-purple focus:ring-purple focus:bg-purple/5 rounded-md shadow-sm text-purple font-bold']) !!}>