@extends('adminlte::page')

@section('title', 'Permintaan')

@section('content_header')
    <h1>Permintaan Bahan Baku</h1>

@stop

@section('content')

<!-- Main content -->
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-truck"></i> Permintaan Bahan Baku
        <small class="pull-right">{{$tglpbb}}</small>
      </h2>
    </div><!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">

      <address>
        <strong>{{$data['id_spkc']}}/SPK/{{$rm}}/{{$thn}}</strong><br>
        {{$data['nm_cust']}}<br>
        {{$data['nm_perusahaan']}}<br>
        {{$data['jenis_karoseri']}}<br>
        {{$data['jumlah_unit']}}
      </address>
    </div><!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b>No Permintaan Bahan Baku {{$data['id_pbb']}}/PBB/{{$rmpbb}}/{{$thnpbb}}</b><br>
      <br>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table id="mt-table" class="table table-striped">
        <thead>
          <tr>
            <th>Qty</th>
            <th>Material</th>
            <th>Ukuran</th>
            <th>Catatan</th>
          </tr>
        </thead>
      </table>
    </div><!-- /.col -->
  </div><!-- /.row -->


  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">
      <a href="/viewprintPBB/{{$data['id_pbb']}}" id="print" target="_blank" class="btn btn-info pull-right"><i class="fa fa-print pull-right"></i> Print</a>
    </div>
  </div>
</section><!-- /.content -->
@stop

@section('js')
<script>
$(function () {
    $('#mt-table').DataTable({
        serverSide: true,
        processing: true,
        paging: false,
        info: false,
        searching: false,
        ordering: false,
        ajax: '{{route("ppppp",$data["id_pbb"])}}',
        columns: [
            {data: 'jumlah_setuju'},
            {data: 'material'},
            {data: 'ukuran'},
            {data: 'catatan'}
        ]
    });
});

</script>
@stop
