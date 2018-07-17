@extends('adminlte::page')

@section('title', 'Gudang')

@section('content_header')
    <h1>Master Gudang</h1>

@stop

@section('content')
<table id="gdg-table" class="table table-bordered">
    <thead>
    <tr>
        <th>Id Gudang</th>
        <th>Id Lokasi</th>
        <th>Nama Gudang</th>
        <th>Action</th>
    </tr>
    </thead>
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
              <h4 class="modal-title" id="myModalLabel">Tambah Gudang</h4>
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

        <form  method="post" data-parsley-validate class="form-horizontal form-label-left" action="/gudang">
          @csrf
           <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Gudang<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="id_gudang" required="required" name="id_gudang" class="form-control col-md-7 col-xs-12" value="">
            </div>
          </div>

          <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Lokasi<span class="required">*</span>
           </label>
           <div class="col-md-6 col-sm-6 col-xs-12">
             <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
           </div>
         </div>

         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Gudang<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="nm_gudang" required="required" name="nm_gudang" class="form-control col-md-7 col-xs-12" value="">
          </div>
        </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button class="btn btn-primary" type="reset">Reset</button>
              <input type="submit" class="btn btn-success" Value="Submit">
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
<div class="modal fade bs-example-modal-lg" id='modal1' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Gudang</h4>
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

  <form id="tambah-lokasi" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">
     <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Gudang<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="first-name" required="required" name="idcs" class="form-control col-md-7 col-xs-12" value="">
      </div>
    </div>

    <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Lokasi<span class="required">*</span>
     </label>
     <div class="col-md-6 col-sm-6 col-xs-12">
       <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
     </div>
   </div>

   <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Gudang<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
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

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Apakah Anda Yakin ingin menghapus?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Hapus</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>
@stop

@section('js')
<script>
    $(function () {
        $('#gdg-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/master-gudang',
            columns: [
                {data: 'id_gudang'},
                {data: 'id_lokasi'},
                {data: 'nm_gudang'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@stop
