@extends('adminlte::page')

@section('title', 'Sales')

@section('content_header')
    <h1>Master Sales</h1>

@stop

@section('content')
<table id="sales-table" class="table table-bordered">
    <thead>
    <tr>
        <th>Id Sales</th>
        <th>Nama Sales</th>
        <th>Alamat Sales</th>
        <th>No Telepon</th>
        <th>Action</th>
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
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
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

        <form id="tambah" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">

          <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Sales<span class="required">*</span>
           </label>
           <div class="col-md-6 col-sm-6 col-xs-12">
             <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
           </div>
         </div>

         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat Sales<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
          </div>
        </div>

        <div class="form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Telepon<span class="required">*</span>
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
      </section>


<!--Modal Edit-->
<div class="modal fade bs-example-modal-lg" id='modalEdit' tabindex="-1" role="dialog" aria-hidden="true">
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

  <form id="edit" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">

    <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Sales<span class="required">*</span>
     </label>
     <div class="col-md-6 col-sm-6 col-xs-12">
       <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
     </div>
   </div>

   <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat Sales<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
    </div>
  </div>

  <div class="form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Telepon<span class="required">*</span>
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
        $('#sales-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/sales-data',
            columns: [
                {data: 'id_sales'},
                {data: 'nm_sales'},
                {data: 'alamat_sales'},
                {data: 'no_hp'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@stop
