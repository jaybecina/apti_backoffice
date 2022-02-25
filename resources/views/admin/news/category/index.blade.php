@extends('layouts.app')

@section('title', 'News Category List')

@section('content')
<div class="main-content">

  <div class="page-content">
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-sm-flex flex-column align-items-start">
                      <h4 class="mb-sm-0 font-size-18 text-warning">News Category List</h4>

                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">News Category</a></li>
                              <li class="breadcrumb-item active">News Category List</li>
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

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#categoryCreateModal"><i class="fas fa-plus-circle"></i>&nbsp; Create</button>
                            </div>
                            <div class="col-lg-5">
                                <form class="form-inline" id="filterForm">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group search-container">
                                                <span class="fa fa-search search-icon"></span>
                                                <input type="text" name="keyword" class="form-control search-input" placeholder="Search Name" value="@isset($_GET['keyword']){{ $_GET['keyword'] }}@endisset" max="30">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-light" id="btnFilter">Apply Filter</button>
                                            <a href="{{ route('admin.news.category.list') }}" class="btn btn-outline-secondary" id="btnSearch">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-5">
                                <button type="button" class="btn btn-secondary float-end" onclick="delete_multiple_entries();"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">
                                            <input type="checkbox" class="checkbox" id="checkbox_all">
                                            <label for="checkbox_all"></label>
                                        </th>
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        {{-- <th>Date Posted</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="checkbox cb" id="cb{{ $category->id }}">
                                                <label for="cb{{ $category->id }}"></label>
                                            </td>
                                            <td>{{$category->name}}</td>
                                            <td>{{ Str::limit($category->description, 30, $end='...') }}</td>
                                            {{-- <td>{{ date_format($category->created_at, 'M d, Y') }}</td> --}}
                                            <td>
                                                <button data-bs-toggle="modal" data-bs-target="#categoryEditModal_{{$category->id}}" id="btnEdit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                                <button onclick="event.preventDefault();document.getElementById('deleteCategory_{{$category->id}}').submit();" class="btn btn-danger btn-sm delete_row"><i class="fa fa-trash"></i></button>

                                                <form id="deleteCategory_{{$category->id}}" action="{{ route('admin.news.category.delete', $category->id) }}" method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit Here -->
                                        <div class="modal fade" id="categoryEditModal_{{$category->id}}" tabindex="-1" aria-labelledby="categoryEditModalLabel_{{$category->id}}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="categoryEditModalLabel_{{$category->id}}">Show Details Category</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                        <form action="{{ route('admin.news.category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="form-group mb-3">
                                                                <label for="title" class="form-label">Category Name</label>
                                                                <input type="text" name="name" id="edit_name" value="{{ $category->name }}" class="form-control" placeholder="Enter Name Here" required>
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert" style="display: block">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>


                                                            <div class="form-group mb-3">
                                                                <label for="description" class="form-label">Description</label>
                                                                <textarea name="description" id="edit_description" cols="30" rows="10" class="form-control" placeholder="Enter Description Here" required>{{ $category->description }}</textarea>
                                                                @error('description')
                                                                    <span class="invalid-feedback" role="alert" style="display: block">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-warning">Update</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin-left: 8px;">Close</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                    <div class="modal-footer">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end edit modals -->
                                    @empty
                                        <tr>
                                            <td colspan="7"><span><center>No record found</center></span></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                {{-- <div class="d-flex justify-content-center">
                                    {!! $products->links() !!}
                                </div> --}}
                            </table>
                        </div>

                        {{ $categories->links('layouts.components.pagination') }}
                    </div>
                  </div>
              </div>
          </div>
          <!-- end row -->
      </div>
      <!-- container-fluid -->
  </div>
  <!-- end page-content -->

    <!-- Modal Create Here -->
    <div class="modal fade" id="categoryCreateModal" tabindex="-1" aria-labelledby="categoryCreateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="categoryCreateModalLabel">Create Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form action="{{ route('admin.news.category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Category Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Name Here" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert" style="display: block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" value="{{ old('description') }}" placeholder="Enter Description Here" required></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert" style="display: block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-warning">Submit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin-left: 8px;">Close</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- end create modals -->

</div>
<!-- end main content-->
@stop

@section('page-scripts')

<script type="text/javascript">
    // // Multiple Delete & Filter Scripts
    $('#btnFilter').on('click', function() {
        let listingUrl = "{{ route('admin.news.category.list') }}";
        window.location.href = listingUrl + "?" + $('#filterForm').serialize();
    });

    /*** Handles the Select All Checkbox ***/
    $("#checkbox_all").click(function(){
        $('.cb').not(this).prop('checked', this.checked);
    });

    var route_multiple_delete_entries = "{{ route('admin.news.category.multiple-delete') }}";
</script>

<script type="text/javascript">
// // Jquery Scripts
$(document).ready(function() {

    $(document).on('click', '.delete_row', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        confirmDelete(id);
    });

    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteCategory_' + id).submit()
            }
        })
    }

});
</script>
@endsection
