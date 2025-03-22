
@props(['active','new'])

@php
$activeClasses = ($active ?? false)
            ? 'border-gray-400 border-l-2 rounded-l-none border-l-3 font-bold text-black  dark:text-gray-400 ' 
            : ' dark:text-gray-200 font-medium text-zinc-600 ';
@endphp

<a {{$attributes->merge(['class'=>'group w-full flex items-center flex items-center gap-2  py-1 text-base font-medium  rounded-md hover:text-gray-900 dark:hover:text-gray-300 px-3 hover:bg-gray-50 dark:hover:bg-gray-800 '.$activeClasses])}} >
{{$slot}}

@isset ($new)
    
<span class="inline flex items-center border dark:border-gray-500 p-1 rounded-md justify-center font-medium text-xs max-h-fit px-1.5 bg-linear-to-r from-blue-500 to-[#CD3BF6]  text-transparent bg-clip-text">
    New
</span>

@endisset
</a>