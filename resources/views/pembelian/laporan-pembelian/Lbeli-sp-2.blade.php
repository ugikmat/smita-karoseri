@extends('adminlte::page')

@section('title', 'Laporan SP')

@section('content_header')
    <h1>Detail Piutang SP</h1>

@stop

@section('css')

@stop

@section('content')

<div class="cotainer-fluid form-inline">
  <div class="row">
    <input type="hidden" id="tgl" value="{{session('tgl_laporan_dompul')}}" readonly>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Tanggal Awal : {{session('tgl_laporan_dompul')}}
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Tanggal Akhir : {{session('tgl_laporan_dompul')}}
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Nama Kasir : (nama)
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Nama Logistic : (nama)
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Nama PIC : (nama)
    </div>
  </div>
  <div class="row">
    <input type="hidden" id="id_sales" value="{{$sales->id_sales}}" readonly>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
         ID Canvaser :<strong>{{$sales->id_sales}}</strong>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Nama Canvaser : <strong>{{$sales->nm_sales}}</strong>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">

    </div>
  </div>
</div>
<br><br>

<table id="l-beli-sp-2-table" class="table responsive" width="100%">
    <thead>
    <tr>
        <th>No.</th>
        <th>Nama RO</th>
        <th>Total Tagihan</th>
        <th>Piutang</th>
    </tr>
    </thead>
    <tfoot>
      <tr>
        <td></td>
        <td><b>Grand Total</b></td>
        <td><input type="text" name="tagihan" id="tagihan" class="form-control" value="{{number_format($total_penjualan,0,"",".")}}" readonly></td>
        <td><input type="text" name="piutang" id="piutang" class="form-control" value="{{number_format($total_piutang,0,"",".")}}" readonly> </td>
      </tr>
    </tfoot>
</table>
<br>
  <a href="{{URL::previous()}}" class="pull-left"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</button></a>

@stop

@section('js')
<script>
  var id = $('#id_sales').val();
  var tgl = $('#tgl').val();
  console.log('/laporan-penjualan/sp/piutang/'+id);
  var t = $('#l-beli-sp-2-table').DataTable({
            serverSide: true,
            processing: true,
            stateSave: true,
            ajax: '/operasional/smita/laporan-penjualan/sp/piutang/'+id+'/'+tgl,
            "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
                } ],
            "order": [[ 1, 'asc' ]],
            columns: [
                {data: 'index'},
                {data: 'nm_cust'},
                {data: 'total_penjualan'},
                {data: 'piutang'}
            ]
        });
        t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
          } );
        } ).draw();
</script>
@stop
