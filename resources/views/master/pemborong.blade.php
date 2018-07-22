@extends('adminlte::page')

@section('title', 'pemborong')

@section('content_header')
    <h1>Daftar Pemborong</h1>

@stop @section('css')
<style>
  tfoot input {
    width: 100%;
    box-sizing: border-box;
  }
</style>
@stop 
@section('content')
<table id="pb-table" class="table table-bordered">
    <thead>
    <tr>
      <th>Id</th>
      <th>Nama Pemborong</th>
      <th>Jabatan Pemborong</th>
      <th>Jumlah Anggota</th>
      <th>action</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
      <th>Id</th>
      <th>Nama Pemborong</th>
      <th>Jabatan Pemborong</th>
      <th>Jumlah Anggota</th>
    </tr>
    </tfoot>
</table>
<!-- Modal Tambah -->
<section class="content-header">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">Tambah</button>
      <div class="modal fade bs-example-modal-lg" id='modal1' tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Tambah Pemborong</h4>
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

        <form method="post" data-parsley-validate class="form-horizontal form-label-left" action="/pemborong">
          @csrf

          <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pemborong<span class="required">*</span>
           </label>
           <div class="col-md-6 col-sm-6 col-xs-12">
             <input type="text" id="nm_pb" required="required" name="nm_pb" class="form-control col-md-7 col-xs-12" value="">
           </div>
         </div>

         <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan Pemborong <span class="required">*</span>
           </label>
             <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="jenis_pb" name="jenis_pb" class="form-control col-md-7 col-xs-12" required>
                           <option selected disabled value="">Pilih Jabatan Pemborong</option>
                           <option value="Pemborong Rakit">Pemborong Rakit</option>
                           <option value="Pemborong Cat">Pemborong Cat</option>
                           <option value="Pemborong Fitting">Pemborong Fitting</option>
                      </select>
                   </div>
                 </div>


        <div class="form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Anggota<span class="required">*</span>
         </label>
         <div class="col-md-6 col-sm-6 col-xs-12">
           <input type="number" id="jml_ang" required="required" name="jml_ang" class="form-control col-md-7 col-xs-12" value="">
         </div>
       </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button class="btn btn-primary" type="reset">Reset</button>
              <input type="submit" class="btn btn-success" value="Submit">
              {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button> --}}
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
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
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

  <form id="editForm" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">
    @csrf
    @method('put')

    <div class="form-group nama_pb">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pemborong<span class="required">*</span>
     </label>
     <div class="col-md-6 col-sm-6 col-xs-12">
       <input type="text" id="nm_pb_upt" required="required" name="nm_pb_upt" class="form-control col-md-7 col-xs-12" value="">
     </div>
   </div>

   <div class="form-group jenis_pb">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan Pemborong <span class="required">*</span>
     </label>
       <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="jenis_pb_upt" name="jenis_pb_upt" class="form-control col-md-7 col-xs-12" required>
                     <option class="mark" selected disabled value=""></option>
                     <option value="Pemborong Rakit">Pemborong Rakit</option>
                     <option value="Pemborong Cat">Pemborong Cat</option>
                     <option value="Pemborong Fitting">Pemborong Fitting</option>
                </select>
             </div>
           </div>


  <div class="form-group jml">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Anggota<span class="required">*</span>
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
     <input type="number" id="jml_ang_upt" required="required" name="jml_ang_upt" class="form-control col-md-7 col-xs-12" value="">
   </div>
 </div>

    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <input type="submit" class="btn btn-success" value="Submit">
        {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button> --}}
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
      @csrf
      @method('delete')
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

@stop

@section('js')
<script>
    $(function () {
        $('#pb-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/master-pemborong',
            columns: [
                {data: 'id_pb'},
                {data: 'nm_pb'},
                {data: 'jenis_pb'},
                {data: 'jml_ang'},
                {data: 'action', orderable: false, searchable: false}
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
  var name = button.data('name')// Extract info from data-* attributes
  var jenis = button.data('jenis')
  var jml = button.data('jml')
  var id = button.data('id')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  $('#editForm').attr('action', `/pemborong/${id}`);
  modal.find('.modal-body .nama_pb input').val(name)
  modal.find('.modal-body .jenis_pb .mark option').val(jenis)
  modal.find('.modal-body .jml input').val(jml)
  })
</script>
<script>
  $('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')// Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  $('#deleteForm').attr('action', `/pemborong/${id}`);
  })
</script>
@stop
