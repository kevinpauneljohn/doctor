@extends('adminlte::page')

@section('title', 'User | Client')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">User | Client</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Client</li>
            </ol>
        </div><!-- /.col -->
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @can('add client')
                <button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#add-new-client-modal"><i class="fa fa-plus-circle"></i> Add New</button>
            @endcan

        </div>
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <table id="roles-list" class="table table-bordered table-striped" role="grid">
                    <thead>
                    <tr role="row">
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Role</th>
                        <th width="20%">Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


    @can('add client')
        <!--add new client modal-->
        <div class="modal fade" id="add-new-client-modal">
            <form role="form" id="client-form">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Client</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container mt-3">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#personal-details">Personal Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#billing-address">Billing Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#access-details">Access Details</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="personal-details" class="container tab-pane active">
                                        <div class="form-group firstname">
                                            <label for="firstname">First Name</label><span class="required">*</span>
                                            <input type="text" name="firstname" class="form-control" id="firstname">
                                        </div>
                                        <div class="form-group middlename">
                                            <label for="middlename">Middle Name</label>
                                            <input type="text" name="middlename" class="form-control" id="middlename">
                                        </div>
                                        <div class="form-group lastname">
                                            <label for="lastname">Last Name</label><span class="required">*</span>
                                            <input type="text" name="lastname" class="form-control" id="lastname">
                                        </div>
                                        <div class="form-group birthday">
                                            <label for="birthday">Date Of Birth</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input name="birthday" id="birthday" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <div class="form-group gender">
                                            <p><strong>Gender</strong></p>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="gender1" name="gender" value="male">
                                                <label for="gender1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="gender2" name="gender" value="female">
                                                <label for="gender2">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                </div>
                                    <div id="billing-address" class="container tab-pane">
                                        <div class="form-group address">
                                            <label for="address">Address</label><span class="required">*</span>
                                            <input type="text" name="address" class="form-control" id="address">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 region">
                                                <label for="region">Region</label><span class="required">*</span>
                                                <input type="text" name="region" class="form-control" id="region">
                                            </div>
                                            <div class="col-lg-6 state">
                                                <label for="state">State</label><span class="required">*</span>
                                                <input type="text" name="state" class="form-control" id="state">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 region">
                                                <label for="city">City</label><span class="required">*</span>
                                                <input type="text" name="city" class="form-control" id="city">
                                            </div>
                                            <div class="col-lg-6 state">
                                                <label for="postalcode">Postal Code</label><span class="required">*</span>
                                                <input type="text" name="postalcode" class="form-control" id="postalcode">
                                            </div>
                                        </div>
                                    </div>

                                    <div id="access-details" class="container tab-pane">
                                        <div class="form-group email">
                                            <label for="email">Email</label><span class="required">*</span>
                                            <input type="email" name="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group username">
                                            <label for="username">Username</label><span class="required">*</span>
                                            <input type="text" name="username" class="form-control" id="username">
                                        </div>
                                        <div class="form-group password">
                                            <label for="password">Username</label><span class="required">*</span>
                                            <input type="password" name="password" class="form-control" id="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Re-type Password</label><span class="required">*</span>
                                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </form>
        </div>
        <!--end add new client modal-->
    @endcan

    @can('edit user')
        <!--edit user modal-->
        <div class="modal fade" id="edit-role-modal">
            <form role="form" id="edit-role-form" action="{{route('roles.update',['role' => 1])}}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="url" id="url" value="roles">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Role</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group editRole">
                                <label for="editRole">Role Name</label><span class="required">*</span>
                                <input type="text" name="editRole" class="form-control" id="editRole">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </form>
        </div>
        <!--end edit user modal-->
    @endcan

    @can('delete user')
        <!--add new user modal-->
        <div class="modal fade" id="delete-role-modal">
            <form role="form" id="delete-role-form">
                @csrf
                @method('DELETE')
                <input type="hidden" name="url" id="url" value="roles">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-body">
                            <p class="delete_role">Delete Role: <span class="role-name"></span></p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-light">Delete</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </form>
        </div>
        <!--end add new user modal-->
    @endcan

@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/datatables/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <style type="text/css">
        .delete_role{
            font-size: 20px;
        }
    </style>
@stop

@section('js')
    @can('view user')
        <script src="{{asset('vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('vendor/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
        <script src="{{asset('vendor/inputmask/inputmask/inputmask.date.extensions.js')}}"></script>
        <Script src="{{asset('js/role.js')}}"></Script>
        <script>
            $(function() {
                $('#roles-list').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('roles.list') !!}',
                    columns: [
                        { data: 'name', name: 'name'},
                        { data: 'action', name: 'action', orderable: false, searchable: false}
                    ],
                    responsive:true,
                    order:[0,'desc']
                });

                //Money Euro
                $('[data-mask]').inputmask()
            });
        </script>
    @endcan
@stop