@extends('adminlte::page')

@section('title', 'Monitoring Upload')

@section('content_header')
    <h1>Monitoring Penjualan Upload Dompul</h1>
@stop

@section('content')
<table id="users-table" class="table table-bordered">
  <tr>
    <td>Pilih Tanggal</td>
    <td>: <input type="datetime-local" name="" value=""> </td>
  </tr>
</table>
@stop

@section('js')
<script>
    $(function () {
        $('#users-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '',
            columns: [
                {data: 'date'},
            ]
        });
    });
</script>
@stop
