
@props(['label'])

<a class="font-normal dark:text-white  text-gray-700" x-scroll-item="{target:'{{str()->slug($value)}}',group:'default'}" href="#{{str()->slug($value)}}">{{$label}}</a>