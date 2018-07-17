@extends('adminlte::page') @section('title', 'Produk') @section('content_header')
<h1>Daftar Produk</h1>

@stop @section('content')

<!-- data tabel -->
<table id="produk-table" class="table table-bordered">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nama Produk</th>
      <th>Tipe Produk</th>
      <th>Status Produk</th>
      <th>action</th>
    </tr>
  </thead>
</table>

<!-- tambah data -->
<section class="content-header">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">Tambah</button>
      <div class="modal fade bs-example-modal-lg" id='modalTambah' tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Tambah Produk</h4>
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Produk
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Produk
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="alamat" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status Produk
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="alamat" class="form-control col-md-7 col-xs-12" value="">
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
<div class="modal fade bs-example-modal-lg" id='modalEdit' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Produk</h4>
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

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Produk
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Status
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="alamat" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status Produk
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="alamat" class="form-control col-md-7 col-xs-12" value="">
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
        @csrf
        @method('delete')
      
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
    $('#produk-table').DataTable({
      serverSide: true,
      processing: true,
      ajax: '/master/produk-data',
      columns: [{
          data: 'id',
          name: 'id'
        },
        {
          data: 'nama',
          name: 'nama'
        },
        {
          data: 'tipe',
          name: 'tipe'
        },
        {
          data: 'status',
          name: 'status'
        },
        {
          data: 'action',
          orderable: false,
          searchable: false
        }
      ],
      // initComplete: function () {
      //   this.api().columns().every(function () {
      //     var column = this;
      //     var input = document.createElement("input");
      //     $(input).appendTo($(column.footer()).empty())
      //       .on('change', function () {
      //         column.search($(this).val(), false, false, true).draw();
      //       });
      //   });
      // }
    });
  });
</script>
<script>
  $('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var name = button.data('name')// Extract info from data-* attributes
  var id = button.data('id')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  $('#editForm').attr('action', `/bank/${id}`);
  modal.find('.modal-body input').val(name)
  })
</script>
<script>
  $('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')// Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  $('#deleteForm').attr('action', `/bank/${id}`);
  })
</script>
@stop
