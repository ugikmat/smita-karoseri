@extends('adminlte::page')

@section('title', 'Penjualan')

@section('content_header')
    <h1>Laporan Penjualan Tiap Unit</h1>

@stop

@section('content')

<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-truck"></i> Laporan</a></li>
  <li class="active">Penjualan Karoseri Tiap Unit</li>
</ol>

<div class="form-group">
<a href="" class="btn btn-success pull-right" id="excel" target="_blank"> Excel</a>
<a href="" class="btn btn-danger pull-right" id="pdf" target="_blank">PDF</a>
</div>

<div class="form-group">
  <label class="col-md-6 col-sm-6 col-xs-12">Tanggal <span class="required"></span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input id="tanggal_awal" name="tanggal_awal" type="date" class="ferry ferry-from">
      <input id="tanggal_akhir" name="tanggal_akhir" type="date" class="ferry ferry-from">
      <button id="cari" class="btn btn-info btn-flat">Cari!</button>
    </div>
  </div>

<!-- DataTable -->
  <div class="box-body">
    <table id="lap-table" class="table table-bordered table-striped">
      <thead>
    <tr>
        <th>No</th>
        <th>No SPKC</th>
        <th>Nama Customer</th>
        <th>Jenis Karoseri</th>
        <th>Tanggal SPKC</th>
        <th>Tanggal Pengerjaan</th>
        <th>Tanggal Serah Terima</th>
    </tr>
    </thead>
</table>
</div>
<!-- DataTable -->


@stop

@section('js')

<script>
var table = $('#lap-table').DataTable({
    serverSide: true,
    processing: true,
    ordering: false,
    paging: false,
    searching: false,
    info: false,
    ajax: {
        'url':"{{route('laporanpenjualanunit')}}",
        'data':function(d){
            d.param_a = $('input[name="tanggal_awal"]').val(),
            d.param_b = $('input[name="tanggal_akhir"]').val()
        }
    },
    columns: [
        {data: 'DT_Row_Index'},
        {data: 'id_spkc'},
        {data: 'nm_cust'},
        {data: 'jenis_karoseri'},
        {data: 'tanggal'},
        {data: 'tgl_mulai'},
        {data: 'tgl_akhir'}
    ]
});

$('#cari').on('click', function (){
  table.ajax.reload();
})

$('#excel').on('click', function(){
  window.open('printPenjualanUnitExcel/xlsx?param_a=' + $('input[name="tanggal_awal"]').val() + '&param_b=' + $('input[name="tanggal_akhir"]').val(),'_blank')
})

</script>

@stop
