
@props(['active'])

@php
$activeClasses = ($active ?? false)
            ? 'border-blue-500 border-l rounded-l-none border-l-3 font-bold text-blue-500  ' 
            : ' text-gray-500 dark:text-gray-200';
@endphp

<a {{$attributes->merge(['class'=>'group w-full flex items-center  py-2  font-medium rounded-md hover:text-gray-900 dark:hover:text-gray-300 px-3 hover:bg-gray-50 dark:hover:bg-gray-800 '.$activeClasses])}} >
{{$slot}}
</a>