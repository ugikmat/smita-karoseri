@extends('adminlte::page')

@section('title', 'Penjualan Dompul')

@section('content_header')
    <h1>Review Penjualan Dompul RO</h1>
@stop

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        HP Kios
      </div>
      <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
        : 1111111111
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Nama Kios
      </div>
      <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
        : aaaaaaaaaa
      </div>
    </div>
  </div>
</div>
<table id="invoice-dompul-table" class="table table-bordered">
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
    <tfoot>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2"><b>Grand Total</b></td>
        <td></td>
        <td>totalnya</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2"><b>Jumlah Tunai</b></td>
        <td></td>
        <td>totalnya</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2"><b>Bank Transfer 1</b></td>
        <td></td>
        <td>totalnya</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2"><b>Jumlah Transfer 1</b></td>
        <td></td>
        <td>totalnya</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2"><b>Bank Transfer 2</b></td>
        <td></td>
        <td>totalnya</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2"><b>Jumlah Transfer 2</b></td>
        <td></td>
        <td>totalnya</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2"><b>Bank Transfer 3</b></td>
        <td></td>
        <td>totalnya</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2"><b>Jumlah Transfer 3</b></td>
        <td></td>
        <td>totalnya</td>
      </tr>
    </tfoot>
</table>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Tambah</button>

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