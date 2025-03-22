@extends('layouts.app')

@section('content')
<div {{ $attributes->merge(['class']) }}>

    {{$slot}}
</div>
    
@endsection