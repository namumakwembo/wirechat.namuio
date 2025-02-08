@props(['label','key'=>null])

<h3 x-scroll-section="{id:'{{str()->slug($key??$label)}}'}" data-page-section id="{{str()->slug($key??$label)}}"><a href="#{{str()->slug($key??$label)}}">#</a>{{$label }}</h3>




