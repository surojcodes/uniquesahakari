@extends('layouts.base')
@section('title')
Unique Cooperative | Membership
@endsection
@section('content')
<div class="container my-3 px-5">
  <div class="section-title">
  <span>Membership</span>
  <h2>Membership</h2>
  <hr style='width:40%'>
  </div>
  @if($membership->image)
  <div class="text-center mb-4">
    <img src="/storage/about/{{$membership->image}}" alt="Introduction" width="900px">
  </div>
  <hr>
  @endif
  {!!$membership->text!!}
</div>
@endsection