@extends('adminlte::page')

@section('title', 'Penjualan Dompul')

@section('content_header')
    <h1>Detail Penjualan Dompul</h1>
@stop

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Tanggal Penjualan
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : tanggalan
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    </div>
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 pull-right">
      <span class="pull-right"><button type="button" name="button">hai</button></span>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama Kasir
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : joni
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama Logistik
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : john
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama PIC
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : pras
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        ID Canvaser
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : 123123123
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama Canvaser
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : qwerty
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Tanggal Cetak Penjualan
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : tanggalan
      </div>
    </div>
  </div>

<table id="invoice-dompul-table" class="table table-bordered">
    <thead>
    <tr>
        <th>No.</th>
        <th>Nama RO</th>
        <th>Qty Penjualan</th>
    </tr>
    </thead>
</table>
@stop

@section('js')
<script>
    $(function () {
        $('#invoice-dompul-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '',
            columns: [
                {data: 'no'},
                {data: 'nama-ro'},
                {data: 'qty-penjualan'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@stop
