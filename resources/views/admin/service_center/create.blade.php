@extends('layouts.app')

@section('title', 'Create New Location')

@section('content')
<div class="main-content">

  <div class="page-content">
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-sm-flex flex-column align-items-start">
                      <h4 class="mb-sm-0 font-size-18 text-warning">Create New Location</h4>

                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Locations</a></li>
                              <li class="breadcrumb-item active">Create New Location</li>
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
                        <form action="{{ route('admin.service-center.store')}}" class="row" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="region_id" class="form-label">Region</label>
                                <select name="region_id" id="region_id" class="form-control">
                                    <option value="">Select Region</option>
                                    @foreach ($regions as $region)
                                        @if(old('region_id') == $region->id)
                                            <option value="{{ old('region_id') }}" selected>{{ $region->name }}</option>
                                            
                                            @continue
                                        @endif

                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                                </select>
                                @error('region_id')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" value="{{ old('location') }}" placeholder="Location" class="form-control">
                                @error('location')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" value="{{ old('address') }}" placeholder="Address" class="form-control">
                                @error('address')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="office_hours" class="form-label">Office Hours</label>
                                <select name="office_hours" class="form-control">
                                    <option value="">Select Office Hours</option>
                                    @foreach ($office_hours as $office_hour)
                                        {{-- @if(old('region_id') == $region->id)
                                            <option value="{{ old('region_id') }}" selected>{{ $region->name }}</option>
                                            
                                            @continue
                                        @endif --}}

                                        <option value="{{ $office_hour }}">{{ $office_hour }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" name="office_hours" value="{{ old('office_hours') }}" placeholder="Office Hours" class="form-control"> --}}
                                @error('office_hours')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="map_link" class="form-label">Maps Link</label>
                                <input type="text" name="map_link" value="{{ old('map_link') }}" placeholder="Map Link" class="form-control">
                                @error('map_link')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning">Submit</button>
                                <a type="submit" class="btn btn-default" style="border: 0.1px solid #D8D8D8; margin-left: 8px;" href="{{ route('admin.service-center.list') }}">Cancel</a>
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
