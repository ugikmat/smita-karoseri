@extends('adminlte::page')

@section('title', 'Dompul Head Server')

@section('content_header')
    <h1>Laporan Transaksi Penjualan Dompul Server</h1>

@stop

@section('css')

@stop

@section('content')

<table id="dompul-head-server-table" class="table responsive" width="100%">
    <thead>
    <tr>
        <th rowspan="2">No.</th>
        <th rowspan="2">Nama BO</th>
        <th colspan="3">5K</th>
        <th colspan="3">10K</th>
        <th colspan="3">Rupah</th>
    </tr>
    <tr>
      <th>Total Out Internal</th>
      <th>Total Out Penjualan</th>
      <th>Total Out All</th>
      <th>Total Out Internal</th>
      <th>Total Out Penjualan</th>
      <th>Total Out All</th>
      <th>Total Out Internal</th>
      <th>Total Out Penjualan</th>
      <th>Total Out All</th>
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

@stop

@section('js')
<script>
    $(function () {
        $('#dompul-head-server-table').DataTable({
            serverSide: true,
            // processing: true,
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
