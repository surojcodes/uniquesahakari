@extends('layouts.base')
@section('title')
Unique Cooperative | Gallery
@endsection
@section('content')

<div class="container services mt-3 pb-5 mb-5">
  <div class="section-title">
    <span>Gallery</span>
    <h2>Gallery</h2>
    <hr style='width:40%'>
    <div class="row">
      @forelse($galleries as $gallery)
        @if(count($gallery->images)>0)
        <div class="col-md-3">
          <div class="card shadow" style="width: 16rem;">
            <img src="storage/images/{{$gallery->images[0]->fetch_name}}"  class="card-img-top" alt="{{$gallery->title}}">
            <div class="card-body">
              <p class="card-text">{{$gallery->title}}</p>
              <em>{{count($gallery->images)}} Photos</em>
            </div>
          </div>
          <a href="/gallery-images/{{$gallery->slug}}"  class="stretched-link"></a>
        </div>
        @endif
      @empty
        <h4 class="text-center">No Gallery!</h4>
      @endforelse
    </div>
  </div>
</div>
@endsection
