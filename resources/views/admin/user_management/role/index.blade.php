{{-- Role Listingsd
<table>
    <thead>
        <th>Role</th>
        <th>Permission</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($roles as $role)
            <tr>
                <td>{{$role->name}}</td>
                <td>
                    @foreach ($role->permissions as $perm)
                        {{$perm->name}};
                    @endforeach
                </td>
                <td>
                    <button>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table> --}}
{{-- @php
    use App\Helper;
@endphp --}}
@extends('layouts.app')

@section('title', 'User Management Role List')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex flex-column align-items-start">
                        <h4 class="mb-sm-0 font-size-18 text-warning">User Management Role List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">User Management</a></li>
                                <li class="breadcrumb-item active">User Management Role List</li>
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

                        @if($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <header>Ops! We found some error/s.</header>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        <strong>{{ $error }}</strong>
                                    </li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#roleModal">
                                        <i class="fas fa-plus-circle"></i>&nbsp;Create
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('admin.user-management.role.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="roleModalLabel">Create New Role</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="from-group mb-3">
                                                            <label for="name">Role Name</label>
                                                            <input type="text" class="form-control" name="name">
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="from-group mb-3">
                                                            <label for="permission">Permissions</label>
                                                            <select class="permission-selection" style="width: 100%" name="permissions[]" multiple="multiple">
                                                                @foreach ($permissions as $permission)
                                                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('permissions')
                                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-warning">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Role</th>
                                            <th>Permissions</th>
                                            <th>User Count</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                        <tr>
                                            <td><span class="fw-bold">{{$role->name}}</span></td>
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
                                                @foreach ($role->permissions as $perm)

                                                <span class="badge rounded-pill {{ $pill_bg[$i] }} text-uppercase">{{$perm->name}}</span>
                                                @php
                                                    $i++;
                                                @endphp
                                                @endforeach
                                            </td>
                                            <td>{{ Helper::user_role_count($role->name) }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm edit_row" data-id="{{ $role->id }}" data-bs-toggle="modal" data-bs-target="#roleEditModal{{ $role->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade roleEditModal" id="roleEditModal{{ $role->id }}" tabindex="-1" aria-labelledby="roleEditModalLabel{{ $role->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action="{{ route('admin.user-management.role.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="roleEditModalLabel{{ $role->id }}">Edit Role</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="from-group mb-3">
                                                                        <label for="name">Role Name</label>
                                                                        <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                                                                        @error('name')
                                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="from-group mb-3">
                                                                        {{-- @php
                                                                             $perms = Helper::get_permissions($role)
                                                                        @endphp --}}
                                                                        {{-- {{ $role->permissions->pluck('name'); }} --}}
                                                                        <label for="permission">Permissions</label><br>
                                                                        <select class="permission-selection-edit" style="width: 100%" name="permissions[]" multiple="multiple">
                                                                            @foreach ($permissions as $permission)
                                                                                @if (in_array($permission->name, $role->permissions->pluck('name')->toArray()))
                                                                                    <option value="{{ $permission->name }}" selected>{{ $permission->name }}</option>
                                                                                    @continue
                                                                                @endif
                                                                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('permissions')
                                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>


                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-warning">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>


                                                <button data-id="{{ $role->id }}" class="btn btn-danger btn-sm delete_row"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                <form id="deleteRole_{{$role->id}}" action="{{ route('admin.user-management.role.destroy', $role->id) }}" method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    {{-- <div class="d-flex justify-content-center">
                                    {!! $products->links() !!}
                                </div> --}}
                                </table>
                            </div>
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
    $(document).ready(function() {
        $('.permission-selection').select2({
            dropdownParent: $('#roleModal'),
            width: 'resolve'
        });

    });

    $(document).on('click', '.edit_row', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        $('.permission-selection-edit').select2({
            dropdownParent: $('#roleEditModal' + id),
            width: 'resolve'
        });
        // confirmDelete(id);
    });

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
                document.getElementById('deleteRole_' + id).submit()
            }
        })
    }

</script>
@endsection
