@extends('admin.adminlayout')
@section('title')
  Unique Cooperative | Account Applications
@endsection
@section('content')
<div class="container my-5">
<div class="card shadow p-4">
  <div class="card-body">
  <div class="mb-5">
    <h4>Online New Account Applications</h4>
    <small class='text-muted'>You can view online new account application requests here.</small>
    </div>
    <div class="text-center table-responsive">

    <table class="table table-bordered table-hover" id="applicationTable">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">A/C Operation</th>
          <th scope="col">Mobile</th>
          <th scope="col">Temporary Address</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
      @php $i=0;@endphp
        @foreach($applications as $application)
          <tr>
            <th scope="row">{{++$i}}</th>
            <td>{{$application->fullName}}</td>
            <td>{{$application->operation}}</td>
            <td>{{$application->mobile}}</td>
            <td>{{$application->temporary_municipality.'-'.$application->temporary_ward}}</td>
            <td>
              <a href="{{route('application-detail',$application->application_id)}}" class="btn btn-sm btn-success mb-2">Detail</a>
              <a href="{{route('application-print',$application->application_id)}}" target="_blank" class="btn btn-sm btn-info mb-2">Print</a>
              <!-- <a href="{{route('application-edit',$application->application_id)}}" class="btn btn-sm btn-warning">Edit</a> -->
              <button onclick=setId(<?php echo $application->id ?>) data-toggle="modal" data-target="#deleteApplicationModal" class="btn btn-sm btn-danger mb-2">Delete</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</div>
</div>


<!-- Delete Account Modal -->
<div class="modal fade" id="deleteApplicationModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Delete Application</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
               <p>You are going to delete an account request. Are you sure?</p>
               <small class='text-danger'>This process is irreversible</small>
            </div>
            <div class='modal-footer'>
                <button type="button" class="btn btn-light-success font-weight-bold" data-dismiss="modal">Close</button>
                <form id='deleteApplicationForm' method='POST'>
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
        $('#deleteApplicationForm').attr('action','/delete-application/'+id);
    }
  $(document).ready( function () {
    $('#applicationTable').DataTable({
    "order": [],
    });
  });

</script>
@endsection