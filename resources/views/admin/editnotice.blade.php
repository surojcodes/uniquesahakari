@extends('admin.adminlayout')
@section('title')
  Unique Cooperative | Notice Section
@endsection
@section('content')
<div class="container my-5">
  <div class="card shadow p-4">
    <div class="card-body">
      <div class="mb-5">
        <h4>Edit Notice : {{$notice->title}}</h4>
        <small class='text-muted'>You can edit notice from here.</small>
      </div>
      <form action="#" method='POST' enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="form-group">
            <label for="title"><strong>Notice Title * : </strong></label>
            <input type="text" class='form-control' name='title' value='{{$notice->title}}' required>
          </div>
          <div class="form-group">
            <label for="title"><strong>Full Notice :</strong> </label>
            <textarea name="description" id='editor' cols="30" rows="5" class="form-control" >{{$notice->detail}}</textarea>
          </div>
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <label for="image"><strong>(Re) Upload Notice Image </strong></label>
                <input type="file" name="image" class='form-control' accept='image/*' > <br>
                <small class="text-muted">Leave as it is if no reupload is needed</small>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                  <label for="image"><strong>Old Notice Image </strong></label> <br>
                  <img src="/storage/notice_images/{{$notice->image}}" alt="notice image" height='70px'>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
    tinymce.init({
        selector: '#editor'
      });
</script>
@endsection