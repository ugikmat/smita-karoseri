@extends('adminlte::page')

@section('title', 'Permintaan')

@section('content_header')
    <h1>Surat Pemesanan Kendaraan Customer</h1>

@stop

@section('content')

<!-- Main content -->
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-truck"></i> Surat Pemesanan Karoseri
        <small class="pull-right">{{$tgl}}</small>
      </h2>
    </div><!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      From
      <address>
        <strong>CV Wijaya Baru</strong><br>
        Jl. Raya Kedamean No.168 (Sebelah Makam Pahlawan)<br>
        Gresik<br>
        Phone: +(62) 0812-3322-5000<br>
        Web: www.wijayabaru.co.id
      </address>
    </div><!-- /.col -->
    <div class="col-sm-4 invoice-col">
      To
      <address>
        <strong>{{$data['nm_cust']}}</strong><br>
        {{$data['alamat_cust']}}<br>
        {{$data['nm_perusahaan']}}<br>
        {{$data['no_hp']}}<br>
        {{$data['jabatan']}}<br>
      </address>
    </div><!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b>No SPK {{$data['id_spkc']}}/SPK/{{$rm}}/{{$thn}}</b><br>
      <br>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Qty</th>
            <th>Jenis Karoseri</th>
            <th>Detail Spesifikasi</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$data['jumlah_unit']}}</td>
            <td>{{$data['jenis_karoseri']}}</td>
            <td>{!!$data['ket']!!}</td>
            <td><Label>Rp.</label> {{number_format($data['harga_total']).""}}</td>
          </tr>
        </tbody>
      </table>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-6">
      <p class="lead">Payment Methods:</p>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="middle-name" class="form-control col-md-7 col-xs-12" name="lokasi" type="text" Value="{{$data['keterangan']}}" readonly>
      </div>

    </div><!-- /.col -->
    <div class="col-xs-6">
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th style="width:50%">Subtotal:</th>
            <td><label>Rp.</label>{{number_format($data['harga_total']).""}}</td>
          </tr>
          <tr>
            <th>Pajak (10%)</th>
            <td><label>Rp.</label>0</td>
          </tr>
          <tr>
            <th>Total:</th>
            <td><label>Rp.</label>{{number_format($data['harga_total']).""}}</td>
          </tr>
        </table>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">
      <a href="/viewprint/{{$data['id_spkc']}}" id="print" target="_blank" class="btn btn-info pull-right"><i class="fa fa-print pull-right"></i> Print</a>
    </div>
  </div>
</section><!-- /.content -->
@stop

@section('js')
<script>

</script>
@stop
