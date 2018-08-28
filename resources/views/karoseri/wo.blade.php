@extends('adminlte::page')

@section('title', 'Work Order')

@section('content_header')
    <h1>Work Order</h1>

@stop

@section('content')

<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-truck"></i> Karoseri</a></li>
  <li class="active">Work Order</li>
</ol>


<!-- DataTable -->
<div class="col-xs-12">
<div class="box">
  <div class="box-header">
  </div><!-- /.box-header -->
  <div class="box-body">
    <table id="wo-table" class="table table-bordered table-striped">
      <thead>
    <tr>
        <th>No ID WO</th><!-- /.sebagai ID -->
        <th>No ID SPKC</th>
        <th>Nama Customer</th>
        <th>Tanggal Permintaan</th>
        <th>Nama Supervisor</th>
        <th>Action</th>
    </tr>
    </thead>
    <tfoot>
  <tr>
      <th>No ID WO</th><!-- /.sebagai ID -->
      <th>No ID SPKC</th>
      <th>Nama Customer</th>
      <th>Tanggal Permintaan</th>
      <th>Nama Supervisor</th>
      <th>Action</th>
  </tr>
</tfoot>

</table>
<!-- DataTable -->
</div>

<!--Modal Hapus-->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="deleteForm" action="" method="POST">
        @csrf
        @method('delete')
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Cancel Transaksi Ini?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <input type="submit" class="btn btn-danger delete-user" value="Cancel">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
  </div>
</div>
@stop

@section('js')
<script>
    $(function () {
        $('#wo-table').DataTable({
            serverSide: true,
            processing: true,
            ordering: false,
            ajax: '/karoseri-wo',
            columns: [
                {data: 'id_wo'},
                {data: 'id_spkc'},
                {data: 'nm_cust'},
                {data: 'tanggal'},
                {data: 'nm_spv'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });

  $('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var name = button.data('name')// Extract info from data-* attributes
  var namep = button.data('nameperusahaan')
  var jabatan = button.data('jabatan')
  var jenis = button.data('jenis')
  var unit = button.data('unit')
  var harga = button.data('harga')
  var total = button.data('total')
  var ket = button.data('ket')
  var bank = button.data('bank')
  var alamat = button.data('alamat')
  var tanggal = button.data('tanggal')
  var status= button.data('status')
  var id = button.data('id')


  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  $('#printwo').attr('href', `/printwo/`+id);
  //$('#setuju').attr('href', `/permintaan/${id}`);
  modal.find('.modal-body .namacustomeracc input').val(name)
  modal.find('.modal-body .namaperusahaanacc input').val(namep)
  modal.find('.modal-body .jabatanacc input').val(jabatan)
  modal.find('.modal-body .jenisacc input').val(jenis)
  modal.find('.modal-body .jumlahunitacc input').val(unit)
  modal.find('.modal-body .hargaunitacc input').val(harga)
  modal.find('.modal-body .hargatotalacc input').val(total)
  modal.find('.modal-body .keteranganacc textarea').val(ket)
  modal.find('.modal-body .alamatacc input').val(alamat)
  modal.find('.modal-body .tanggalacc input').val(tanggal)
  modal.find('.modal-body .status input').val(status)
  })

  $('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')// Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  $('#deleteForm').attr('action', `/wo/${id}`);
  })
</script>

@stop
