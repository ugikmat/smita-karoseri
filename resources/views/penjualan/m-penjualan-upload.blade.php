@extends('adminlte::page')

@section('title', 'Penjualan Dompul')

@section('content_header')
    <h1>Penjualan Dompul</h1>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')
<div class="cotainer-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Tanggal Penjualan
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        : 121118
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">

    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInput">Input Tanggal Penjualan</button>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Nama Kasir
      </div>
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-6">
        : Ugik
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Nama Logistik
      </div>
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-6">
        : Jovi
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Nama PIC
      </div>
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-6">
        : Pras
      </div>
    </div>
  </div>
</div>

<!-- kolom data canvasser e pake warna iki yo gik, cek podo ambek buku panduan bgcolor="#afeeee" -->

<table id="m-penjualan-table" class="table responsive" width="100%">
    <thead>
    <tr>
        <th>No.</th>
        <th>Canvasser</th>
        <th>Qty</th>
        <th>5K</th>
        <th>10K</th>
        <th>Rupiah</th>
    </tr>
    </thead>
    <tfoot>
      <tr>
        <td></td>
        <td colspan="2"><b>Total Qty Penjualan Non Program</b></td>
        <td>harganya(dari database)</td>
        <td>harganya(dari database)</td>
        <td>harganya(dari database)</td>
      </tr>
      <tr>
        <td></td>
        <td colspan="2"><b>Total Qty Penjualan Program</b></td>
        <td>harganya(dari database)</td>
        <td>harganya(dari database)</td>
        <td>harganya(dari database)</td>
      </tr>
      <tr>
        <td></td>
        <td colspan="2"><b>Total All Penjualan</b></td>
        <td>harganya(dari database)</td>
        <td>harganya(dari database)</td>
        <td>harganya(dari database)</td>
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
        <h4 class="modal-title" id="myModalLabel">Input Monitoring Penjualan Upload Dompul</h4>
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

                <form id="editForm" method="POST" data-parsley-validate class="form-horizontal form-label-left" action="">
                  @csrf @method('put')
                  <div class="form-group kode">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pilih Tanggal
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input class="datepicker col-md-7 col-xs-12" data-date-format="mm/dd/yyyy">
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="reset"> <i class="fa fa-repeat"></i> Kosongkan</button>
                      <input type="submit" class="btn btn-success" value="Tampilkan List Penjualan">
                      {{-- <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="glyphicon glyphicon-ok"></i>Tampilkan Monitoring Penjualan</button> --}}
                    </div>
                  </div>
                </form>
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
        $('#m-penjualan-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/penjualan/dompul-data',
            columns: [
                {data: 'id_penjualan_dompul'},
                {data: 'hp_kios'},
                {data: 'tanggal_penjualan_dompul'},
                {data: 'tanggal_input'},
                {data: 'grand_total'},
                {data: 'bayar_tunai'},
                {data: 'catatan'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@stop
