@extends('adminlte::page')

@section('title', 'Persediaan')

@section('content_header')
    <h1>Mutasi SP</h1>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">
<style>
  th{
    text-align: center;
    margin: auto;
    padding: 10%;
  }
</style>
@stop

@section('content')
<div class="container-fluid">
  <form class="invoice-sp repeater" action="" method="post">
  @csrf
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Tanggal Penjualan :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_penjualan" name="tgl_penjualan" value="{{session('now')}}"
      </div>
    </div>
  </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
          Nama Canvaser :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-8">
        <select id="sales" required="required" name="sales" placeholder="Pilih Nama Canvaser" class="chosen-select">
              <option value="" selected disabled>Pilih Nama Canvaser</option>
              @isset($saless)
                  @foreach ($saless as $data)
                  <option value="{{ $data->id_sales }}">{{ $data->nm_sales }}</option>
                  @endforeach
              @endisset
        </select>
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <button class="btn btn-success" type="submit" name="button"><i class="fa fa-caret-square-o-right"></i>  Tampilkan</button>
    </div>
</div>
<br><br>

<table id="mutasi-sp-table" class="table responsive" width="100%">
    <thead>
      <tr>
        <th>Nama Produk</th>
        <th>Stok Awal</th>
        <th>Stok Masuk</th>
        <th>Stok Keluar</th>
        <th>Stok Akhir</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td><b>Total Mutasi</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tfoot>
</table>


@stop

@section('js')
<script src="{{ asset('/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
  $(".chosen-select").chosen()
</script>
<script>
  $('.datepicker').datepicker({
  });
</script>
<script>
    $(function () {
        $('#mutasi-sp-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: 'mutasi-sp-data',
            columns: [
              {data: 'indeks'},
              {data: 'id_produk'},
              {data: 'stok_awal'},
              {data: 'stok_masuk'},
              {data: 'stok_keluar'},
              {data: 'jumlah_stok'}
            ]
        });
    });
</script>
@stop
