@extends('adminlte::page') @section('title', 'Suplier') @section('content_header')
<h1>Daftar Suplier</h1>

@stop @section('content')
<table id="suplier-table" class="table table-bordered">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nama Suplier</th>
      <th>Alamat Suplier</th>
      <th>Telepon Suplier</th>
      <th>Email Suplier</th>
      <th>Bank</th>
      <th>No. Rekening</th>
      <th>Status Suplier</th>
      <th>action</th>
    </tr>
  </thead>
</table>

<!-- Button to Open the Modal -->
<section class="content-header">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah</button>
  <div class="modal fade bs-example-modal-lg" id='modalTambah' tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Tambah Suplier</h4>
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

                  <form id="tambahForm" method="POST" data-parsley-validate class="form-horizontal form-label-left" action="/master/supplier">
                    @csrf
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Suplier
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat Suplier
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="alamat" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Telepon
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="telepon" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email Suplier
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="email" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bank
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="bank" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Rekening
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="norek" class="form-control col-md-7 col-xs-12" value="">
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

<!--Edit-->
<div class="modal fade bs-example-modal-lg" id='editModal' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Suplier</h4>
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

                <form id="edit" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">

                  <div class="form-group nama">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Suplier
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group alamat">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat Suplier
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="alamat" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group telepon">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Telepon
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="telepon" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group email">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email Suplier
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="email" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group bank">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bank
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="bank" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group norek">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Rekening
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="norek" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group status">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status Suplier
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="status" class="form-control col-md-7 col-xs-12" value="">
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
    $('#suplier-table').DataTable({
      serverSide: true,
      processing: true,
      ajax: '/supplier-data',
      columns: [{
          data: 'id_supplier'
        },
        {
          data: 'nama_supplier'
        },
        {
          data: 'alamat_supplier'
        },
        {
          data: 'telepon_supplier'
        },
        {
          data: 'email_supplier'
        },
        {
          data: 'bank_supplier'
        },
        {
          data: 'norek_supplier'
        },
        {
          data: 'status_supplier'
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
    var alamat = button.data('alamat')
    var telepon = button.data('telepon')
    var email = button.data('email')
    var bank = button.data('bank')
    var norek = button.data('norek')
    var status = button.data('status')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    $('#editForm').attr('action', `/master/supplier/${id}`);
    modal.find('.modal-body .nama input').val(name)
    modal.find('.modal-body .id input').val(id)
    modal.find('.modal-body .alamat input').val(alamat)
    modal.find('.modal-body .telepon input').val(telepon)
    modal.find('.modal-body .email input').val(email)
    modal.find('.modal-body .bank input').val(bank)
    modal.find('.modal-body .norek input').val(norek)
    modal.find('.modal-body .status input').val(status)
  })
</script>
<script>
  $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#deleteForm').attr('action', `/master/supplier/${id}`);
  })
</script>
@stop
