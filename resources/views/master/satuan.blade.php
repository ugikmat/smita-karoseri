@extends('adminlte::page') @section('title', 'Satuan') @section('content_header')
<h1>Daftar Satuan</h1>

@stop @section('content')
<table id="satuan-table" class="table table-bordered">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nama Satuan</th>
      <th>Tipe</th>
      <th>Induk Satuan</th>
      <th>Nilai Konversi</th>
      <th>Status</th>
      <th>action</th>
    </tr>
  </thead>
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
          <h4 class="modal-title" id="myModalLabel">Tambah Satuan</h4>
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

                  <form id="tambahForm" method="POST" data-parsley-validate class="form-horizontal form-label-left" action="/master/satuan">
                    @csrf
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Satuan
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Satuan
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="tipe" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Induk Satuan
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="induk" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nilai Konversi
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="nilai" class="form-control col-md-7 col-xs-12" value="">
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
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Tambah Satuan</h4>
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

                <form id="tambah" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Satuan
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Satuan
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="tipe" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Induk Satuan
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="induk" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nilai Satuan
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="nilai" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="Status" class="form-control col-md-7 col-xs-12" value="">
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
    $('#satuan-table').DataTable({
      serverSide: true,
      processing: true,
      ajax: '/master/satuan-data',
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
    $('#editForm').attr('action', `/master/satuan/${id}`);
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
    $('#deleteForm').attr('action', `/master/satuan/${id}`);
  })
</script>
@stop