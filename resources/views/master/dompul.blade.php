@extends('adminlte::page') @section('title', 'Dompul') @section('content_header')
<h1>Master Dompul</h1>

@stop @section('css')
<style>
  tfoot input {
    width: 100%;
    box-sizing: border-box;
  }
</style>
@stop @section('content')
<table id="dompul-table" class="table responsive" width="100%">
  <thead>
    <tr>
      <th>ID</th>
      <th>No HP Master Dompul</th>
      <th>No HP Sub Dompul</th>
      <th>ID Gudang</th>
      <th>Nama Sub Master Dompul</th>
      <th>Tipe Dompul</th>
      <th>Status</th>
      @if(Auth::user()->level_user!='Kasir')
      <th>Action</th>
      @endif
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>ID</th>
      <th>No HP Master Dompul</th>
      <th>No HP Sub Dompul</th>
      <th>ID Gudang</th>
      <th>Nama Sub Master Dompul</th>
      <th>Tipe Dompul</th>
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
            <span aria-hidden="true">?</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Tambah Dompul</h4>
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

                  <form id="tambahForm" method="post" data-parsley-validate class="form-horizontal form-label-left" action="/master/dompul">
                    @csrf
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No HP Master Dompul
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="hp-master" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No HP Sub Dompul
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="hp-sub" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Gudang
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="id-gudang" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Sub Master Dompul
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="nama-sub" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Dompul
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="tipe" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
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


<!--Modal Edit-->
<div class="modal fade bs-example-modal-lg" id='editModal' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">?</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Dompul</h4>
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

                <form id="editForm" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">
                  @csrf @method('put')
                  <div class="form-group hp-master">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No HP Master Dompul
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="hp-master" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group hp-sub">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No HP Sub Dompul
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="hp-sub" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>
                    <div class="form-group id-gudang">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Gudang
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="id-gudang" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group nama-sub">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Sub Master Dompul
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="nama-sub" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group tipe">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Dompul
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="tipe" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="reset">Reset</button>
                      <button type="submit" class="btn btn-success">Submit</button>
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
          <button type="submit" class="btn btn-danger">Hapus</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop @section('js')
<script>
  $(function () {
    $('#dompul-table').DataTable({
      serverSide: true,
      processing: true,
      stateSave: true,
      ajax: '/dompul-data',
      columns: [{
          data: 'id_dompul'
        },
        {
          data: 'no_hp_master_dompul'
        },
        {
          data: 'no_hp_sub_master_dompul'
        },
        {
          data: 'id_gudang'
        },
        {
          data: 'nama_sub_master_dompul'
        },
        {
          data: 'tipe_dompul'
        },
        {
          data: 'status_sub_master_dompul'
        },
        @if(Auth::user()->level_user!='Kasir')
        {
          data: 'action',
          orderable: false,
          searchable: false
        }
        @endif
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
    var hp_master = button.data('hp-master')
    var id = button.data('id')
    var hp_sub = button.data('hp-sub')
    var id_gudang = button.data('gudang')
    var nama_sub = button.data('nama-sub')
    var tipe = button.data('tipe')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    $('#editForm').attr('action', `/master/dompul/${id}`);
    modal.find('.modal-body .hp-master input').val(hp_master)
    modal.find('.modal-body .hp-sub input').val(hp_sub)
    modal.find('.modal-body .id-gudang input').val(id_gudang)
    modal.find('.modal-body .nama-sub input').val(nama_sub)
    modal.find('.modal-body .tipe input').val(tipe)
  })
</script>
<script>
  $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#deleteForm').attr('action', `/master/dompul/${id}`);
  })
</script>
@stop
