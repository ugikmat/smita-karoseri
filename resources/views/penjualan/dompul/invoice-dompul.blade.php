@extends('adminlte::page')

@section('title', 'Penjualan Dompul')

@section('content_header')
    <h1>Penjualan Dompul</h1>
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/u/bs-3.3.6/jq-2.2.3,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.12,b-1.2.0,b-colvis-1.2.0,b-html5-1.2.0,b-print-1.2.0,fh-3.1.2,se-1.2.0/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css"/>
@stop

@section('content')
<form class="form-horizontal">
    <div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="lg">ID canvaser</label>
      <div class="col-sm-4">
        <input class="form-control" type="text" id="sm" placeholder="masukkan ID canvaser">
      </div>
    </div>
    <div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="sm">No Penjualan</label>
      <div class="col-sm-4">
        <input class="form-control" type="text" id="sm" placeholder="masukkan no penjualan">
      </div>
    </div>
    <div class="form-group form-group-sm">
      <label class="col-sm-2 control-label" for="sm">Tgl Penjualan</label>
      <div class="col-sm-4" date_picker>
          <input type="text" id="update_time" class="form-control" name="update_time" placeholder="Pick Date">
      </div>
    </div>
  </form>

<!-- <table>
    <tr>
      <td>ID canvaser</td>
      <td>:</td>
      <td>
        <form class="" action="index.html" method="post">

        </form>
      </td>
    </tr>
    <tr>
      <td>No Penjualan</td>
      <td>:</td>
      <td>
        <input type="text" name="" value="">
      </td>
    </tr>
    <tr>
      <td>Tgl Penjualan</td>
      <td>:</td>
      <td>
        <div class="col-md-10 col-sm-6 col-xs-8 date_picker">
          <input type="text" id="update_time" class="form-control" name="update_time" placeholder="Pick Date">
        </div>
      </td>
    </tr>
</table> -->
<button class="btn btn-primary" type="reset">Kosongkan</button>
<button type="submit" class="btn btn-success">Rekap Penjualan</button>
@stop

@section('js')
<script>
    $(function () {
        $('#users-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '',
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
<script type="text/javascript" src="https://cdn.datatables.net/u/bs-3.3.6/jq-2.2.3,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.12,b-1.2.0,b-colvis-1.2.0,b-html5-1.2.0,b-print-1.2.0,fh-3.1.2,se-1.2.0/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/locales/bootstrap-datepicker.en.min.js"></script>
<script type="text/javascript">
        $('.date_picker input').datepicker({
          format: "dd.mm.yyyy",
          todayBtn: "linked",
          language: "en"
        });
    </script>
@stop
