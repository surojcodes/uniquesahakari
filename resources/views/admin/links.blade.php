@extends('admin.adminlayout')
@section('title')
  Unique Cooperative | Manage External Links
@endsection
@section('content')
<div class="container my-5">
  <div class="card shadow p-4">
    <div class="card-body">
      <div class="mb-5">

    <div class="text-center mb-5">
    <h2><strong>External Links</strong></h2>
    <small class='text-muted'>You can create edit, delete and add external links from here.</small>
    </div>

        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addlinkModal">
        Add Link
        </button>
      </div>
    <table class="table table-bordered table-hover" id="linkTable">
      <thead>
       <tr role="row">
          <th>S.N</th>
          <th hidden>Id</th>
          <th>link Title</th>
          <th>link URL</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @php $i=0;@endphp
        @foreach($links as $link)
          <tr>
              <td>{{++$i}}</td>
              <td hidden>{{$link->id}}</td>
              <td>{{$link->title}}</td>
              <td>{{$link->URL}}</td>
              <td>
                  <a href="#" class="btn btn-sm btn-primary editlink"><i class='bx bxs-edit'></i></a> 
                  <a href="#" class="btn btn-danger btn-sm deletelink"><i class='bx bxs-trash-alt' ></i></a>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</div>
</div>
{{-- add link modal --}}
<div class="modal fade" id="addlinkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-4">
        <form action="{{route('link.store')}}" method='POST' enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="title">Link Title*</label>
            <input type="name" name="title" class="form-control" placeholder="link Title" required>
          </div>
          <div class="form-group">
            <label for="title">Link URL*</label>
            <input type="name" name="url" class="form-control" placeholder="link URL" required>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                          class="fa fa-close"></i>&nbsp;Close</button>
              <button type="submit" class="btn btn-success"><i
                              class="fa fa-save"></i> &nbsp;Save</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
{{-- Edit link modal --}}
<div class="modal fade" id="editlinkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-4">
       <form  method="POST" class="form-container" id="editlinkForm">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="title">link Title*</label>
            <input type="name" name="title" id="title" class="form-control" placeholder="link Title" required>
          </div>
          <div class="form-group">
            <label for="title">Link Title*</label>
            <input type="name" name="url" id="url" class="form-control" placeholder="link URL" required>
          </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-close"></i>&nbsp;Close</button>
                <button type="submit" class="btn btn-success"><i
                            class="fa fa-save"></i> &nbsp;Save</button>
            </div>
          </form> 
      </div>
    </div>
  </div>
</div>
<!-- Start link delete Modal -->
<div class="modal fade" id="deletelinkModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"  id="deleteUserLabel">Delete link</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
               <p>You are going to delete a Link. Are you sure?</p>
               <small class='text-danger'>This process is irreversible</small>
            </div>
            <div class='modal-footer'>
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <form action="#" method="POST" class="form-container" id="deletelinkForm">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger font-weight-bold">Delete Link</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End link delete Modal -->
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    let table=$('#linkTable').DataTable();
    table.on('click','.editlink',function(){
        $tr=$(this).closest('tr');
        if($($tr).hasClass('child')){
        $tr=$tr.prev('.parent');
        }
        let data=table.row($tr).data();
        $('#title').val(data[2]);
        $('#url').val(data[3]);

        $('#editlinkForm').attr('action','/admin/link/'+data[1]);

        $('#editlinkModal').modal('show');
    });

      //delete link 
      table.on('click','.deletelink',function(){
        $tr=$(this).closest('tr');
        if($($tr).hasClass('child')){
        $tr=$tr.prev('.parent');
        }
        let data=table.row($tr).data();
        
        $('#deletelinkForm').attr('action','/admin/link/'+data[1]);
        $('#deletelinkModal').modal('show');
    });
  });
</script>
@endsection

