@extends('adminlte::page')

@section('title', 'Laporan Dompul')

@section('content_header')
    <h1>Laporan Penjualan Dompul</h1>

@stop

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/u/bs-3.3.6/jq-2.2.3,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.12,b-1.2.0,b-colvis-1.2.0,b-html5-1.2.0,b-print-1.2.0,fh-3.1.2,se-1.2.0/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css"/>
@stop

@section('content')
<table>
    <tr>
      <td>Tanggal Awal :</td>
      <td>
        <div class="col-md-10 col-sm-6 col-xs-8 date_picker">
          <input type="text" id="update_time" class="form-control" name="update_time" placeholder="Pick Date">
        </div>
      </td>
    </tr>
</table>



@stop

@section('js')
<script>
    $(function () {
        $('#lokasi-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/lokasi-data',
            columns: [
                {data: 'id_lokasi'},
                {data: 'nm_lokasi'},
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
