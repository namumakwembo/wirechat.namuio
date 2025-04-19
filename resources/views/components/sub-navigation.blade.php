{{-- @props(['items'=>[]])

<nav class="flex flex-col gap-3" x-data> 

<h5 class="font-medium dark:text-gray-400 dark:font-normal">On This page</h5>

<ul class="flex flex-col gap-3">

    @foreach ($items as $item)
    <li class=" dark:text-gray-200  text-gray-700 hover-text-blue-500"><a class="font-normal" x-scroll-item="{target:'{{str()->slug($item)}}',group:'default'}"  href="#{{str()->slug($item)}}">{{$item}}</a></li>
    @endforeach
</ul>


</nav>
 --}}


@props(['items' => []])

<nav class="flex flex-col gap-3" x-data> 
    <h5 class="font-bold dark:text-gray-400 text-slate-600/50 dark:font-normal">On This Page</h5>

    <ul class="flex  flex-col gap-3">
        @foreach ($items as $key => $value)
            @if (is_array($value)) 
                <!-- Render Heading -->
                <li class="dark:text-gray-300 text-[0.96rem] font-medium dark:font-normal text-gray-600 hover:text-blue-500">
                    <a  x-scroll-item="{target:'{{ str()->slug($key) }}'}" href="#{{str()->slug($key)}}">
                        {{ $key }}
                    </a>
                </li>
                
                    <!-- Render Subheadings -->
        <ul class="ml-3 border-l border-gray-100 dark:border-gray-700 px-1 flex flex-col gap-2">
            @foreach ($value as $label => $scrollKey)
                @php
                    // If the key is numeric, use $scrollKey as both target and label
                    $isAssoc = is_string($scrollKey);
                    $target = $isAssoc ? $scrollKey : $label;
                    $display = is_string($label)? $label : $scrollKey;
                @endphp

                <li class="dark:text-gray-300  text-sm  text-[0.89rem]  text-gray-700 hover:text-blue-500">
                    <a class="font-normal" x-scroll-item="{target:'{{str()->slug($target)}}',group:'default'}" href="#{{str()->slug($target)}}">
                        {{ $display }}
                    </a>
                </li>
            @endforeach
        </ul>

            @else
                <!-- Render as Normal Item -->
                <li class="dark:text-gray-300  text-[0.96rem] font-medium dark:font-normal text-gray-600 hover:text-blue-500">
                    <a  x-scroll-item="{target:'{{str()->slug($value)}}',group:'default'}" href="#{{str()->slug($value)}}">
                        {{ $value }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</nav>


{{-- 

<x-sub-navigation :items="[
    'Getting Started' => 'getting-started',
    'Chat Features' => [
        'Start a Chat' => 'starting-a-chat',
        'sending-a-message',// No explicit label
        'Private Chat' => 'creating-a-private-chat'
    ],
    'Managing' => [
        'managing-conversations',
        'Clear Conversations' => 'clearing-conversations'
    ],
    'Additional Features' => 'additional-features'
]"/>
--}}