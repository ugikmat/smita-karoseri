@extends('adminlte::page')

@section('title', 'Laporan SP')

@section('content_header')
    <h1>Detail Piutang SP</h1>

@stop

@section('css')

@stop

@section('content')

<div class="cotainer-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Tanggal Awal
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        : 121212
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Tanggal Akhir
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        : 232312
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Nama Kasir
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        : Joni
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Nama Logistic
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        : gege
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Nama PIC
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        : jhon
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        ID Canvaser :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        wkwkwk
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Nama Canvaser :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        wkwkwk
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">

    </div>
  </div>
</div>
<br><br>

<table id="lp-sp-2-table" class="table responsive" width="100%">
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
        <td><input type="text" name="tagihan" id="tagihan" class="form-control" value="" readonly></td>
        <td><input type="text" name="piutang" id="piutang" class="forn-control" value="" readonly> </td>
      </tr>
    </tfoot>
</table>

@stop

@section('js')
<!-- <script>
  var id = $('#id_sales').val();
  console.log('/laporan-penjualan/piutang/'+id);
  var t = $('#lp-sp-2-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/laporan-penjualan/piutang/'+id,
            "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
                } ],
            "order": [[ 1, 'asc' ]],
            columns: [
                {data: 'index'},
                {data: 'nm_cust'},
                {data: 'grand_total'},
                {data: 'piutang'}
            ]
        });
        t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
          } );
        } ).draw();
</script> -->
@stop
