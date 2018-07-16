@extends('adminlte::page')

@section('title', 'Bank')

@section('content_header')
    <h1>Daftar Bank</h1>
    
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
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary btn-flat align-right" data-toggle="modal" data-target="#myModal">
    Tambah
</button>
<!--Modal Tambah-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Bank</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    <form action="/bank" method="POST">
      @csrf
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
          <input type="submit" class="btn btn-primary" value="Tambah">
          {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button> --}}
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--Modal Edit-->
<div class="modal fade" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Bank</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="/bank" method="POST">
      @csrf
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
          <input type="submit" class="btn btn-primary" value="Simpan">
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
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Apakah Anda Yakin ingin menghapus?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
          <input type="submit" class="btn btn-danger delete-user" value="Delete user">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>
@stop

@section('js')
<script>
    $(function () {
        $('#users-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/bank-data',
            columns: [
                {data: 'id'},
                {data: 'nama'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
<script>
  $('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('name') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)

  modal.find('.modal-body input').val(recipient)
})
</script>
@stop
