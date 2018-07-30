@extends('adminlte::page') @section('title', 'Sales') @section('content_header')
<h1>Master Sales</h1>

@stop @section('css')
<style>
  tfoot input {
    width: 100%;
    box-sizing: border-box;
  }
</style>
@stop @section('content')
<table id="sales-table" class="table responsive" width="100%">
  <thead>
    <tr>
      <th>Id Sales</th>
      <th>Nama Sales</th>
      <th>Alamat Sales</th>
      <th>No Telepon</th>
      <th>Action</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Id Sales</th>
      <th>Nama Sales</th>
      <th>Alamat Sales</th>
      <th>No Telepon</th>
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
          <h4 class="modal-title" id="myModalLabel">Tambah Sales</h4>
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

                  <form method="post" data-parsley-validate class="form-horizontal form-label-left" action="/sales">
                    @csrf

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Sales
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nm_sales" required="required" name="nm_sales" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat Sales
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="alamat_sales" required="required" name="alamat_sales" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Lokasi
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="lokasi" required="required">
                          @isset($lokasis)
                            @foreach($lokasis as $lokasi)
                              <option value='{{$lokasi->id_lokasi}}'>{{$lokasi->nm_lokasi}}</option>
                            @endforeach
                          @endisset
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Telepon
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="no_hp" required="required" name="no_hp" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <input type="submit" class="btn btn-success" value="Submit"> {{--
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button> --}}
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
        <h4 class="modal-title" id="myModalLabel">Edit Sales</h4>
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

                <form id="editForm" method="post" data-parsley-validate class="form-horizontal form-label-left" action="/sales">
                  @csrf @method('put')

                  <div class="form-group nama_sales">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Sales
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="nm_sales_upt" required="required" name="nm_sales_upt" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group alamat_sales">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat Sales
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="alamat_sales_upt" required="required" name="alamat_sales_upt" class="form-control col-md-7 col-xs-12"
                        value="">
                    </div>
                  </div>

                  <div class="form-group no_hp">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Telepon
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="no_hp_upt" required="required" name="no_hp_upt" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <input type="submit" class="btn btn-success" value="Submit"> {{--
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button> --}}
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
      <form id="deleteForm" action="" method="POST">
        @csrf @method('delete')
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Apakah Anda Yakin ingin menghapus?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-danger delete-user" value="Hapus">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop @section('js')
<script>
  $(function () {
    $('#sales-table').DataTable({
      serverSide: true,
      processing: true,
      ajax: '/master-sales',
      columns: [{
          data: 'id_sales'
        },
        {
          data: 'nm_sales'
        },
        {
          data: 'alamat_sales'
        },
        {
          data: 'no_hp'
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
    var alamat = button.data('alamat')
    var nohp = button.data('nohp')
    var id = button.data('id')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    $('#editForm').attr('action', `/sales/${id}`);
    modal.find('.modal-body .nama_sales input').val(name)
    modal.find('.modal-body .alamat_sales input').val(alamat)
    modal.find('.modal-body .no_hp input').val(nohp)
  })
</script>

<script>
  $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#deleteForm').attr('action', `/sales/${id}`);
  })
</script>
@stop
