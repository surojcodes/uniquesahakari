@extends('layouts.base')
@section('title')
Unique Cooperative | Principle of Cooperative
@endsection
@section('content')
<div class="container my-3 px-5">
  <div class="section-title">
  <span>Principle of Cooperative</span>
  <h2>Principle of Cooperative</h2>
  <hr style='width:40%'>
  </div>
  @if($principle->image)
  <div class="text-center">
    <img src="/storage/about/{{$principle->image}}" alt="Introduction" width="900px">
  </div>
  @endif
  {!!$principle->text!!}
</div>
@endsection