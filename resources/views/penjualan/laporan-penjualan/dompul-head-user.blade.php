@extends('adminlte::page')

@section('title', 'Dompul Head User')

@section('content_header')
    <h1>Laporan Transaksi Penjualan Dompul User</h1>

@stop

@section('css')

@stop

@section('content')

<table id="dompul-head-user-table" class="table responsive" width="100%">
    <thead>
    <tr>
        <th rowspan="2">No.</th>
        <th rowspan="2" colspan="2">Nama BO</th>
        <th colspan="3">Qty Penjualan</th>
        <th rowspan="2">Total Nominal Penjualan</th>
        <th colspan="6">Pembayaran</th>
    </tr>
    <tr>
      <th>5k</th>
      <th>10K</th>
      <th>Rupiah</th>
      <th>Tunai</th>
      <th>BCA</th>
      <th>Mandiri</th>
      <th>BRI</th>
      <th>BNI</th>
      <th>Kekurangan</th>
    </tr>
    </thead>
    <tfoot>
      <tr>
        <td></td>
        <td><b>Total Non Program</b></td>
        <td></td>
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
      <tr>
        <td></td>
        <td><b>Total Program</b></td>
        <td></td>
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
        <td></td>
      </tr>
    </tfoot>
</table>

@stop

@section('js')
<script>
    $(function () {
        $('#dompul-head-user-table').DataTable({
            serverSide: true,
            // processing: true,
            ajax: '/dompul-head-user-data',
            columns: [
                {data: 'id_lokasi'},
                {data: 'nm_lokasi'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@stop
