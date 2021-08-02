@extends('layouts.base')
@section('title')
Unique Cooperative | Gallery
@endsection
@section('content')
<div class="container services mt-3 pb-5 mb-5">
  <div class="section-title">
    <span>Gallery : {{$gallery->title}}</span>
    <h2>Gallery:{{$gallery->title}}</h2>
    <hr style='width:40%'>
    <div class="row">
      @forelse($images as $image)
      <div class="col-md-4 my-3">
        <a href="/storage/images/{{$image->fetch_name}}" data-gallery="{{$gallery->title}}" data-toggle="lightbox" >
            <img src="/storage/images/{{$image->fetch_name}}" class="img-fluid">
        </a>
      </div>
        @empty
          <h2 class="text-center">No Images</h2>
        @endforelse
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});

</script>
@endsection