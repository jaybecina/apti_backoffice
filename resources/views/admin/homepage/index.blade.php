@extends('layouts.app')

@section('title', 'Featured Image List')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex flex-column align-items-start">
                        <h4 class="mb-sm-0 font-size-18 text-warning">Featured Image List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home Page</a></li>
                                <li class="breadcrumb-item active">Featured Image List</li>
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
                                    <a href="{{ route('admin.product.create') }}" class="btn btn-warning"><i
                                            class="fas fa-plus-circle"></i>&nbsp; Create</a>
                                </div>
                                <div class="col-lg-5">
                                    <form class="form-inline" id="filterForm">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group search-container">
                                                    <span class="fa fa-search search-icon"></span>
                                                    <input type="text" name="keyword" class="form-control search-input" placeholder="Search Product Name" value="@isset($_GET['keyword']){{ $_GET['keyword'] }}@endisset" max="30">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <label class="input-group-text bg-transparent" for=""><i class="fa fa-filter"></i></label>
                                                    <select class="form-select" aria-label="Filter select" name="type_id">
                                                        <option value="">All</option>
                                                        @foreach($product_types as $type)
                                                            <option @isset($_GET['keyword']) @if($_GET['type_id'] == $type->id) selected @endif @endisset value="{{$type->id}}">{{ $type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-light" id="btnFilter">Apply Filter</button>
                                                <a href="{{ route('admin.product.list') }}" class="btn btn-outline-secondary" id="btnSearch">Reset</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-5">
                                    <button type="button" class="btn btn-secondary float-end" onclick="delete_multiple_entries();"><i class="fa fa-trash"
                                            aria-hidden="true"></i>&nbsp; Delete</button>
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
                                            <th>Product Image</th>
                                            <th>Header Title</th>
                                            <th>Product Name</th>
                                            <th>Product Type</th>
                                            <th>Product Price</th>
                                            <th>Is Featured</th>
                                            <th>Date Posted</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $product)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="checkbox cb" id="cb{{ $product->id }}">
                                                <label for="cb{{ $product->id }}"></label>
                                            </td>
                                            <td><img src="{{ asset('storage/'. $product->image)}}" alt="Product Img"
                                                    width="50" height="50"></td>
                                            <td>{{$product->header_title}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->type->name}}</td>
                                            <td>P&nbsp;{{$product->price}}</td>
                                            <td>
                                                {{ ($product->is_featured) ? "Yes" : "No" }}
                                            </td>
                                            <td>{{ date_format($product->created_at, 'M. d, Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.product.show', $product->id) }}"
                                                    class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <button data-id="{{ $product->id }}"
                                                    class="btn btn-danger btn-sm delete_row"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button>

                                                <form id="deleteProduct_{{$product->id}}"
                                                    action="{{ route('admin.product.delete', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="10"><span>
                                                    <center>No record found</center>
                                                </span></td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                    {{-- <div class="d-flex justify-content-center">
                                    {!! $products->links() !!}
                                </div> --}}
                                </table>
                            </div>

                            {{ $products->links('layouts.components.pagination') }}
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
        let listingUrl = "{{ route('admin.product.list') }}";
        window.location.href = listingUrl + "?" + $('#filterForm').serialize();
    });

    /*** Handles the Select All Checkbox ***/
    $("#checkbox_all").click(function(){
        $('.cb').not(this).prop('checked', this.checked);
    });

    var route_multiple_delete_entries = "{{ route('admin.product.multiple-delete') }}";
</script>

<script type="text/javascript">
    // // Jquery Scripts
    $(document).ready(function () {

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
                    document.getElementById('deleteProduct_' + id).submit()
                }
            })
        }

    });

</script>
@endsection
