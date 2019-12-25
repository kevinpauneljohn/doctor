@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Client | Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Client</a></li>
                <li class="breadcrumb-item active">Clients Profile</li>
            </ol>
        </div><!-- /.col -->
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('images/profile/male_profile.png')}}" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ucfirst($user->firstname)}} {{isset($user->middlename) ? ucfirst($user->middlename)[0].'.':''}} {{ucfirst($user->lastname)}}</h3>

                    <p class="text-muted text-center">
                        @foreach($user->getRoleNames() as $roles)
                                <label class="badge bg-cyan">{{$roles}}</label>
                            @endforeach
                    </p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Username</b> <a class="float-right">{{$user->username}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone</b> <a class="float-right">{{$user->landline}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Mobile Phone</b> <a class="float-right">{{$user->mobileNo}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{$user->email}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Address</b> <a class="float-right">{{$user->address}}, {{$address->getCityName($user->refcitymun)}}, {{$address->getStateName($user->refprovince)}}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Account Details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-check-circle mr-1"></i> Status</strong>

                    <p class="text-muted">
                        Active
                    </p>

                    <hr>

                    <strong><i class="fas fa-id-card mr-1"></i> License</strong>

{{--                    <p class="text-muted">{{$license}}</p>--}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#clinics" data-toggle="tab">Clinics</a></li>
                        <li class="nav-item"><a class="nav-link" href="#employee" data-toggle="tab">Employee</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="clinics">
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="employee">
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
@stop

@section('css')
@stop

@section('js')
@stop