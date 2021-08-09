@extends('admin.adminlayout')
@section('title')
  Unique Cooperative | Manage Gallery
@endsection
@section('content')
<div class="container my-5">
  <div class="card shadow p-4">
    <div class="card-body">
      <div class="mb-5">

    <div class="text-center mb-5">
    <h2><strong>Gallery</strong></h2>
    <small class='text-muted'>You can create edit, delete and add images to alleries from here.</small>
    </div>

        <button type="button" class="btn btn-success float-right mb-3" data-toggle="modal" data-target="#addGalleryModal">
        Add Gallery
        </button>
      </div>
      <div class="table-responsive text-center">
    <table class="table table-bordered table-hover" id="galleryTable">
      <thead>
       <tr role="row">
          <th>S.N</th>
          <th hidden>Id</th>
          <th>Gallery Title</th>
          <th>Total Images</th>
          <th>Add Images</th>
          <th>View Images</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @php $i=0;@endphp
        @foreach($galleries as $gallery)
          <tr>
              <td>{{++$i}}</td>
              <td hidden>{{$gallery->id}}</td>
              <td>{{$gallery->title}}</td>
              <td>{{count($gallery->images)}}</td>
              <td>
                  <form action="{{route('galleryimage.store',$gallery->id)}}" method="POST" class="form-container" enctype="multipart/form-data" >
                  @csrf
                  <div class="row">
                    <div class="col-md-9">
                      <input type="file" class="form-control" style="border:0" name="file[]" accept="image/*" multiple required> 
                      </div>
                      <div class="col-md-3">
                      <input type="submit" value="Add" class="form-control btn btn-sm btn-success">
                      </div>
                    </div>
                  </form>
              </td>
              <td class="text-center">
                  <a href="{{route('gallery.show',$gallery->slug)}}" class="btn btn-warning btn-sm text-white">View</a>
              </td>
              <td>
                  <a href="#" class="btn btn-sm btn-primary editgallery"><i class='bx bxs-edit'></i></a> 
                  <a href="#" class="btn btn-danger btn-sm deletegallery"><i class='bx bxs-trash-alt' ></i></a>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>
    </div>
  </div>
</div>
</div>
{{-- add gallery modal --}}
<div class="modal fade" id="addGalleryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Gallery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-4">
        <form action="{{route('gallery.store')}}" method='POST' enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="title">Gallery Title*</label>
            <input type="name" name="title" class="form-control" placeholder="Gallery Title" required>
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
{{-- Edit Gallery modal --}}
<div class="modal fade" id="editGalleryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Gallery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-4">
       <form  method="POST" class="form-container" id="editGalleryForm">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="title">Gallery Title*</label>
            <input type="name" name="title" id="title" class="form-control" placeholder="Gallery Title" required>
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
<!-- Start gallery delete Modal -->
<div class="modal fade" id="deleteGalleryModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"  id="deleteUserLabel">Delete Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
               <p>You are going to delete a gallery. Are you sure?</p>
               <small class='text-danger'>Deleting gallery will delete all of its images as well.</small> <br>
               <small class='text-danger'>This process is irreversible</small>
            </div>
            <div class='modal-footer'>
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <form action="#" method="POST" class="form-container" id="deleteGalleryForm">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger font-weight-bold">Delete Gallery</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End gallery delete Modal -->
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    let table=$('#galleryTable').DataTable();
    table.on('click','.editgallery',function(){
        $tr=$(this).closest('tr');
        if($($tr).hasClass('child')){
        $tr=$tr.prev('.parent');
        }
        let data=table.row($tr).data();
        $('#title').val(data[2]);

        $('#editGalleryForm').attr('action','/admin/gallery/'+data[1]);

        $('#editGalleryModal').modal('show');
    });

      //delete gallery 
      table.on('click','.deletegallery',function(){
        $tr=$(this).closest('tr');
        if($($tr).hasClass('child')){
        $tr=$tr.prev('.parent');
        }
        let data=table.row($tr).data();
        
        $('#deleteGalleryForm').attr('action','/admin/gallery/'+data[1]);
        $('#deleteGalleryModal').modal('show');
    });
  });
</script>
@endsection

