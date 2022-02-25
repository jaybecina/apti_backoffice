@extends('layouts.app')

@section('title', 'Show Details Customers')

@section('content')
<div class="main-content">

  <div class="page-content">
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-sm-flex flex-column align-items-start">
                      <h4 class="mb-sm-0 font-size-18 text-warning">Show Details Customers</h4>

                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Customers</a></li>
                              <li class="breadcrumb-item active">Show Details Customers</li>
                          </ol>
                      </div>

                  </div>
              </div>
          </div>
          <!-- end page title -->

          <div class="row">
              <div class="col-xl-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="card overflow-hidden">

                  </div>

                <div class="d-flex justify-content-end">
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                  <div class="card px-3">
                        <div class="card-body">
                            <form action="{{ route('admin.customer.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="image" class="form-label">Customer Image</label><br>
                                            <img src="{{ asset('storage/'. $customer->image)}}" alt="Product Type Img" width="200" height="200" class="img-fluid img-thumbnail mb-2">
                                            <input type="file" name="image" class="form-control">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                    <strong>{{ $message }}</strong>
                                                </span><br>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="name" class="form-label">Customer Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{$customer->name}}" placeholder="Enter Customer Name Here">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert" style="display: block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="type" class="form-label">Customer Type</label>    
                                    <select name="type" id="type" class="form-control">
                                        <option value="">Select Customer Type</option>
                                        <option value="CORPORATE" {{ $customer->type == 'CORPORATE' ? 'selected' : ''}}>CORPORATE</option>
                                        <option value="GOVERNMENT" {{ $customer->type == 'GOVERNMENT' ? 'selected' : ''}}>GOVERNMENT</option>
                                        <option value="INDIVIDUAL" {{ $customer->type == 'INDIVIDUAL' ? 'selected' : ''}}>INDIVIDUAL</option>
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert" style="display: block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-warning">Update</button>
                                    <a href="{{ route('admin.customer.list') }}" class="btn btn-default" style="border: 0.1px solid #D8D8D8; margin-left: 8px;">Cancel</a>
                                </div>
                            
                            </form>
                        </div>
                  </div>
              </div>
          </div>
          <!-- end row -->
      </div>
      <!-- container-fluid -->
  </div>
  <!-- end page-content -->

  <!-- Modals Here -->

  <!-- end modals -->

</div>
<!-- end main content-->
@stop

@section('page-scripts')
<script type="text/javascript">

const isDecimalKey = (event,element)=>{
    event.target.setCustomValidity('');
    const patt = /^[0-9]*(\.[0-9]{0,2})?$/;
    let value = event.target.value;
    if(!patt.test(value)){
        event.target.reportValidity();
        element.setAttribute("maxlength",value.length);
    }
    else
    {
        element.removeAttribute("maxlength")
    }
    if(value.length === 0){
        element.removeAttribute("maxlength");
    }
}

// // Jquery Scripts
$(document).ready(function() {

});
</script>
@endsection
