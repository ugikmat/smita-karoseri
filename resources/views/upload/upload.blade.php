@extends('adminlte::page')

@section('title', 'Upload')

@section('content_header')
<h1>Upload File</h1>

@stop @section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">Upload</button>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      Tanggal :
    </div>
  </div>

</div>

<table id="upload-table" class="table responsive" width="100%">
  <thead>
    <tr>
      <th>Nama Sub Master</th>
      <th>Tanggal TRX</th>
      <th>No Faktur</th>
      <th>Produk</th>
      <th>Qty</th>
      <th>Balance</th>
      <th>Diskon</th>
      <th>HP Downline</th>
      <th>Nama Downline</th>
      <th>Status</th>
      <th>HP Kanvacer</th>
      <th>Nama Kanvacer</th>
      <th>Print</th>
      <th>Bayar</th>
    </tr>
  </thead>
</table>

<!-- Modal -->
<div id="uploadModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Excel</h4>
      </div>
      <div class="modal-body">
        <!-- Form -->
        <form method='post' action='' enctype="multipart/form-data">
          Select file : <input type='file' name='file' id='file' class='form-control' ><br>
          <input type='button' class='btn btn-info' value='Upload' id='upload'>
        </form>

        <!-- Preview-->
        <div id='preview'></div>
      </div>

    </div>

  </div>
</div>

@stop @section('js')
<!-- <script>
  $(function () {
    $('#upload-table').DataTable({
      serverSide: true,
      processing: true,
      ajax: '/upload-data',
      columns: [{
          data: 'id_satuan'
        },
        {
          data: 'nama_satuan'
        },
        {
          data: 'tipe_satuan'
        },
        {
          data: 'induk_satuan'
        },
        {
          data: 'nilai_konversi'
        },
        {
          data: 'status_satuan'
        },
        {
          data: 'action',
          orderable: false,
          searchable: false
        }
      ]
    });
  });
</script> -->


<script>
  $('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var name = button.data('name')// Extract info from data-* attributes
  var id = button.data('id')
  var tipe = button.data('tipe')
  var induk = button.data('induk')
  var nilai = button.data('nilai')
  var status = button.data('status')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  $('#editForm').attr('action', `/master/satuan/${id}`);
  modal.find('.modal-body .nama input').val(name)
  modal.find('.modal-body .id input').val(id)
  modal.find('.modal-body .tipe input').val(tipe)
  modal.find('.modal-body .induk input').val(induk)
  modal.find('.modal-body .nilai input').val(nilai)
  modal.find('.modal-body .status input').val(status)
  })
</script>
<script>
  $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#deleteForm').attr('action', `/master/satuan/${id}`);
  })
</script>
@stop