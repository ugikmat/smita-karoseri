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
    padding: 10%;
  }
</style>
@stop

@section('content')
<div class="cotainer-fluid form-inline">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInput">Pilih Tanggal Mutasi</button>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Nama Kasir : (nama)
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Tanggal Cetak Laporan : {{Carbon\Carbon::now()->format('d/m/Y')}}
    </div>
  </div>
</div>
<br><br>

<table id="mutasi-dompul-table" class="table responsive" width="100%">
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

<!--Modal input-->
<div class="modal fade bs-example-modal-lg" id='modalInput' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Input Tanggal Mutasi Dompul</h4>
      </div>
      <div class="modal-body">
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Awal
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      @if(Session::has('tgl_stok_dompul'))
                        <input class="datepicker col-md-7 col-xs-12" data-date-format="dd-mm-yyyy" id="tgl_awal" name="tgl_awal" value="{{session('tgl_stok_dompul')}}">
                      @else
                        <input class="datepicker col-md-7 col-xs-12" data-date-format="dd-mm-yyyy" id="tgl_awal" name="tgl_awal" value="{{Carbon\Carbon::now()->format('d-m-Y')}}">
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Akhir
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      @if(Session::has('tgl_stok_dompul'))
                        <input class="datepicker col-md-7 col-xs-12" data-date-format="dd-mm-yyyy" id="tgl_akhir" name="tgl_akhir" value="{{session('tgl_stok_dompul')}}">
                      @else
                        <input class="datepicker col-md-7 col-xs-12" data-date-format="dd-mm-yyyy" id="tgl_akhir" name="tgl_akhir" value="{{Carbon\Carbon::now()->format('d-m-Y')}}">
                      @endif
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="reset"> <i class="fa fa-repeat"></i> Kosongkan</button>
                      <button type="button" id="save" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-ok"></i>Tampilkan Mutasi Dompul</button>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

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
            ajax: `/stok-dompul/data/${$tgl_awal}/${$tgl_akhir}`,
            columns: [
                // {data: 'indeks'},
                {data: 'nama'},
                {data: 'stok_awal'},
                {data: 'stok_masuk'},
                {data: 'stok_keluar'},
                {data: 'jumlah_stok'}
            ]
        });
        $('#save').on('click',function(event) {
          $tgl_awal =  $('#tgl_awal').val();
          $tgl_akhir =  $('#tgl_akhir').val();
          t.ajax.url(`/stok-dompul/data/${$tgl_awal}/${$tgl_akhir}`).load();
        });
    });
</script>
@stop
