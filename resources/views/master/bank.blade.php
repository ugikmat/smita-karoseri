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
        <th>Nama Bank</th>
        <th>action</th>
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
                {data: 'id_bank'},
                {data: 'nama_bank'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@stop
