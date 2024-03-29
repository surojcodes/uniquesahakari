@extends('layouts.base')
@section('title')
Unique Cooperative | Introduction
@endsection
@section('content')
<div class="container my-3 px-5">
  <div class="section-title">
  <span>Introduction</span>
  <h2>Introduction</h2>
  <hr style='width:40%'>
  </div>
  @if($introduction->image)
  <div class="text-center mb-4">
    <img src="/storage/about/{{$introduction->image}}" alt="Introduction" width="900px">
  </div>
  <hr>

  @endif
  {!!$introduction->text!!}
</div>
@endsection