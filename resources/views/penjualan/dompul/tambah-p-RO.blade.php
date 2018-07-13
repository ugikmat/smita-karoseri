@extends('adminlte::page')

@section('title', 'Penjualan Dompul')

@section('content_header')
    <h1>Penjualan Dompul</h1>
@stop

@section('content')
<table>
  <tr>
    <td>HP Sales</td>
    <td></td>
  </tr>
  <tr>
    <td>Nama Sales</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Hp. Kios</td>
    <td></td>
  </tr>
  <tr>
    <td>Nama Kios</td>
    <td></td>
  </tr>
</table>
<table id="users-table" class="table table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Uraian</th>
        <th>Tipe</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Jumlah Program</th>
        <th>Harga Total</th>
        <th>Action</th>
    </tr>
    </thead>
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
