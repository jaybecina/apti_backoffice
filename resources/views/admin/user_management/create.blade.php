@extends('layouts.app')

@section('page-styles')
{{-- <style>
    .file-icon{
        font-size: 10px !important;
    }
</style> --}}
@endsection

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex flex-column align-items-start">
                        <h4 class="mb-sm-0 font-size-18 text-warning">User Management</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">User Management</a></li>
                                <li class="breadcrumb-item fw-bold">New User</li>
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
                        <form action="{{ route('admin.user-management.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <h4 class="mb-3">Account Details</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="email">E-mail address</label>
                                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="d-flex justify-content-between">
                                                    <label for="password">Password</label>
                                                    <span class="ml-5">
                                                        <input type="checkbox" name="cb_gen_pass" id="cb_gen_pass">
                                                        Generate Password
                                                    </span>
                                            </div>
                                            <input type="password" class="form-control" name="password" id="password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="role">Asign Role</label>
                                            <select name="role" id="role" class="form-control role-selection">
                                                <option></option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h4 class="mb-3">User Information</h4>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="first_name">First Name</label>
                                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" class="form-control">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="middle_name">Middle Name</label>
                                            <input type="text" name="middle_name" id="middle_name" value="{{ old('middle_name') }}" class="form-control">
                                            @error('middle_name')
                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="form-control">
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="contact_number">Contact number</label>
                                            <input type="text" name="contact_number" value="{{ old('contact_number') }}" id="contact_number" class="form-control">
                                            @error('contact_number')
                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="profile_picture">Profile Picture</label>
                                            <input type="file" id="profile_picture" name="profile_picture" class="dropify" data-height="300"/>
                                        </div>

                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-warning">Register</button>
                                    <a type="submit" class="btn btn-default" style="border: 0.1px solid #D8D8D8; margin-left: 8px;" href="{{ route('admin.user-management.list') }}">Cancel</a>
                                </div>
                            </div>
                        </form>
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
    $(document).ready(function(){
        $('.role-selection').select2({
            placeholder: "Select a role",
            width: 'resolve'
        });

        $('.dropify').dropify({
            tpl: {
                wrap:            '<div class="dropify-wrapper"></div>',
                loader:          '<div class="dropify-loader"></div>',
                message:         '<div class="dropify-message"><span class="file-icon" /> <p style="font-size: 15px">Drag and drop a file here or click</p></div>',
                preview:         '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div>',
                filename:        '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                clearButton:     '<button type="button" class="dropify-clear">Remove</button>',
                errorLine:       '<p class="dropify-error">Ooops, something wrong happended.</p>',
                errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
            }
        });
    });

    document.getElementById("cb_gen_pass").onclick = function(){
        document.getElementById("password").disabled = this.checked;
        document.getElementById("password_confirmation").disabled = this.checked;
        }
</script>
@endsection
