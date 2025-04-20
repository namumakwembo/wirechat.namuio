@extends('layouts.app')


@section('content')

<div x-data="{ open: false }">
  <button x-on:click="open = ! open">Toggle Dropdown</button>

  <div x-show="open">
      Dropdown Contents...
  </div>
</div>
@endsection