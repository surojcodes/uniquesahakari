@extends('layouts.base')
@section('title')
Unique Cooperative | Downloads
@endsection
@section('content')

<div class="container services section-bg mt-3 pb-5 mb-5">
  <div class="section-title">
    <span>Downloads</span>
    <h2>Downloads</h2>
    <hr style='width:40%'>
  </div>
  <ul class="nav nav-pills">
    @foreach($downloads as $download)
    <li class="nav-item mr-3">
      <a class="nav-link bg-secondary text-white" href="/download-item/{{$download->slug}}">{{$download->title}}</a>
    </li>
    @endforeach  
  </ul>
  <div class="float-right">
    {{$downloads ->links()}}
  </div>
</div>
@endsection