@extends('admin.adminlayout')
@section('title')
  Unique Cooperative | Loan Applications
@endsection
@section('content')
<div class="container my-5">
<div class="card shadow p-4">
  <div class="card-body">
  <div class="mb-5">
    <h4>Online New Loan Applications</h4>
    <small class='text-muted'>You can view online new loan application requests here.</small>
    </div>
    <table class="table table-bordered table-hover" id="applicationTable">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Applicant</th>
          <th scope="col">Membership No.</th>
          <th scope="col">Loan Amount</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
      @php $i=0;@endphp
        @foreach($loans as $application)
          <tr>
            <th scope="row">{{++$i}}</th>
            <td>{{$application->fullName}}</td>
            <td>{{$application->membershipNumber}}</td>
            <td>{{$application->loanAmount}}</td>
            <td>
              <a href="{{route('loan-detail',$application->loan_id)}}" class="btn btn-sm btn-success">Detail</a>
              <a href="{{route('loan-print',$application->loan_id)}}" target="_blank" class="btn btn-sm btn-info">Print</a>
              <button onclick=setId(<?php echo $application->id ?>) data-toggle="modal" data-target="#deleteApplicationModal" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>

<!-- Delete Application Modal -->
<div class="modal fade" id="deleteApplicationModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Delete Loan Application</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
               <p>You are going to delete a loan application. Are you sure?</p>
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
        $('#deleteApplicationForm').attr('action','/admin/delete-loan/'+id);
    }
  $(document).ready( function () {
    $('#applicationTable').DataTable({
    "order": [],
    });
  });

</script>
@endsection