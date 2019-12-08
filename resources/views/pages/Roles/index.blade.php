@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Roles</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Roles</li>
            </ol>
        </div><!-- /.col -->
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            {{--<button type="button" class="btn btn-block bg-gradient-primary btn-flat">Primary</button>--}}
            <button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#add-new-role-modal"><i class="fa fa-plus-circle"></i> Add New</button>
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


    <!--add new roles modal-->
    <div class="modal fade" id="add-new-role-modal">
        <form role="form" id="role-form">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Role</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group role">
                            <label for="role">Role Name</label><span class="required">*</span>
                            <input type="text" name="role" class="form-control" id="role">
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
    <!--end add new roles modal-->

    <!--add new roles modal-->
    <div class="modal fade" id="edit-role-modal">
        <form role="form" id="edit-role-form">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Role</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group role">
                            <label for="role">Role Name</label><span class="required">*</span>
                            <input type="text" name="role" class="form-control" id="role">
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
    <!--end add new roles modal-->

@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/datatables/css/dataTables.bootstrap4.min.css')}}">
@stop

@section('js')
    <script src="{{asset('vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
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
        });
    </script>
{{--    <script>--}}
{{--        toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')--}}
{{--    </script>--}}
@stop