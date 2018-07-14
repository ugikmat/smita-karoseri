@extends('adminlte::page')

@section('title', 'Sistem Inventori')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in {{ Auth::user()->name }}!</p>
    <!-- Button to Open the Modal -->
@stop