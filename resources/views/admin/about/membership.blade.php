@extends('admin.adminlayout')
@section('title')
  Unique Cooperative | Manage Membership
@endsection
@section('content')
<div class="container my-5">
<div class="card shadow p-4">
  <div class="card-body">
  <div class="mb-5">
<div class="text-center mb-5">
    <h2><strong>Membership Page</strong></h2>
    <small class='text-muted'>You can update membership page here.</small>
    </div>

   <form action="{{route('update.membership')}}" method='POST' enctype="multipart/form-data" class="mt-3">
        @csrf
        @method('PUT')
          <div class="form-group">
            <label for="text"><strong>Page Content :</strong> </label>
            <textarea name="text" id='editor' cols="30" rows="5" class="form-control">{{$membership->text}}</textarea>
          </div>
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <label for="image"><strong>(Re) Upload Image </strong></label>
                <input type="file" name="image" class='form-control' accept='image/*' > <br>
                <small class="text-muted">Leave as it is if no reupload is needed</small>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                @if($membership->image)
                  <label for="image"><strong>Old Image </strong></label> <br>
                  <img src="/storage/about/{{$membership->image??''}}" alt="No Image" height='70px'> <br> <br>
                  <button class="btn btn-danger btn-sm" name="remove">Remove Image</button>
                @endif
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Update</button>
          </div>
      </form>
    </div>
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