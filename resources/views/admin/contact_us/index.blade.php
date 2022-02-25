@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="main-content">

  <div class="page-content">
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-sm-flex flex-column align-items-start">
                      <h4 class="mb-sm-0 font-size-18 text-warning">Contact Us</h4>

                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Contact Us</a></li>
                              {{-- <li class="breadcrumb-item active"></li> --}}
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
                        <form action="{{ route('admin.contact_us.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="map_loc" class="form-label">Map Location</label>
                                <div class="mapouter" name="map_loc"><div class="gmap_canvas"><iframe width="300" height="200" id="gmap_canvas" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:200px;width:300px;}</style><a href="https://www.embedgooglemap.net">embed google map in webpage</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:200px;width:300px;}</style></div></div>
                                @error('map_loc')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" id="location" value="{{ config('contact_us.location') }}" placeholder="Enter Location Here" class="form-control">
                                @error('location')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span><br>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" id="address" value="{{ config('contact_us.address') }}" class="form-control" placeholder="Enter Address Here">
                                @error('address')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span><br>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="telephone_number" class="form-label">Telephone Number</label>
                                <input type="text" name="telephone_number" id="telephone_number" value="{{ config('contact_us.telephone_number') }}" class="form-control" placeholder="Enter Telephone Number Here">
                                @error('telephone_number')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="cellphone_number" class="form-label">Cellphone Number</label>
                                <input type="text" name="cellphone_number" id="cellphone_number" value="{{ config('contact_us.cellphone_number') }}" class="form-control" placeholder="Enter Cellphone Number Here">
                                @error('cellphone_number')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span><br>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="email_address" class="form-label">Email Address</label>
                                <input type="text" name="email_address" id="email_address" value="{{ config('contact_us.email_address') }}" class="form-control" placeholder="Enter Email Address Here">
                                @error('email_address')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span><br>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="website_url" class="form-label">Website URL</label>
                                <input type="text" name="website_url" id="website_url" value="{{ config('contact_us.website_url') }}" class="form-control" placeholder="Enter Link Here">
                                @error('website_url')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span><br>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning">Update</button>

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
