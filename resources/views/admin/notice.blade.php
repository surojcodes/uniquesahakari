@extends('admin.adminlayout')
@section('title')
  Unique Cooperative | Notice Section
@endsection
@section('content')
<div class="container my-5">
<div class="card shadow p-4">
  <div class="card-body">
  <div class="mb-5">
    <h4>Notices</h4>
    <small class='text-muted'>You can add,edit or delete notices from here.</small>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addNoticeModal">
    Add Notice
    </button>
    </div>
    <table class="table table-bordered table-hover" id="noticeTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Set Front</th>
          <th scope="col">Image</th>
          <th scope="col">Options</th>
        </tr>
      </thead>
      <tbody>
      @php $i=0;@endphp
        @foreach($notices as $notice)
          <tr>
            <th scope="row">{{++$i}}</th>
            <td>{{$notice->title}}</td>
            <td>
            @if($notice->set_front==0)
              <form action="/admin/set-front/{{$notice->slug}}" method="POST">
                @csrf
                @method('PUT')
                <input type="submit" class="btn btn-sm btn-success text-white" value='Set Front'></input>
              </form>
            @else
            <form action="/admin/remove-front/{{$notice->slug}}" method="POST">
                @csrf
                @method('PUT')
                <input type="submit" class="btn btn-sm btn-info text-white" value='Remove Front'></input>
              </form>
            @endif
            </td>
            <td> 
              <img src="storage/notice_images/{{$notice->image}}" alt="slider image" height='60px'>
             </td>
            <td>
            <a href="{{route('notices.edit',$notice->slug)}}" class="btn btn-warning btn-sm">Edit</a>
              <button onclick=setId(<?php echo $notice->id ?>) data-toggle="modal" data-target="#deleteNoticeModal" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
</div>
<!-- Add Notice Modal -->
<div class="modal fade" id="addNoticeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Notice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-4">
        <form action="{{route('notices.store')}}" method='POST' enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="title"><strong>Notice Title * :</strong> </label>
            <input type="text" class='form-control' name='title' placeholder='Notice Title' required>
          </div>
          <div class="form-group">
            <label for="title"><strong>Full Notice :</strong> </label>
            <textarea name="description" id='editor' cols="30" rows="5" class="form-control" ></textarea>
          </div>

          <div class="form-group">
            <label for="image"><strong>Upload Notice Image </strong></label>
            <input type="file" name="image" class='form-control' accept='image/*' > <br>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Delete Notice Modal -->
<div class="modal fade" id="deleteNoticeModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"  id="deleteUserLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
               <p>You are going to delete a notice. Are you sure?</p>
               <small class='text-danger'>This process is irreversible</small>
            </div>
            <div class='modal-footer'>
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <form id='deleteNoticeForm' method='POST'>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger font-weight-bold">Delete Notice</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
  function setId(id){
      $('#deleteNoticeForm').attr('action','/admin/notice/'+id);
  }
  $(document).ready( function () {
    $('#noticeTable').DataTable({
    "order": [],
    });
  });
  
</script>
<script>
    tinymce.init({
        selector: '#editor'
      });
</script>
@endsection