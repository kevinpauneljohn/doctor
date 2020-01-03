@extends('adminlte::page')

@section('title', 'Terminals')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Terminals</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Terminals</li>
            </ol>
        </div><!-- /.col -->
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @can('add terminal')
                <button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#add-new-terminal-modal"><i class="fa fa-plus-circle"></i> Add New</button>
            @endcan

        </div>
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <table id="roles-list" class="table table-bordered table-striped" role="grid">
                    <thead>
                    <tr role="row">
                        <th>Date Registered</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Mobile No</th>
                        <th>Phone</th>
                        <th>Clinics</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Date Registered</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Mobile No</th>
                        <th>Phone</th>
                        <th>Clinics</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    @can('add terminal')
        <!--add new client modal-->
        <div class="modal fade" id="add-new-terminal-modal">
            <form role="form" id="terminal-form">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Terminal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container mt-3">
                                <div class="form-group user">
                                    <label for="user">Username</label><span class="required">*</span>
                                    <select class="form-control" name="user" id="user" style="width: 100%;">
                                        <option value=""> -- Select User -- </option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->username}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group device">
                                    <label for="device">Device</label><span class="required">*</span>
                                    <select class="form-control" name="device" id="device" style="width: 100%;">
                                        <option value=""> -- Select Device -- </option>
                                        <option value="Desktop">Desktop</option>
                                        <option value="Laptop">Laptop</option>
                                        <option value="Tablet">Tablet</option>
                                        <option value="Mobile Phone">Mobile Phone</option>
                                    </select>
                                </div>
                                <div class="form-group description">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description"></textarea>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </div>
            </form>
        </div>
        <!--end add new client modal-->
    @endcan
@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/datatables/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}">
    <style type="text/css">
        .delete_role{
            font-size: 20px;
        }
    </style>
@stop

@section('js')
    @can('view terminal')
        <script src="{{asset('vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('vendor/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
        <script src="{{asset('vendor/inputmask/inputmask/inputmask.date.extensions.js')}}"></script>
        <script src="{{asset('vendor/select2/js/select2.full.min.js')}}"></script>
        <Script src="{{asset('js/terminal.js')}}"></Script>
        <script>
            $(function() {
                $('#roles-list').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('clients.list') !!}',
                    columns: [
                        { data: 'created_at', name: 'created_at'},
                        { data: 'firstname', name: 'firstname'},
                        { data: 'middlename', name: 'middlename'},
                        { data: 'lastname', name: 'lastname'},
                        { data: 'username', name: 'username'},
                        { data: 'mobileNo', name: 'mobileNo'},
                        { data: 'landline', name: 'landline'},
                        { data: 'clinics', name: 'clinics'},
                        { data: 'action', name: 'action', orderable: false, searchable: false}
                    ],
                    responsive:true,
                    order:[0,'desc']
                });

                //Money Euro
                $('[data-mask]').inputmask();
                $('.select2').select2();
            });
        </script>
    @endcan
@stop