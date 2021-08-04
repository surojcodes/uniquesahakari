@extends('layouts.base')
@section('title')
Unique Cooperative | {{$notice->title}}
@endsection
@section('content')

<div class="container services section-bg mt-3 pb-5 mb-5">
  <div class="section-title">
    <span>Notice</span>
    <h2 class='mb-0'>{{$notice->title}}</h2>
    <small class="text-muted">Posted on {{date('Y-m-d', strtotime($notice->created_at))}}</small>
    <hr style='width:40%'>
  </div>
  <div class="row justify-content-center">
    @if($notice->image !='no-image.jpg')
      <div class="col-md-4 pt-4">
        <img src="/storage/notice_images/{{$notice->image}}" alt="no image" width='100%'>
        <div class="text-center mt-2">
          <small><a href="/storage/notice_images/{{$notice->image}}" target='_blank'>View Larger Image</a></small>
        </div>
      </div>
    @endif
    <div class="px-5 my-4">
      {!!$notice->detail!!}
    </div>
  </div>
  </div>
</div>
@endsection