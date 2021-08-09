@extends('admin.adminlayout')
@section('title')
  Unique Cooperative | Slider Section
@endsection
@section('content')
<div class="container my-5">
<div class="card shadow p-4">
  <div class="card-body">
  <div class="mb-5">
 <div class="text-center mb-5">
    <h2><strong>Slider Images</strong></h2>
    <small class='text-muted'>You can add or delete slider images to be shown in the front page here.</small>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success float-right mb-3" data-toggle="modal" data-target="#addSliderModal">
    Add Slider
    </button>
    </div>

    <div class="text-center table-responsive">

    <table class="table table-bordered table-hover" id="sliderTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Image</th>
          <th scope="col">Options</th>
        </tr>
      </thead>
      <tbody>
      @php $i=0;@endphp
        @foreach($sliders as $slider)
          <tr>
            <th scope="row">{{++$i}}</th>
            <td>{{$slider->title}}</td>
            <td> <img src="/storage/slider_images/{{$slider->image}}" alt="slider image" height='60px'> </td>
            <td>
              <button onclick=setId(<?php echo $slider->id ?>) data-toggle="modal" data-target="#deleteSliderModal" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</div>
</div>
<!-- Add Slider Modal -->
<div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Slider Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-4">
        <form action="{{route('sliders.store')}}" method='POST' enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="title"><strong>Slider Title * :</strong> </label>
            <input type="text" class='form-control' name='title' placeholder='Slider Title' required>
          </div>
          <div class="form-group">
            <label for="image"><strong>Upload Slider Image * :</strong></label>
            <input type="file" name="image" accept='image/*' required> <br>
            <small class='text-muted'>Recommended size : 1600 x 600</small>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Upload</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Delete Slider Modal -->
<div class="modal fade" id="deleteSliderModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"  id="deleteUserLabel">Delete Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
               <p>You are going to delete a slider. Are you sure?</p>
               <small class='text-danger'>This process is irreversible</small>
            </div>
            <div class='modal-footer'>
                <button type="button" class="btn btn-light-success font-weight-bold" data-dismiss="modal">Close</button>
                <form id='deleteSliderForm' method='POST'>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger font-weight-bold">Delete Slider</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
  function setId(id){
      $('#deleteSliderForm').attr('action','/admin/slider/'+id);
  }
  $(document).ready( function () {
    $('#sliderTable').DataTable({
    "order": [],
    });
  });

</script>
@endsection