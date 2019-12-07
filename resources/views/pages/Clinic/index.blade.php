@extends('adminlte::page')

@section('title', 'Clinics')

@section('content_header')
    <h1>Clinics</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <table id="clinic-list" class="table table-bordered table-striped" role="grid">
                    <thead>
                    <tr role="row">
                        <th>Name</th>
                        <th>Address</th>
                        <th>Landline</th>
                        <th>Mobile No</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
@stop

@section('js')
    <script>
        $(function() {
            $('#clinic-list').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('clinics.list') !!}',
                columns: [
                    { data: 'name', name: 'name'},
                    { data: 'address', name: 'address'},
                    { data: 'landline', name: 'landline'},
                    { data: 'mobile', name: 'mobile' },
                    { data: 'status', name: 'status'},
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                responsive:true,
                order:[0,'desc']
            });
        });
    </script>
@stop