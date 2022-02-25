@extends('layouts.app')

@section('title', 'User Management List')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex flex-column align-items-start">
                        <h4 class="mb-sm-0 font-size-18 text-warning">User Management List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home Page</a></li>
                                <li class="breadcrumb-item active">User Management List</li>
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
                                    <a href="{{ route('admin.user-management.create') }}" class="btn btn-warning" >
                                        <i class="fas fa-plus-circle"></i>&nbsp;Create
                                    </a>

                                </div>
                                <div class="col-lg-5">
                                    <form class="form-inline" id="filterForm">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group search-container">
                                                    <span class="fa fa-search search-icon"></span>
                                                    <input type="text" name="keyword" class="form-control search-input" placeholder="Search" value="@isset($_GET['keyword']){{ $_GET['keyword'] }}@endisset" max="30">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <label class="input-group-text bg-transparent" for=""><i class="fa fa-filter"></i></label>
                                                    <select class="form-select" aria-label="Filter select" name="type_id">
                                                        <option value="">All</option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-light" id="btnFilter">Apply Filter</button>
                                                <a href="{{ route('admin.user-management.list') }}" class="btn btn-outline-secondary" id="btnSearch">Reset</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Profile Pciture</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Permission</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <td><img class="rounded-circle" src="{{ asset($user->userDetails->profile_picture)}}" alt="Profile Picture Img"
                                                    width="50" height="50"></td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>
                                                    {{ count($user->roles) > 0 ? $user->roles[0]->name : '' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $i = 0;
                                                        $pill_bg = [
                                                            'bg-primary',
                                                            'bg-warning',
                                                            'bg-success',
                                                            'bg-danger',
                                                        ]
                                                    @endphp
                                                    @foreach ($user->permissions as $perm)
                                                        <span class="badge rounded-pill {{ $pill_bg[$i] }} text-uppercase">{{$perm->name}}</span>
                                                        @php
                                                            $i++;
                                                        @endphp
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <span style="font-size: 1rem !important;" class="badge {{ $user->status ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $user->status ? 'ACTIVED' : 'DISABLED' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-around">
                                                        <a href="{{ route('admin.user-management.show', $user->id) }}"
                                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>
                                                        </a>

                                                        @if ($user->status)
                                                            <button data-id="{{ $user->id }}" data-changeTo="deactivate"
                                                                class="btn btn-danger btn-sm change_status">
                                                                <i class="fa fa-ban" aria-hidden="true"></i>
                                                            </button>
                                                        @else
                                                        <button data-id="{{ $user->id }}" data-changeTo="activate"
                                                            class="btn btn-success btn-sm change_status">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </button>
                                                        @endif
                                                        <form id="changeUserStatus_{{$user->id}}"
                                                            action="{{ route('admin.user-management.disable', $user->id)}}"
                                                            method="GET" class="d-none">
                                                        </form>
                                                    </div>
                                                    <form id="deleteUser_{{$user->id}}"
                                                        action="{{ route('admin.user-management.delete', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="userEditModal_{{$user->id}}" tabindex="-1" aria-labelledby="userEditModalLabel_{{$user->id}}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('admin.user-management.show', $user->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="userEditModalLabel_{{$user->id}}">Show Details User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="from-group mb-2">
                                                                    <label for="email">Email Address</label>
                                                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                                                    @error('email')
                                                                        <span class="invalid-feedback" role="alert" style="display: block">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="from-group mb-2">
                                                                    <label for="name">Name</label>
                                                                    <input type="name" class="form-control" name="name" value="{{ $user->name }}">
                                                                    @error('name')
                                                                        <span class="invalid-feedback" role="alert" style="display: block">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="from-group mb-3">
                                                                    <label for="permission">Role</label>
                                                                    <select class="form-control" name="roles">
                                                                        @foreach ($roles as $role)
                                                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('roles')
                                                                        <span class="invalid-feedback" role="alert" style="display: block">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="float-end">
                                                                    <button type="submit" class="btn btn-warning">Submit</button>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- End edit modal -->

                                        @empty
                                            <tr>
                                                <td colspan="5"><span><center>No record found</center></span></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{ $users->links('layouts.components.pagination') }}
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
        let listingUrl = "{{ route('admin.user-management.list') }}";
        window.location.href = listingUrl + "?" + $('#filterForm').serialize();
    });

</script>


<script type="text/javascript">
    // // Jquery Scripts
    $(document).ready(function () {

        $(document).on('click', '.change_status', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var changeTo =  $(this).data('changeTo');
            confirmDelete(id, changeTo);
        });

        function confirmDelete(id, changeTo) {
            Swal.fire({
                title: 'Warning',
                text: "You are about to change the access of this user.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Proceed'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('changeUserStatus_' + id).submit()
                }
            })
        }

    });

</script>
@endsection
