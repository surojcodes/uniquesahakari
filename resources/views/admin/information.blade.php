@extends('admin.adminlayout')
@section('title')
  Unique Cooperative | Company Information
@endsection
@section('content')
<div class="container my-5">
<div class="card shadow p-4">
  <div class="card-body">
  <div class="mb-5">

    <div class="text-center mb-5">
    <h2><strong>Company Information</strong></h2>
    <small class='text-muted'>You can update company information here.</small>
    </div>
    
     <form action="{{route('update.info')}}" method='POST' enctype="multipart/form-data" class="mt-3">
        @csrf
        @method('PUT')
          <div class="row mt-2">
            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Company Name: </strong></label>
                <input
                  type="text"
                  class="form-control"
                  name="name"
                  value ="{{$info->name}}"
                  required
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Company Email * : </strong></label>
                <input
                  type="email"
                  class="form-control"
                  name="email"
                  value ="{{$info->email}}"
                  required
                />
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Company Phone *: </strong></label>
                <input
                  type="text"
                  class="form-control"
                   name="phone"
                  value ="{{$info->phone}}"
                  required
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Company Phone 2 : </strong></label>
                <input
                  type="text"
                  class="form-control"
                  name="phone2"
                  value ="{{$info->phone2}}"
                  placeholder="Phone Number 2"
                />
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Company Phone 3 :</strong> </label>
                <input
                  type="text"
                  class="form-control"
                  name="phone3"
                  value ="{{$info->phone3}}"
                  placeholder="Phone Number 3"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Full Address *: </strong></label>
                <input
                  type="text"
                  class="form-control"
                   name="address"
                  value ="{{$info->address}}"
                  required
                />
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Facebook :</strong> </label>
                <input
                  type="text"
                  class="form-control"
                  name="facebook"
                  value ="{{$info->facebook}}"
                  placeholder="Facebook Page URL"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Twitter : </strong></label>
                <input
                  type="text"
                  class="form-control"
                   name="twitter"
                  value ="{{$info->twitter}}"
                  placeholder="Twitter Page URL"
                />
              </div>
            </div>
          </div>
           <div class="row mt-2">
            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Instagram : </strong></label>
                <input
                  type="text"
                  class="form-control"
                  name="instagram"
                  value ="{{$info->instagram}}"
                  placeholder="Instagram Page URL"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><strong>LinkedIn :</strong> </label>
                <input
                  type="text"
                  class="form-control"
                   name="linkedin"
                  value ="{{$info->linkedin}}"
                  placeholder="LinkedIn Page URL"
                />
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