@props(['label','key'=>null,'tag'=>'h3'])

<{{ $tag }} {{$attributes}} x-scroll-section="`{{str()->slug($label)}}`" data-page-section id="{{str()->slug($key??$label)}}"><a href="#{{str()->slug($key??$label)}}">#</a>{{$label }}</{{ $tag }}>




