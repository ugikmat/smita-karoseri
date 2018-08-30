@extends('adminlte::page')

@section('title', 'Laporan')

@section('content_header')
    <h1>Surat Pemesanan Kendaraan Customer</h1>

@stop

@section('content')

<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-truck"></i> Laporan</a></li>
  <li class="active">SPKC</li>
</ol>
<!--href="{{ URL::to('printExcel/xlsx') }}"-->
<div class="form-group">
<button class="btn btn-success pull-right" id="excel" target="_blank"> Excel</button>
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
        <th>No</th><!-- /.sebagai ID -->
        <th>No SPKC</th>
        <th>Nama Customer</th>
        <th>Jenis Karoseri</th>
        <th>Tanggal SPKC</th>
        <th>Jumlah Unit</th>
        <th>Harga Total</th>
        <th>Total PPN</th>
        <th>Persentase</th>
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
                'url':"{{route('laporanspkc')}}",
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
                {data: 'jumlah_unit'},
                {data: 'harga_total'},
                {data: 'ppn'},
                {data: 'persen'}
            ]
        });

        $('#cari').on('click', function (){
          table.ajax.reload();
        })

        $('#excel').on('click', function(){
          window.open('printExcel/xlsx?param_a=' + $('input[name="tanggal_awal"]').val() + '&param_b=' + $('input[name="tanggal_akhir"]').val(),'_blank')
        })

</script>

@stop
