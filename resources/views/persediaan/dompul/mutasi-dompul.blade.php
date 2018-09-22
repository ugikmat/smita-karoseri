@extends('adminlte::page')

@section('title', 'Persediaan')

@section('content_header')
    <h1>Mutasi Dompul</h1>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">
<style>
  th{
    text-align: center;
    margin: auto;
  }
  td{
    text-align: center;
  }
</style>
@stop

@section('content')
<div class="cotainer-fluid form-inline">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Tanggal Awal&emsp;&nbsp;&nbsp;:
        @if(Session::has('tgl_stok_dompul'))
          <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_awal" name="tgl_awal" value="{{session('tgl_stok_dompul')}}">
        @else
          <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_awal" name="tgl_awal" value="{{Carbon\Carbon::now()->format('d-m-Y')}}">
        @endif
    </div>

    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Tanggal Akhir&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        @if(Session::has('tgl_stok_dompul'))
          <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_akhir" name="tgl_akhir" value="{{session('tgl_stok_dompul')}}">
        @else
          <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_akhir" name="tgl_akhir" value="{{Carbon\Carbon::now()->format('d-m-Y')}}">
        @endif
    </div>

    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <button type="button" id="save" class="btn btn-success" ><i class="fa fa-caret-square-o-right"></i>Tampilkan Mutasi Dompul</button>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Nama Kasir&emsp;&emsp;: (nama)
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Tanggal Cetak Laporan&emsp;: {{Carbon\Carbon::now()->format('d/m/Y')}}
    </div>
  </div>
</div>
<br><br>

<table id="mutasi-dompul-table" class="table responsive table-bordered" width="100%">
    <thead>
    <tr>
        <th>Nama Produk</th>
        <th>Stok Awal</th>
        <th >Stok Masuk</th>
        <th >Stok Keluar</th>
        <th >Stok Akhir</th>
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
<script>
  $('.datepicker').datepicker({
  });
</script>
<script>
    $(function () {
        $tgl_awal =  $('#tgl_awal').val();
        $tgl_akhir =  $('#tgl_akhir').val();
        var t = $('#mutasi-dompul-table').DataTable({
            serverSide: true,
            processing: true,
            stateSave: true,
            lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
            ajax: `/operasional/smita/stok-dompul/data/${$tgl_awal}/${$tgl_akhir}`,
            columns: [
                // {data: 'indeks'},
                {data: 'produk'},
                {data: 'stok_awal'},
                {data: 'stok_masuk'},
                {data: 'stok_keluar'},
                {data: 'jumlah_stok'}
            ],
            dom: 'lBrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        });
        $('#save').on('click',function(event) {
          $tgl_awal =  $('#tgl_awal').val();
          $tgl_akhir =  $('#tgl_akhir').val();
          t.ajax.url(`/operasional/smita/stok-dompul/data/${$tgl_awal}/${$tgl_akhir}`).load();
        });
    });
</script>
@stop
