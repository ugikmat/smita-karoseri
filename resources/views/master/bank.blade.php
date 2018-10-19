@extends('adminlte::page') @section('title', 'Bank') @section('content_header')
<h1>Daftar Bank</h1>

@stop @section('css')
<style>
  tfoot input {
    width: 100%;
    box-sizing: border-box;
  }
</style>
@stop @section('content')
<table id="bank-table" class="table responsive" width="100%">
  <thead>
    <tr>
      <th>Id</th>
      <th>Kode Bank</th>
      <th>Nama Bank</th>
      <th>Status Bank</th>
      <th>action</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Id</th>
      <th>Kode Bank</th>
      <th>Nama Bank</th>
    </tr>
  </tfoot>
</table>
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary btn-flat align-right" data-toggle="modal" data-target="#modalTambah">
  Tambah
</button>

<!--Modal Tambah-->
<div class="modal fade" id="modalTambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/bank" method="POST">
        @csrf
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Bank</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="input-group kode">
            <span class="input-group-addon">
              <i class="fa fa-bank"></i>
            </span>
            <input id="kode" name="kode" type="text" class="form-control" placeholder="Kode Bank">
          </div>
          <div class="input-group nama">
            <span class="input-group-addon">
              <i class="fa fa-bank"></i>
            </span>
            <input id="nama" name="nama" type="text" class="form-control" placeholder="Bank Name">
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Tambah"> {{--
          <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button> --}}
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--Modal edit-->
<div class="modal fade" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/bank" method="POST" id="editForm">
        @csrf @method('put')
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Bank</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="input-group kode">
            <span class="input-group-addon">
              <i class="fa fa-bank"></i>
            </span>
            <input id="kode" name="kode" type="text" class="form-control" placeholder="Kode Bank">
          </div>
          <div class="input-group nama">
            <span class="input-group-addon">
              <i class="fa fa-bank"></i>
            </span>
            <input id="nama" name="nama" type="text" class="form-control" placeholder="Bank Name">
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Simpan"> {{--
          <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button> --}}
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--modal edit-->

<div class="modal fade" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">
    <form id="editForm" action="/bank" method="POST">
      @csrf
      @method('put')
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Bank</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
          <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-bank"></i>
            </span>
            <input id="nama" name="nama" type="text" class="form-control" placeholder="Bank Name">
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Submit">
          {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button> --}}
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--Modal Hapus-->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="deleteForm" action="" method="POST">
        @csrf @method('delete')
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Apakah Anda Yakin ingin menghapus?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-danger" value="Hapus">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop @section('js')

<script>
  $(function () {
    $('#bank-table').DataTable({
      serverSide: true,
      processing: true,
      responsive: true,
      stateSave: true,
      ajax: '/bank-data',
      columns: [{
          data: 'id_bank'
        },
        {
          data: 'kode_bank'
        },
        {
          data: 'nama_bank'
        },
        {
          data: 'status_bank'
        },
        {
          data: 'action',
          orderable: false,
          searchable: false
        }
      ],
      initComplete: function () {
        this.api().columns().every(function () {
          var column = this;
          var input = document.createElement("input");
          $(input).appendTo($(column.footer()).empty())
            .on('change', function () {
              column.search($(this).val(), false, false, true).draw();
            });
        });
      }
    });
  });
</script>
<script>
  $('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name') // Extract info from data-* attributes
    var id = button.data('id')
    var kode = button.data('kode')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    $('#editForm').attr('action', `/bank/${id}`);
    modal.find('.modal-body .nama input').val(name)
    modal.find('.modal-body .kode input').val(kode)
  })
</script>
<script>
  $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#deleteForm').attr('action', `/bank/${id}`);
  })
</script>
@stop
