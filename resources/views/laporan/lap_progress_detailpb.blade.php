@extends('adminlte::page')

@section('title', 'Progress')

@section('content_header')
    <h1>Laporan Detail Progress Pekerjaan Pemborong</h1>

@stop
@section('content')

<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-truck"></i> Laporan</a></li>
  <li class="active">Progress Detail Pekerjaan Pemborong</li>
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
      <th>No SPKB</th>
      <th>Nama Pemborong</th>
      <th>Tanggal SPKB</th>
      <th>Jabatan</th>
      <th>Jenis Karoseri</th>
      <th>Jenis Pekerjaan</th>
      <th>Keterangan</th>
      <th>SPV</th>
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
        'url':"{{route('laporanprogressdetailpb')}}",
        'data':function(d){
            d.param_a = $('input[name="tanggal_awal"]').val(),
            d.param_b = $('input[name="tanggal_akhir"]').val()
        }
    },
    columns: [
        {data: 'DT_Row_Index'},
        {data: 'id_spkpb'},
        {data: 'nm_pb'},
        {data: 'tgl_spkpb'},
        {data: 'jenis_pb'},
        {data: 'jenis_karoseri'},
        {data: 'jenis_pekerjaan'},
        {data: 'keterangan'},
        {data: 'nm_spv'}
    ]
});

$('#cari').on('click', function (){
  table.ajax.reload();
})

$('#excel').on('click', function(){
  window.open('printProgressDetailPBExcel/xlsx?param_a=' + $('input[name="tanggal_awal"]').val() + '&param_b=' + $('input[name="tanggal_akhir"]').val(),'_blank')
})

</script>

@stop
