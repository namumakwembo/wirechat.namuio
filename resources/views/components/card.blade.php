@props(['shadow' => 'md'])

@php
    $customShadows = [
        'sm' => 'shadow-[2px_3px_0]',
        'md' => 'shadow-[5px_7px_0]',
        'lg' => 'shadow-[8px_10px_0]',
        'xl' => 'shadow-[12px_15px_0]'
    ];
    $shadowClass = $customShadows[$shadow] ?? $customShadows['md'];
@endphp

<div {{$attributes->merge(['class'=>"border-2 border-zinc-800 bg-white  transition ease-in-out dark:text-white dark:bg-zinc-700/70 $shadowClass  shadow-black"])}}>
    {{$slot}}
</div>
