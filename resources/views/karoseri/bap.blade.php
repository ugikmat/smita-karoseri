@extends('adminlte::page')

@section('title', 'BAP')

@section('content_header')
    <h1>BAP</h1>

@stop

@section('content')

<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-truck"></i> Karoseri</a></li>
  <li class="active">Berita Acara Penyelesaian</li>
</ol>

<!-- DataTable -->

  <div class="box-header">
  </div><!-- /.box-header -->
  <div class="box-body">
    <table id="bap-table" class="table table-bordered table-striped">
      <thead>
    <tr>
        <th>No Dokumen SPKPB</th>
        <th>No Dokumen SPKC</th>
        <th>Nama Pemborong</th>
        <th>Harga Borongan</th>
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
        $('#bap-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/karoseri-bap',
            columns: [
                {data: 'id_spkpb'},
                {data: 'id_spkc'},
                {data: 'nm_pb'},
                {data: 'harga_borongan'},
                {data: 'status_print'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@stop
