@extends('adminlte::page') @section('title', 'PPN') @section('content_header')
<h1>Daftar PPN</h1>

@stop @section('css')
<style>
  tfoot input {
    width: 100%;
    box-sizing: border-box;
  }
</style>
@stop @section('content')
<table id="ppn-table" class="table responsive" width="100%">
  <thead>
    <tr>
      <th>Id</th>
      <th>Jenis PPN</th>
      <th>action</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Id</th>
      <th>Jenis PPN</th>
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
      <form action="{{ url('/') }}/ppn" method="POST">
        @csrf
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Jenis PPN</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="input-group nama">
            <span class="input-group-addon">
              <i class="fa fa-credit-card"></i>
            </span>
            <input autocomplete="off" id="tambah_jenis" name="tambah_jenis" type="text" class="form-control" placeholder="Jenis PPN">
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
          <div class="input-group nama">
            <span class="input-group-addon">
              <i class="fa fa-credit-card"></i>
            </span>
            <input autocomplete="off" id="jenis" name="jenis" type="text" class="form-control" placeholder="Jenis PPN">
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
    $('#ppn-table').DataTable({
      serverSide: true,
      processing: true,
      responsive: true,
      ajax: '{{ url('/') }}/master-ppn',
      columns: [{
          data: 'id_ppn'
        },
        {
          data: 'jenis_ppn'
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
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    $('#editForm').attr('action', `/ppn/${id}`);
    modal.find('.modal-body .nama input').val(name)
  })
</script>
<script>
  $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#deleteForm').attr('action', `/ppn/${id}`);
  })
</script>
@stop
