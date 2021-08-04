@extends('layouts.base')
@section('title')
Unique Cooperative | Notices
@endsection
@section('content')

<div class="container services mt-3 pb-5 mb-5">
  <div class="section-title">
    <span>Notices</span>
    <h2>Notices</h2>
    <hr style='width:40%'>
  </div>
  <div class="row">
    @foreach($notices as $notice)
    <div class="col-md-6 mt-4 mt-md-0">
      <div class="icon-box">
          <i class='mr-4'><img src="/storage/notice_images/{{$notice->image}}" alt="no-image" height='60px'></i>
        <h4><a href="/view-notice/{{$notice->slug}}">{{$notice->title}}</a></h4>
        <p>{!!\Illuminate\Support\Str::limit(strip_tags($notice->detail), 30, $end='...')!!}  .. <a href="/view-notice/{{$notice->slug}}">Read more</a></p>
        <small class="float-right text-muted"> <em>Posted on {{date('Y-m-d', strtotime($notice->created_at))}}</em> </small>
      </div>
    </div>
    @endforeach          
  </div>
  <div class="float-right">
    {{$notices ->links()}}
  </div>
</div>
@endsection