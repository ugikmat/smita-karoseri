@extends('adminlte::page')

@section('title', 'Surat Jalan')

@section('content_header')
    <h1>SURAT JALAN</h1>

@stop

@section('content')

<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-truck"></i> Karoseri</a></li>
  <li class="active">Surat Jalan</li>
</ol>

<!-- DataTable -->

  <div class="box-header">
  </div><!-- /.box-header -->
  <div class="box-body">
    <table id="sj-table" class="table table-bordered table-striped">
      <thead>
    <tr>
        <th>Kode Produksi</th>
        <th>No Dokumen SPKC</th>
        <th>Tanggal SPKC</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
</table>
</div>
<!-- DataTable -->



<!--Modal PRINT-->
<div class="modal fade" id="printModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Apakah Anda Yakin ingin mencetak BAP?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Hapus</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
@stop

@section('js')

<script>
    $(function () {
        $('#sj-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/karoseri-surat_jalan',
            columns: [
                {data: 'kode_produksi'},
                {data: 'id_spkc'},
                {data: 'tanggal'},
                {data: 'status_print_sj'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@stop
