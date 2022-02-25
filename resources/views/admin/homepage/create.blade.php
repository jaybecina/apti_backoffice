@extends('layouts.app')

@section('title', 'Create Featured Image')

@section('content')
<div class="main-content">

  <div class="page-content">
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-sm-flex flex-column align-items-start">
                      <h4 class="mb-sm-0 font-size-18 text-warning">Create New Featured Image</h4>

                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Home Page</a></li>
                              <li class="breadcrumb-item active">Create Featured Image</li>
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
                        <form action="{{ route('admin.product.store') }}" class="row" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-2">
                                <label for="header_title" class="form-label">Header Title</label>
                                <input type="text" name="header_title" class="form-control" value="{{ old('header_title') }}" placeholder="Enter Title Here">
                                @error('header_title')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Product Name Here">
                                @error('name')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Product Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Enter Description Here">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="type_id" class="form-label">Type</label>
                                <select name="type_id" id="" class="form-control">
                                    <option value="" selected>Select Type</option>
                                    
                                    @foreach ($product_type as $type)
                                        @if(old('type_id') == $type->id)
                                            <option value="{{ old('type_id') }}" selected>{{ $type->name }}</option>
                                            
                                            @continue
                                        @endif

                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">₱</span>
                                            <input type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="Enter Price Here" aria-describedby="basic-addon1" style="text-align: right;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                        @error('price')
                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="form-check form-switch form-switch-lg">
                                    <input class="form-check-input" name="is_featured" type="checkbox" role="switch" id="flexSwitchCheckDefault" {{ old('is_featured') == 'on' ? 'checked' : '' }} />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Is it a Featured Product?</label>
                                </div>
                                {{-- @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="image" class="form-label">Product Image</label>
                                        <input type="file" name="image" class="form-control">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning">Submit</button>
                                <a href="{{ route('admin.product.list') }}" class="btn btn-default" style="border: 0.1px solid #D8D8D8; margin-left: 8px;">Cancel</a>
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
