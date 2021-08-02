@extends('admin.adminlayout')
@section('title')
  Unique Cooperative | Manage Downloads
@endsection
@section('content')
<div class="container my-5">
<div class="card shadow p-4">
  <div class="card-body">
  <div class="mb-5">

    <div class="text-center mb-5">
    <h2><strong>Downloads</strong></h2>
    <small class='text-muted'>You can add or delete downloadable items here.</small>
    </div>
    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addDownloadModal">
    Add Download Item
    </button>
    </div>
    <table class="table table-bordered table-hover" id="downloadTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Options</th>
        </tr>
      </thead>
      <tbody>
      @php $i=0;@endphp
        @foreach($downloads as $download)
          <tr>
            <th scope="row">{{++$i}}</th>
            <td>{{$download->title}}</td>
            <td>
              <button onclick=setId(<?php echo $download->id ?>) data-toggle="modal" data-target="#deleteDownloadModal" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
</div>
<!-- Add Download Modal -->
<div class="modal fade" id="addDownloadModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Downloadable Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-4">
        <form action="{{route('downloads.store')}}" method='POST' enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="title"><strong>Download Item Title * :</strong> </label>
            <input type="text" class='form-control' name='title' placeholder='Download Item Title' required>
          </div>
          <div class="form-group">
            <label for="image"><strong>Upload Download Item * :</strong> </label>
            <input type="file" name="file" required> <br>
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

<!-- Delete Download Modal -->
<div class="modal fade" id="deleteDownloadModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Delete Download</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
               <p>You are going to delete a downloadable item. Are you sure?</p>
               <small class='text-danger'>This process is irreversible</small>
            </div>
            <div class='modal-footer'>
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <form id='deleteDownloadForm' method='POST'>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger font-weight-bold">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
  function setId(id){
      $('#deleteDownloadForm').attr('action','/download/'+id);
  }
  $(document).ready( function () {
    $('#downloadTable').DataTable({
    "order": [],
    });
  });

</script>
@endsection