@extends('layouts.app')

@section('title', 'Create News')

@section('content')
<div class="main-content">

  <div class="page-content">
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-sm-flex flex-column align-items-start">
                      <h4 class="mb-sm-0 font-size-18 text-warning">Create News</h4>

                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">News</a></li>
                              <li class="breadcrumb-item active">Create News</li>
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
                        <form action="{{ route('admin.news.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="title" class="form-label">News Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" placeholder="Enter Title Here">
                                @error('title')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="" selected>Select Category</option>
                                    @foreach ($news_categories as $category)
                                        @if(old('category_id') == $category->id)
                                            <option value="{{ old('category_id') }}" selected>{{ $category->name }}</option>
                                            
                                            @continue
                                        @endif

                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" value="{{ old('description') }}" placeholder="Enter Description Here"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="news_image" class="form-label">News Image</label>
                                        <input type="file" name="news_image" id="news_image" class="form-control">
                                        @error('news_image')
                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning">Submit</button>
                                <a type="submit" class="btn btn-default" style="border: 0.1px solid #D8D8D8; margin-left: 8px;" href="{{ route('admin.news.list') }}">Cancel</a>
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