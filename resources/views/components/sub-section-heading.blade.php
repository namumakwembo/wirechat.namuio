@props(['label','key'=>null,'tag'=>'h3'])

<{{$tag}} {{$attributes}} x-scroll-section="{id:'{{str()->slug($key??$label)}}'}" data-page-section id="{{str()->slug($key??$label)}}"><a href="#{{str()->slug($key??$label)}}">#</a>{{$label }}</{{$tag}}>




