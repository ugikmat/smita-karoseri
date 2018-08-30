@extends('adminlte::page')

  @section('title', ' PBB')

@section('content_header')
    <h1>Permintaan Bahan Baku</h1>

@stop

@section('content')

<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-truck"></i> Karoseri</a></li>
  <li class="active">Permintaan Bahan Baku</li>
</ol>


<!--Tambah -->
<section class="content-header">
  <form method="post" action="/tambah_pbb_main">
    @csrf
<input type="submit" class="btn btn-primary" Value="Tambah">
{{--
<button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button> --}}
</form>
</section>
<!-- Tambah -->
<!-- DataTable -->
  <div class="box-header">
  </div><!-- /.box-header -->
  <div class="box-body">
    <table id="pbb-table" class="table table-bordered table-striped">
      <thead>
    <tr>
        <th>No Dokumen PBB</th>
        <th>No Dokumen WO</th>
        <th>Tanggal</th>
        <th>Pemohon</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
</table>
</div>
</div>
</div>

<!-- DataTable -->


<!--Modal Hapus-->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="deleteForm" action="" method="POST">
        @csrf
        @method('delete')
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Hapus Transaksi Ini?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <input type="submit" class="btn btn-danger delete-user" value="Hapus">
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
        $('#pbb-table').DataTable({
            serverSide: true,
            processing: true,
            ordering: false,
            ajax: '/karoseri-pbb',
            columns: [
                {data: 'id_pbb'},
                {data: 'id_wo'},
                {data: 'tgl_pbb'},
                {data: 'pemohon'},
                {data: 'status'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });

    $('#editModal').on('click', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name')// Extract info from data-* attributes
    var namep = button.data('nameperusahaan')
    var jabatan = button.data('jabatan')
    var jenis = button.data('jenis')
    var unit = button.data('unit')
    var harga = button.data('harga')
    var total = button.data('total')
    var ket = button.data('ket')
    var berkas = button.data('berkas')
    var carabayar = button.data('carabayar')
    var alamat = button.data('alamat')
    var tanggal = button.data('tanggal')
    var status= button.data('status')
    var id = button.data('id')


    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    $('#jenis_karoseri_acc').val(jenis)
    $('#cara_bayar_acc').val(carabayar)
    $('#print').attr('href', `/printKu/`+id);
    $('#unduh').attr('href', `/unduh/`+berkas);
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
    modal.find('.modal-body .berkas input').val(berkas)
    })

    $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')// Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#deleteForm').attr('action', `/pbb/${id}`);
    })
</script>
@stop
