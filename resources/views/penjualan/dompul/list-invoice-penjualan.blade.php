@extends('adminlte::page')

@section('title', 'Penjualan Dompul')

@section('content_header')
    <h1>Penjualan Dompul</h1>
@stop

@section('content')
<table id="users-table" class="table table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>No Penjualan</th>
        <th>Sales</th>
        <th>Hp Kios</th>
        <th>Nama Kios</th>
        <th>Tanggal Penjualan</th>
        <th>Status Verifikasi</th>
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
                {data: 'no'},
                {data: 'no_penjualan'},
                {data: 'sales'},
                {data: 'hp_kios'},
                {data: 'nama_kios'},
                {data: 'tanggal_penjualan'},
                {data: 'status_verifikasi'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@stop
