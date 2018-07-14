@extends('adminlte::page')

@section('title', 'Penjualan Dompul')

@section('content_header')
    <h1>Penjualan Dompul</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>
</div>
<!-- <table id="users-table" class="table table-bordered">
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
        <div class="input-append date" id="dp3" data-date="" data-date-format="">
          <input class="span2" size="16" type="text" value="">
        </div>
      </td>
    </tr>
    <input type="button" name="" value="Kosongkan">
    <input type="button" name="" value="Rekap Penjualan">
</table> -->
@stop

@section('js')
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap-datepicker.js"></script>

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
@stop
