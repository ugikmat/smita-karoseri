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
        <th>Nama Produk</th>
        <th>Tanggal Penjualan</th>
        <th>Tipe</th>
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
            ajax: '',
            columns: [
                {data: 'id_produk'},
                {data: 'Nama_produk'},
                {data: 'tanggal_penjualan_produk'},
                {data: 'tipe'},
                {data: 'catatan'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@stop
