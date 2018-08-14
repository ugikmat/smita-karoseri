@extends('adminlte::page')

@section('title', 'Monitoring Upload')

@section('content_header')
    <h1>Monitoring Penjualan Upload Dompul</h1>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">
<style>
  th{
    text-align: center;
    margin: auto;
  }
  td{
    text-align: center;
  }
</style>
@stop

@section('content')
<div class="cotainer-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Tanggal Penjualan
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        : {{session('tgl_penjualan')}}
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">

    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInput" pull-right>Input Tanggal Penjualan</button>
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
        <th rowspan="2">No.</th>
        <th rowspan="2">Canvasser</th>
        <th colspan="2">5K</th>
        <th colspan="2">10K</th>
        <th colspan="2">Rupiah</th>
    </tr>
    <tr>
      <th>Program</th>
      <th>Non Program</th>
      <th>Program</th>
      <th>Non Program</th>
      <th>Program</th>
      <th>Non Program</th>
    </tr>
    </thead>
    <tfoot>
      <tr>
        <td></td>
        <td><b>Total</b></td>
        @isset($totalQtyProgram5k)
        <td>{{$totalQtyProgram5k}}</td>
        <td>{{$totalQtyNonProgram5k}}</td>
        <td>{{$totalQtyProgram10k}}</td>
        <td>{{$totalQtyNonProgram10k}}</td>
        <td>{{$totalQtyProgramRupiah}}</td>
        <td>{{$totalQtyNonProgramRupiah}}</td>
        @else
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>0</td>
        @endisset
      </tr>
      <tr>
        <td></td>
        <td><b>Total Keseluruhan</b></td>
        @isset($total_5k)
        <td colspan="2">{{$total_5k}}</td>
        <td colspan="2">{{$total_10k}}</td>
        <td colspan="2">{{$total_rupiah}}</td>
        @else
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        @endisset
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

                <form id="editForm" method="POST" data-parsley-validate class="form-horizontal form-label-left" action="/penjualan/monitoring/mntr-upload/show">
                  @csrf @method('get')
                  <div class="form-group kode">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pilih Tanggal
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="datepicker col-md-7 col-xs-12" name="tgl" id="tgl" data-date-format="dd-mm-yyyy" value="{{session('tgl_penjualan')}}">
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="reset"> <i class="fa fa-repeat"></i> Kosongkan</button>
                      <button type="submit" class="btn btn-success" ><i class="glyphicon glyphicon-ok"></i>Tampilkan Monitoring Penjualan</button>
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
        if ($('#tgl').val()==="") {
          var tgl = null;
        } else {
          var tgl = $('#tgl').val();
        }
        var t = $('#m-penjualan-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: `/monitor-data/${tgl}`,
            columns: [
                {data: 'index'},
                {data: 'nama'},
                {data: 'qty_program5k'},
                {data: 'qty_non_program5k'},
                {data: 'qty_program10k'},
                {data: 'qty_non_program10k'},
                {data: 'program_rupiah'},
                {data: 'non_program_rupiah'}
            ]
        });
        t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
          } );
        } ).draw();
    });

</script>
@stop
