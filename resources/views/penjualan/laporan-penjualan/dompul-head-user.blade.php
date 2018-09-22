@extends('adminlte::page')

@section('title', 'Dompul Head User')

@section('content_header')
    <h1>Laporan Transaksi Penjualan Dompul User</h1>

@stop

@section('css')
<style>
  th{
    text-align: center;
  }
  td{
    text-align: center;
  }
</style>
@stop

@section('content')

<table id="dompul-head-user-table" class="table responsive" width="100%">
    <thead>
      <tr>
        <th rowspan="2">No.</th>
        <th rowspan="2">Nama BO</th>
        <th colspan="3">Qty Penjualan</th>
        <th rowspan="2">Total Nominal Penjualan</th>
        <th colspan="7">Pembayaran</th>
    </tr>
    <tr>
      <th>5k</th>
      <th>10K</th>
      <th>Rupiah</th>
      <th>Tunai</th>
      <th>BCA Pusat</th>
      <th>BCA Cabang</th>
      <th>Mandiri</th>
      <th>BRI</th>
      <th>BNI</th>
      <th>Piutang</th>
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
                {data: ''},
                {data: ''},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@stop
