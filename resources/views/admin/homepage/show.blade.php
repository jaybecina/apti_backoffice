@extends('layouts.app')

@section('title', 'Show Details Featured Image')

@section('content')
<div class="main-content">

  <div class="page-content">
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-sm-flex flex-column align-items-start">
                      <h4 class="mb-sm-0 font-size-18 text-warning">Show Details Featured Image</h4>

                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Home Page</a></li>
                              <li class="breadcrumb-item active">Show Details Featured Image</li>
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
                        <form action="{{ route('admin.product.update', $product->id) }}" class="row" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-2 mb-2">
                                <label for="header_title" class="form-label">Header Title</label>
                                <input type="text" name="header_title" class="form-control" placeholder="Enter Title Here" value="{{$product->header_title}}">
                                @error('header_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="header_title" class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Product Name Here" value="{{$product->name}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="header_title" class="form-label">Product Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Enter Description Here">{{$product->description}}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-2 mb-3">
                                <label for="type_id" class="form-label">Type</label>
                                <select name="type_id" id="" class="form-control">
                                    @foreach ($product_type as $type)
                                    @if ($product->type->id == $type->id)
                                        <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
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

                            <div class="form-group mb-2 mb-3">
                                <label for="price" class="form-label">Price</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">₱</span>
                                    <input type="text" name="price" class="form-control" value="{{ $product->price}}" placeholder="Enter Price Here" aria-describedby="basic-addon1">
                                </div>
                                @error('price')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-2 mb-3">
                                <div class="form-check form-switch form-switch-lg">
                                    <input class="form-check-input" name="is_featured" type="checkbox" role="switch" id="flexSwitchCheckDefault" {{ ($product->is_featured == 1) ? 'checked' : '' }} value="{{ $product->is_featured }}" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Is it a Featured Product?</label>
                                </div>
                            </div>    

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group mb-2">
                                        <label for="header_title" class="form-label">Product Image</label><br>
                                        <img src="{{ asset('storage/'. $product->image)}}" alt="Product Img" width="200" height="200" class="img-fluid img-thumbnail mb-2">
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
                                <button type="submit" class="btn btn-warning">Update</button>
                                <a href="{{ route('admin.product.list') }}" class="btn btn-default" style="border: 0.1px solid #D8D8D8; margin-left: 8px;" onClick="window.location.reload();">Cancel</a>
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

// // Jquery Scripts
$(document).ready(function() {

});
</script>
@endsection
