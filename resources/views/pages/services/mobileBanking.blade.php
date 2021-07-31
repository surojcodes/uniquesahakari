@extends('layouts.base')
@section('title')
Unique Cooperative | Mobile Banking
@endsection
@section('content')
<div class="container my-3 px-5">
  <div class="section-title">
  <span>Mobile Banking</span>
  <h2>Mobile Banking</h2>
  <hr style='width:40%'>
  </div>
  @if($service->image)
  <div class="text-center mb-4">
    <img src="/storage/services/{{$service->image}}" alt="Introduction" width="900px">
  </div>
  <hr>
  @endif
  {!!$service->text!!}
</div>
@endsection