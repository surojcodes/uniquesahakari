@extends('admin.adminlayout')
@section('title')
  Unique Cooperative | Board of Directors
@endsection
@section('content')
<div class="container my-5">
  <div class="card shadow p-4">
    <div class="card-body">
    <div class="text-center mb-5">  
    <h2><strong>Edit Member : {{$member->name}}</strong></h2>
    <small class='text-muted'>You can edit member details from here.</small>
    </div>
      <form action="/admin/bod/{{$member->id}}" method='POST' enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="form-group">
            <label for="title"><strong>Member Name * :</strong> </label>
            <input type="text" class='form-control' name='name' value="{{$member->name}}"  required>
          </div>
          <div class="form-group">
            <label for="title"><strong>Member Position * :</strong> </label>
            <input type="text" class='form-control' name='position' value="{{$member->position}}"  required>
          </div>
          <div class="form-group">
            <label for="title"><strong>Member Order * :</strong> </label>
            <input type="number" class='form-control' name='rank' value="{{$member->rank}}" required>
            <small>This controls the order in which members are displayed.</small>
          </div>
          <div class="form-group">
            <label for="title"><strong>Member Text :</strong> </label>
            <textarea name="text" cols="30" rows="5" class="form-control" >{{$member->text}}</textarea>
          </div>
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <label for="image"><strong>(Re) Upload Member Image </strong></label>
                <input type="file" name="image" class='form-control' accept='image/*' > <br>
                <small class="text-muted">Leave as it is if no reupload is needed</small>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                  <label for="image"><strong>Old Member Image </strong></label> <br>
                  <img src="/storage/bod/{{$member->image}}" alt="member" height='70px'>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
          </div>
        </form>
    </div>
  </div>
</div>
@endsection
