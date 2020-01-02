@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <i class="fa fa-home"></i>

    {{\App\User::find('def93d36-87e1-4f68-a8a9-4a3cc63a62ac')->createToken('authToken')->accessToken}}
@stop

@section('css')
@stop

@section('js')
@stop