@extends('adminlte::page')

@section('title', 'Penjualan Dompul Head')

@section('content_header')
    <h1>Penjualan Dompul Head</h1>

@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">
<style media="screen">
  a{
    text-decoration: none;
    color: white;
  }
</style>
@stop

@section('content')

<div class="cotainer-fluid">
  <form action="/penjualan/laporan-penjualan/dompul-head-show" method="post">
    @csrf
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
        <label class="control-label" for="first-name">Pilih Tanggal :</label>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <input class="datepicker" data-date-format="dd-mm-yyyy" name="tgl" value="{{session('tgl_laporan_head')}}" required>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <button class="btn btn-danger" type="reset"> <i class="fa fa-repeat"></i> Kosongkan</button>
      <button type="submit" class="btn btn-primary" name="action" value="user"><i class="glyphicon glyphicon-user"></i> Tampilkan Laporan Transaksi User</button>
      <button type="submit" class="btn btn-success" name="action" value="server"><i class="fa fa-server"></i> Tampilkan Laporan Transaksi Server</button>
    </div>
  </div>
  </form>
</div>

@stop

@section('js')
<script src="{{ asset('/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
  $('.datepicker').datepicker({
  });
</script>
@stop
