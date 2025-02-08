@props(['label'])

<h2 x-scroll-section="{id:'{{str()->slug($label)}}'}" data-page-section id="{{str()->slug($label)}}"><a href="#{{str()->slug($label)}}">#</a>{{$label }}</h2>




