@extends('layouts.base')
@section('title')
Unique Cooperative | Mission, Vision and Objective
@endsection
@section('content')
<div class="container my-3 px-5">
  <div class="section-title">
  <span>Mission, Vision and Objective</span>
  <h2>Mission, Vision and Objective</h2>
  <hr style='width:40%'>
  </div>
  @if($mvo->image)
  <div class="text-center">
    <img src="/storage/about/{{$mvo->image}}" alt="Introduction" width="900px">
  </div>
  @endif
  {!!$mvo->text!!}
</div>
@endsection