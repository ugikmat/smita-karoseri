@extends('adminlte::page')

@section('title', 'Penjualan Dompul')

@section('content_header')
    <h1>Penjualan Dompul</h1>
@stop

@section('content')
<table id="users-table" class="table table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>HP Kios</th>
        <th>Tanggal Penjualan</th>
        <th>Tanggal Input</th>
        <th>Total</th>
        <th>Bayar Tunai</th>
        <th>Catatan</th>
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
            ajax: '/penjualan/dompul-data',
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