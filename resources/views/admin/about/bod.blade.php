@extends('admin.adminlayout')
@section('title')
  Unique Cooperative | Board of Directors
@endsection
@section('content')
<div class="container my-5">
<div class="card shadow p-4">
  <div class="card-body">
  <div class="mb-5">

    <div class="text-center mb-5">  
    <h2><strong>Board of Directors</strong></h2>
    <small class='text-muted'>You can add, edit or delete board members from here.</small>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success float-right mb-3" data-toggle="modal" data-target="#addMemberModal">
    Add Member
    </button>
    </div>
    <div class="table-responsive text-center">
    <table class="table table-bordered table-hover" id="memberTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Position</th>
          <th scope="col">Rank</th>
          <th scope="col">Image</th>
          <th scope="col">Options</th>
        </tr>
      </thead>
      <tbody>
      @php $i=0;@endphp
        @foreach($members as $member)
          <tr>
            <th scope="row">{{++$i}}</th>
            <td>{{$member->name}}</td>
            <td>{{$member->position}}</td>
            <td>{{$member->rank}}</td>
            <td> 
              <img src="/storage/bod/{{$member->image}}" alt="member" height='60px'>
             </td>
            <td>
              <a href="{{route('bod.edit',$member->id)}}" class="btn btn-warning btn-sm mb-2">Edit</a>
              <button onclick=setId(<?php echo $member->id ?>) data-toggle="modal" data-target="#deleteMemberModal" class="btn btn-sm btn-danger mb-2">Delete</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</div>
</div>
<!-- Add Member Modal -->
<div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-4">
        <form action="{{route('bod.store')}}" method='POST' enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="title"><strong>Member Name * :</strong> </label>
            <input type="text" class='form-control' name='name' placeholder='Member Name' required>
          </div>
          <div class="form-group">
            <label for="title"><strong>Member Position * :</strong> </label>
            <input type="text" class='form-control' name='position' placeholder='Member Position' required>
          </div>
          <div class="form-group">
            <label for="title"><strong>Member Order * :</strong> </label>
            <input type="number" class='form-control' name='rank' placeholder='Member Order' required>
            <small>This controls the order in which members are displayed.</small>
          </div>
          <div class="form-group">
            <label for="title"><strong>Member Text :</strong> </label>
            <textarea name="text" cols="30" rows="5" class="form-control" ></textarea>
          </div>
          <div class="form-group">
            <label for="image"><strong>member Image * </strong></label>
            <input type="file" name="image" class='form-control' accept='image/*' > <br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Delete Member Modal -->
<div class="modal fade" id="deleteMemberModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"  id="deleteUserLabel">Delete Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
               <p>You are going to delete a board memeber. Are you sure?</p>
               <small class='text-danger'>This process is irreversible</small>
            </div>
            <div class='modal-footer'>
                <button type="button" class="btn btn-light-success font-weight-bold" data-dismiss="modal">Close</button>
                <form id='deleteMemberForm' method='POST'>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger font-weight-bold">Delete Member</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
  function setId(id){
      $('#deleteMemberForm').attr('action','/admin/bod/'+id);
  }
  $(document).ready( function () {
    $('#memberTable').DataTable({
    "order": [],
    });
  });
  
</script>
@endsection