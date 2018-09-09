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
@stop

@section('content')
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
    </tr>
  </tfoot>
</table>

<!-- Modal Tambah -->
<section class="content-header">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah</button>
  <div class="modal fade bs-example-modal-lg" id='modalTambah' tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
        </div>
        <div class="modal-body">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />

                  <form method="post" data-parsley-validate class="form-horizontal form-label-left" action="">
                    @csrf

                    <div class="form-group row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="username" name="username" class="form-control col-md-7 col-xs-12" required="required" value="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12" required="required" value="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Konfirmasi Password
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="konfirmasi" name="konfirmasi" class="form-control col-md-7 col-xs-12" required="required" value="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12" required="required" value="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Level User
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="level" required="required" name="level" placeholder="Pilih Level User" class="form-control col-md-7 col-xs-12">
                          <option value="Canvaser">Canvaser</option>
                          <option value="Kasir">Kasir</option>
                          <option value="Supervisor">Supervisor</option>
                          <option value="Kepala Cabang">Kepala Cabang</option>
                          <option value="Keuangan">Keuangan</option>
                          <option value="Super Admin">Super Admin</option>
                        </select>
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success" data-dismiss="modal">Simpan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
</section>


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
      ajax: '/user-data',
      columns: [{
          data: 'id_user'
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
