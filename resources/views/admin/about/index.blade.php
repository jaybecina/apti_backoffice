@extends('layouts.app')

@section('title', 'Edit About Us')

@section('page-styles')
    <style>
        .file_upload {
            font-size: 24px;
            border: 1px dotted black;
            padding: 25px 10px;
            background: #e3dbdb;
            border-radius: 10px;
        }
    </style>
@endsection

@section('content')
<div class="main-content">

  <div class="page-content">
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-sm-flex flex-column align-items-start">
                      <h4 class="mb-sm-0 font-size-18 text-warning">About Us</h4>

                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">About Us</a></li>
                              <li class="breadcrumb-item active">Edit About Us</li>
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
                        <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="header_title" class="form-label">Header Title</label>
                                <textarea name="header_title" id="" cols="30" rows="10" class="form-control">{{ config('about.header_title') }}</textarea>
                                @error('header_title')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ config('about.description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="vision" class="form-label">Vision</label>
                                <textarea name="vision" id="" cols="30" rows="10" class="form-control">{{ config('about.vision') }}</textarea>
                                @error('vision')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="mission" class="form-label">Mission</label>
                                <textarea name="mission" id="" cols="30" rows="10" class="form-control">{{ config('about.mission') }}</textarea>
                                @error('mission')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3 row">
                                        <label for="">Sponsors</label>

                                        <div class="d-flex">
                                            <div style="margin-top: 1.7rem !important">
                                                <div id="images_array" class="file_upload clone" style="background: transparent">
                                                    {{-- <img id="preview-image-before-upload" style="height: 50px; width: 70px;"> --}}
                                                </div>
                                            </div>
                                            <label id="img_lbl" for="sponsor_img" style="white-space: pre-line">
                                                <i class="fa fa-plus file_upload text-center">
                                                    <span style="font-size: 10px">Add more imgae</span>
                                                </i>
                                            </label>
                                            <input type="file" name="sponsor_img[]" id="sponsor_img" style="display: none; visibility: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning">Update</button>
                                <a type="submit" class="btn btn-default" style="border: 0.1px solid #D8D8D8; margin-left: 8px;" href="{{ route('admin.about.index') }}">Cancel</a>
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
    $(document).ready(function (e) {

    $('#sponsor_img').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            // var htmlData = $('.clone').html();
            // $('#img_lbl').before(htmlData);
            var img = document.createElement("img");
            img.src = e.target.result;
            img.style.width = "70px";
            img.style.height = "50px";
            var images_array = document.getElementById("images_array");
            images_array.appendChild(img);
            // $('#preview-image-before-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@endsection
