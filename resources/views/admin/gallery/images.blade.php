@extends('admin.adminlayout')
@section('title')
  Unique Cooperative | Manage Gallery
@endsection
@section('content')
<div class="container my-5">
  <div class="card shadow p-4">
    <div class="card-body">
      <div class="mb-5">
      <div class="text-center mb-5">
          <h2><strong>Gallery : {{$gallery->title}}</strong></h2>
          <small class='text-muted'>You can view and delete gallery images from here.</small>
        </div>
        <div class="row mt-5">
        @foreach($images as $image)
        <div class="card col-md-3 text-center mx-2" style="width: 18rem;">
            <img class="card-img-top" src="/storage/images/{{$image->fetch_name}}" width='80px' alt="No image available">
            <div class="card-body" style="margin-top:10px">
                <form action="{{route('image.destroy',$image->id)}}" method="POST" class="form-container" id="deleteImageForm">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                </form> 
            </div>
        </div>
        @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection