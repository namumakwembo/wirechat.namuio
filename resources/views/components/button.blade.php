
@props(['color' => 'default', 'shadow' => 'md', 'tag' => 'button'])

@php
    // Define color variations console
    $colors = [
        'danger'  => 'border-red-500 dark:text-red-500   shadow-red-500 dark:shadow-red-800',
        'warning' => 'border-yellow-500 text-yellow-600 shadow-yellow-500 dark:shadow-yellow-800',
        'primary' => 'border-teal-500 text-teal-600 shadow-teal-500 dark:shadow-teal-800',
        'default' => 'border-zinc-700   dark:text-white text-slate-800 shadow-slate-500 dark:shadow-black',
    ];
    $selectedColor = $colors[$color] ?? $colors['default'];

    // Define shadow variations for padding, width, and shadow values
    $sizes = [
        'sm' => ['padding' => 'p-1', 'shadow' => 'shadow-[3px_3px_0] hover:shadow-[1px_1px_0]', 'translate' => 'hover:translate-y-[1px]'],
        'md' => ['padding' => 'p-2', 'shadow' => 'shadow-[5px_5px_0] hover:shadow-[2px_3px_0]', 'translate' => 'hover:translate-y-[2px]'],
        'lg' => ['padding' => 'p-3', 'shadow' => 'shadow-[7px_7px_0] hover:shadow-[3px_4px_0]', 'translate' => 'hover:translate-y-[3px]'],
        'xl' => ['padding' => 'p-4', 'shadow' => 'shadow-[9px_9px_0] hover:shadow-[4px_5px_0]', 'translate' => 'hover:translate-y-[4px]'],
    ];
    $selectedSize = $sizes[$shadow] ?? $sizes['md'];

    // Merge final classes
    $baseClasses = "relative  rounded-md transition-all duration-200";
    $finalClasses = "{$baseClasses} {$selectedSize['padding']}  border {$selectedColor} {$selectedSize['shadow']} {$selectedSize['translate']}";
@endphp

<{{$tag}} {{$attributes->merge(['class' => $finalClasses])}}>
    {{ $slot }}
</{{$tag}}>


{{-- @props(['color' => null ,'tag'=>'button'])

@if ($color == 'danger')
    <{{$tag}} {{$attributes->merge(['class'=>"relative w-36 border border-red-500 bg-white dark:bg-gray-900 text-red-500 p-2 rounded-md 
         shadow-[5px_5px_0_rgb(220,38,38,1)]   dark:shadow-[5px_5px_0_rgb(185,68,68,1)]  transition-all duration-200 
        hover:shadow-[2px_3px_0_rgb(15,23,42,1)] dark:hover:shadow-[2px_3px_0_rgb(203,213,225,1)]  hover:translate-y-[2px]"])}}>
        {{ $slot }}
    </{{$tag}}>
@elseif ($color == 'warning')
    <{{$tag}} {{$attributes->merge(['class'=>"relative w-36 border border-yellow-500 bg-white dark:bg-gray-900 dark:text-white/90 p-2 rounded-md 
        shadow-[5px_5px_0_rgb(15,23,42,1)] dark:shadow-[5px_5px_0_rgb(51,65,85,100)] transition-all duration-200 
        hover:shadow-[2px_3px_0_rgb(15,23,42,1)] dark:hover:shadow-[2px_3px_0_rgb(203,213,225,1)] hover:translate-y-[2px]"])}}>
        {{ $slot }}
    </{{$tag}}>
@elseif ($color == 'primary')
    <{{$tag}} {{$attributes->merge(['class'=>"relative w-36 border border-teal-500 bg-white dark:bg-gray-900 text-teal-600  p-2 rounded-md 
        shadow-[5px_5px_0_rgb(15,23,42,1)] dark:shadow-[5px_5px_0_rgb(51,65,85,100)] transition-all duration-200 
        hover:shadow-[2px_3px_0_rgb(15,23,42,1)] dark:hover:shadow-[2px_3px_0_rgb(203,213,225,1)] hover:translate-y-[2px]"])}}>
        {{ $slot }}
    </{{$tag}}>
@else
    <{{$tag}} {{$attributes->merge(['class'=>"relative w-36 border border-slate-800 bg-white dark:bg-gray-900 dark:text-white/90 p-2 rounded-md 
        shadow-[5px_5px_0_rgb(15,23,42,1)] dark:shadow-[5px_5px_0_rgb(51,65,85,100)] transition-all duration-200 
        hover:shadow-[2px_3px_0_rgb(15,23,42,1)] dark:hover:shadow-[2px_3px_0_rgb(203,213,225,1)] hover:translate-y-[2px]"])}}>
        {{ $slot }}
    </{{$tag}}>
@endif
 --}}


{{-- <{{$tag}} class="relative border  w-36 border-slate-800 dark:border-slate-700  bg-white dark:bg-gray-900 dark:text-white/90 p-2  rounded-md shadow-[5px_5px_0_rgb(15,23,42,1)] dark:shadow-[5px_5px_0_rgb(51,65,85,100)] transition-all duration-200 hover:shadow-[2px_3px_0_rgb(15,23,42,1)] dark:hover:shadow-[2px_3px_0_rgb(203,213,225,1)] hover:translate-y-[2px]">
  {{ $slot }}
</{{$tag}}> --}}


{{-- <div class="w-36">
    <div class="relative rounded-md  h-9 w-full bg-slate-800">
      <{{$tag}} class="w-53 rounded-md   absolute -left-1 -top-1 flex h-full w-full items-center justify-center gap-3 border border-slate-800 bg-slate-50 dark:border-slate-700 dark:bg-gray-900 dark:text-white p-2 text-base transition-all duration-200 hover:-left-0 hover:-top-0 hover:bg-slate-100 dark:hover:bg-slate-700  lg:cursor-pointer">
        {{ $slot }}
      </{{$tag}}>
    </div>
  </div> --}}

  {{-- <{{$tag}} class="relative border w-36 border-slate-800 bg-slate-50 dark:border-slate-700 dark:bg-gray-900 dark:text-white rounded-md    bg-white  text-base  p-2 px-3 items-center justify-cente shadow-[5px_7px_0_rgb(15,23,42,1)] transition-shadow duration-200 hover:shadow-none">
    {{ $slot }}
</{{$tag}}> --}}