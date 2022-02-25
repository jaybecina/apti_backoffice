@extends('layouts.app')

@section('title', 'Show Details Location')

@section('content')
<div class="main-content">

  <div class="page-content">
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-sm-flex flex-column align-items-start">
                      <h4 class="mb-sm-0 font-size-18 text-warning">Show Details Location</h4>

                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Locations</a></li>
                              <li class="breadcrumb-item active">Show Details Location</li>
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
                        <form action="{{ route('admin.service-center.update', $service_center->id)}}" class="row" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="region_id" class="form-label">Region</label>
                                <select name="region_id" id="region_id" class="form-control">
                                    <option value="">Select Region</option>
                                    @foreach ($regions as $region)
                                        @if ($service_center->region->id == $region->id)
                                            <option value="{{ $region->id }}" selected>{{ $region->name }}</option>
                                            @continue
                                        @endif
                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                                </select><br>
                                @error('region_id')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span><br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" placeholder="Location" class="form-control" value="{{ $service_center->location }}"><br>
                                @error('location')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span><br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" placeholder="Address" class="form-control" value="{{ $service_center->address }}"><br>
                                @error('address')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span><br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="office_hours" class="form-label">Office Hours</label>
                                <input type="text" name="office_hours" placeholder="Office Hours" class="form-control" value="{{ $service_center->office_hours }}"><br>
                                @error('office_hours')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span><br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="map_link" class="form-label">Maps Link</label>
                                <input type="text" name="map_link" placeholder="Map Link" class="form-control" value="{{ $service_center->map_link }}"><br>
                                @error('map_link')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span><br>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning">Update</button>
                                <a type="submit" href="{{ route('admin.service-center.list') }}" class="btn btn-default" style="border: 0.1px solid #D8D8D8; margin-left: 8px;">Cancel</a>
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
