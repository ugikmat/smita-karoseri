@extends('adminlte::page') @section('title', 'Harga Produk') @section('content_header')
<h1>Master Harga Produk</h1>

@stop @section('css')
<style>
  tfoot input {
    width: 100%;
    box-sizing: border-box;
  }
</style>
@stop @section('content')
<table id="harga-produk-table" class="table responsive" width='100%'>
  <thead>
    <tr>
      <th>Id Harga Produk</th>
      <th>Id Produk</th>
      <th>Tipe Harga Produk</th>
      <th>Harga Produk</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Id Harga Produk</th>
      <th>Id Produk</th>
      <th>Tipe Harga Produk</th>
      <th>Harga Produk</th>
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
          <h4 class="modal-title" id="myModalLabel">Tambah Harga Produk</h4>
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

                  <form id="tambah" method="post" data-parsley-validate class="form-horizontal form-label-left" action="/master/harga_produk">
                    @csrf
                    <div class="form-group id-produk">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-produk">ID Produk
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="id-produk" required="required" name="id" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipe">Tipe Harga Produk
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="tipe" required="required">
                          <option value="selected" selected>-- Pilih Tipe Harga Produk --</option>
                          <option value="ds">DS</option>
                          <option value="cvs">CVS</option>
                          <option value="hi">HI</option>
                          <option value="server">SERVER</option>
                          <option value="sde">SDE</option>
                          <option value="cvs1">CVS1</option>
                          <option value="cvs2">CVS2</option>
                          <option value="cvs3">CVS3</option>
                          <option value="server1">SERVER1</option>
                          <option value="server2">SERVER2</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Produk
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="harga" class="form-control col-md-7 col-xs-12" value="">
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
<div class="modal fade bs-example-modal-lg" id='editModal' aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Harga Produk</h4>
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

                  <div class="form-group id">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Produk
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="id" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group tipe">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Harga Produk
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select name="tipe" required="required">
                        <option value="selected" selected>Tipe harga sekarang</option>
                        <option value="ds">DS</option>
                        <option value="cvs">CVS</option>
                        <option value="hi">HI</option>
                        <option value="server">SERVER</option>
                        <option value="sde">SDE</option>
                        <option value="cvs1">CVS1</option>
                        <option value="cvs2">CVS2</option>
                        <option value="cvs3">CVS3</option>
                        <option value="server1">SERVER1</option>
                        <option value="server2">SERVER2</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group harga">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Produk
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="harga" class="form-control col-md-7 col-xs-12" value="">
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
        <button type="submit" class="btn btn-danger">Submit</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </form>
    </div>
  </div>
</div>
@stop @section('js')
<script>
  $(function () {
    $('#harga-produk-table').DataTable({
      serverSide: true,
      processing: true,
      ajax: '/harga-produk-data',
      columns: [{
          data: 'id_harga_sp'
        },
        {
          data: 'id_produk'
        },
        {
          data: 'tipe_harga_sp'
        },
        {
          data: 'harga_sp'
        },
        {
          data: 'status_harga_sp'
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
    var id = button.data('id')
    var id_produk = button.data('id_produk')
    var tipe = button.data('tipe')
    var harga = button.data('harga')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    $('#editForm').attr('action', `/master/harga_produk/${id}`);
    modal.find('.modal-body .id input').val(id_produk);
    modal.find('.modal-body .tipe input').val(tipe);
    modal.find('.modal-body .harga input').val(harga);
  })
</script>
<script>
  $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#deleteForm').attr('action', `/master/harga_produk/${id}`);
  })
</script>
@stop
