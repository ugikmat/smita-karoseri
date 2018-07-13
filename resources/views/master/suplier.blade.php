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
        <th>Nama Suplier</th>
        <th>No Telpon</th>
        <th>Rekening</th>
        <th>Bank</th>
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
                {data: 'id_suplier'},
                {data: 'nama'},
                {data: 'notelp'},
                {data: 'rekeing'},
                {data: 'bank'},
                {data: 'catatan'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@stop
