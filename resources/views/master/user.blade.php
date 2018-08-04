@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
<h1>Daftar User</h1>

@stop

@section('css')
<style>
  tfoot input {
    width: 100%;
    box-sizing: border-box;
  }
</style>
@stop @section('content')
<table id="user-table" class="table responsive" width="100%">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Lokasi</th>
      <th>action</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Id</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Lokasi</th>
      <th>action</th>
    </tr>
  </tfoot>
</table>

<!--Modal Hapus-->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" method="POST" id="deleteForm">
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
    $('#user-table').DataTable({
      serverSide: true,
      processing: true,
      ajax: '/supplier-data',
      columns: [{
          data: 'id'
        },
        {
          data: 'name'
        },
        {
          data: 'email'
        },
        {
          data: 'id_lokasi'
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
    var lokasi = button.data('lokasi')
    var email = button.data('email')

    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    $('#editForm').attr('action', `/master/supplier/${id}`);
    modal.find('.modal-body .nama input').val(name)
    modal.find('.modal-body .id input').val(id)
    modal.find('.modal-body .lokasi input').val(lokasi)
    modal.find('.modal-body .email input').val(email)

  })
</script>
<script>
  $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#deleteForm').attr('action', `/master/user/${id}`);
  })
</script>
@stop
