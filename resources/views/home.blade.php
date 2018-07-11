<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
@extends('adminlte::page')

@section('title', 'Sistem Inventori')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in {{ Auth::user()->name }}!</p>
@stop