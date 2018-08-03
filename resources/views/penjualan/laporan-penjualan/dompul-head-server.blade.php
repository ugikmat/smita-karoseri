@extends('adminlte::page')

@section('title', 'Dompul Head User')

@section('content_header')
    <h1>Laporan Transaksi Penjualan Dompul User</h1>

@stop

@section('css')

@stop

@section('content')

<table id="dompul-head-server-table" class="table responsive" width="100%">
    <thead>
    <tr>
        <th rowspan="2">No.</th>
        <th rowspan="2" colspan="2">Nama BO</th>
        <th>Total Out Internal</th>
        <th>Total Out Penjualan</th>
    </tr>
    <tr>
      <th>5k</th>
      <th>10K</th>
      <th>Rupiah</th>
    </tr>
    </thead>
    <tfoot>
      <tr>
        <td></td>
        <td><b>Grand Total</b></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tfoot>
</table>

@stop

@section('js')
<script>
    $(function () {
        $('#dompul-head-server-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/dompul-head-server-data',
            columns: [
                {data: 'id_lokasi'},
                {data: 'nm_lokasi'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@stop
