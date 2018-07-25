@extends('adminlte::page')

@section('title', 'Penjualan Dompul')

@section('content_header')
    <h1>Detail Penjualan Dompul</h1>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">

@stop

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Tanggal Penjualan
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : tanggalan
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    </div>
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 pull-right">
      <span class="pull-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLink">Input Data</button></span>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama Kasir
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : joni
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama Logistik
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : john
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama PIC
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : pras
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        ID Canvaser
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : 123123123
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama Canvaser
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : qwerty
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Tanggal Cetak Penjualan
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : tanggalan
      </div>
    </div>
  </div>

<table id="invoice-dompul-table" class="table table-bordered">
    <thead>
    <tr>
        <th>No.</th>
        <th>Nama RO</th>
        <th>Qty Penjualan</th>
    </tr>
    </thead>
</table>

<!--Modal Edit-->
<div class="modal fade bs-example-modal-lg" id='modalLink' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Input Penjualan Dompul</h4>
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Canvasser
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="id" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group nama">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Penjualan
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="Auto Generate"  disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl Penjualan
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input class="datepicker col-md-7 col-xs-12" required="required" data-date-format="mm/dd/yyyy">
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="reset"> <i class="fa fa-repeat"></i> Kosongkan</button>
                      <input type="submit" class="btn btn-success" value="Rekap Penjualan">
                      {{-- <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="glyphicon glyphicon-ok"></i> Rekap Penjualan</button> --}}
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
<script>
    $(function () {
        $('#invoice-dompul-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '',
            columns: [
                {data: 'no'},
                {data: 'nama-ro'},
                {data: 'qty-penjualan'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
<script src="{{ asset('/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
$('.datepicker').datepicker({
});
</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.input-tanggal').datepicker();
    });
@stop
