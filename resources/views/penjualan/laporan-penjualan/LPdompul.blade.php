@extends('adminlte::page')

@section('title', 'Laporan Dompul')

@section('content_header')
    <h1>Laporan Penjualan Dompul</h1>

@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')

<div class="cotainer-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInput" pull-right>Input Tanggal Laporan Penjualan</button>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Tanggal Cetak Laporan
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        : tgl skarang
      </div>
    </div>
  </div>
</div>


<table id="lp-dompul-table" class="table responsive" width="100%">
    <thead>
    <tr>
        <th>No.</th>
        <th>Nama Sales</th>
        <th>BO</th>
        <th>Qty Penjualan</th>
        <th>Total Penjualan</th>
        <th>Total Tunai</th>
        <th>BCA</th>
        <th>Mandiri</th>
        <th>BRI</th>
        <th>BNI</th>
        <th>Piutang</th>
    </tr>
    </thead>
    <tfoot>
      <tr>
        <td></td>
        <td><b>Grand Total</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
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
        <h4 class="modal-title" id="myModalLabel">Input Laporan Penjualan Dompul</h4>
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
                      <input class="datepicker col-md-7 col-xs-12" data-date-format="mm-dd-yyyy">
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="reset"> <i class="fa fa-repeat"></i> Kosongkan</button>
                      <button type="submit" class="btn btn-success" ><i class="glyphicon glyphicon-ok"></i>Tampilkan Laporan Penjualan Dompul</button>
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
        $('#lp-dompul-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/lp-dompul-data',
            columns: [
                {data: 'id_lokasi'},
                {data: 'nm_lokasi'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@stop
