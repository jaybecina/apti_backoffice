@extends('layouts.app')

@section('title', 'News List')

@section('content')
<div class="main-content">

  <div class="page-content">
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-sm-flex flex-column align-items-start">
                      <h4 class="mb-sm-0 font-size-18 text-warning">News List</h4>

                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">News</a></li>
                              <li class="breadcrumb-item active">News List</li>
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
                                <a href="{{ route('admin.news.create') }}" class="btn btn-warning"><i class="fas fa-plus-circle"></i>&nbsp; Create</a>
                            </div>
                            <div class="col-lg-5">
                                <form class="form-inline" id="filterForm">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group search-container">
                                                <span class="fa fa-search search-icon"></span>
                                                <input type="text" name="keyword" class="form-control search-input" placeholder="Search Title" value="@isset($_GET['keyword']){{ $_GET['keyword'] }}@endisset" max="30">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <label class="input-group-text bg-transparent" for=""><i class="fa fa-filter"></i></label>
                                                <select class="form-select" aria-label="Filter select" name="category_id">
                                                    <option value="">All</option>
                                                    @foreach($news_categories as $category)
                                                        <option @isset($_GET['keyword']) @if($_GET['category_id'] == $category->id) selected @endif @endisset value="{{$category->id}}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-light" id="btnFilter">Apply Filter</button>
                                            <a href="{{ route('admin.news.list') }}" class="btn btn-outline-secondary" id="btnSearch">Reset</a>
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
                                        <th>News Image</th>
                                        <th>News Title</th>
                                        <th>Category</th>
                                        <th>News Description</th>
                                        <th>Date Posted</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($news_array as $news)
                                        <tr>
                                           <td>
                                                <input type="checkbox" class="checkbox cb" id="cb{{ $news->id }}">
                                                <label for="cb{{ $news->id }}"></label>
                                            </td>
                                            <td><img src="{{ asset('storage/'. $news->news_image)}}" alt="News Img" width="50" height="50"></td>
                                            <td>{{$news->title}}</td>
                                            <td>{{$news->category->name}}</td>
                                            <td>{{ Str::limit($news->description, 30, $end='...') }}</td>
                                            <td>{{ date_format($news->created_at, 'M. d, Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.news.show', $news->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <button data-id="{{ $news->id }}" class="btn btn-danger btn-sm delete_row"><i class="fa fa-trash"></i></button>

                                                <form id="deleteNews_{{$news->id}}" action="{{ route('admin.news.delete', $news->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
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

                        {{ $news_array->links('layouts.components.pagination') }}
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

<form action="" id="submit_form" method="post" style="display: none;">
    @csrf
    <input type="hidden" id="ids" name="ids">
</form>
@stop

@section('page-scripts')
<script type="text/javascript">
    // // Multiple Delete & Filter Scripts
    $('#btnFilter').on('click', function() {
        let listingUrl = "{{ route('admin.news.list') }}";
        window.location.href = listingUrl + "?" + $('#filterForm').serialize();
    });

    /*** Handles the Select All Checkbox ***/
    $("#checkbox_all").click(function(){
        $('.cb').not(this).prop('checked', this.checked);
    });

    var route_multiple_delete_entries = "{{ route('admin.news.multiple-delete') }}";
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
                document.getElementById('deleteNews_' + id).submit()
            }
        })
    }


});
</script>
@endsection
