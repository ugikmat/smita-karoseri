@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Selamat datang <strong>{{ Auth::user()->name }}</strong>!</p>
@stop
