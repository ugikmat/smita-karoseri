@extends('adminlte::page')

@section('title', 'Suplier')

@section('content_header')
    <h1>Daftar Suplier</h1>

@stop

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/u/bs-3.3.6/jq-2.2.3,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.12,b-1.2.0,b-colvis-1.2.0,b-html5-1.2.0,b-print-1.2.0,fh-3.1.2,se-1.2.0/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css"/>
@stop

@section('content')
<table id="suplier-table" class="table table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>Nama Suplier</th>
        <th>Amalat Suplier</th>
        <th>Telepon Suplier</th>
        <th>Email Suplier</th>
        <th>Tanggal Input</th>
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
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
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

        <form id="tambah" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">

          <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Suplier<span class="required">*</span>
           </label>
           <div class="col-md-6 col-sm-6 col-xs-12">
             <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
           </div>
         </div>

         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat Suplier<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" required="required" name="alamat" class="form-control col-md-7 col-xs-12" value="">
          </div>
        </div>

        <div class="form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Telepon<span class="required">*</span>
         </label>
         <div class="col-md-6 col-sm-6 col-xs-12">
           <input type="text" id="first-name" required="required" name="telepon" class="form-control col-md-7 col-xs-12" value="">
         </div>
       </div>

       <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email Suplier<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="first-name" required="required" name="email" class="form-control col-md-7 col-xs-12" value="">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Input<span class="required">*</span>
        </label>
                <div class="col-md-6 col-sm-6 col-xs-12 date_picker">
                  <input type="text" id="update_time" class="form-control" name="update_time" placeholder="Pick Date">
                </div>
      </div>

      <div class="form-group">
       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status Suplier<span class="required">*</span>
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
      </section>

<!--Edit-->
<div class="modal fade bs-example-modal-lg" id='modalEdit' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
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

    <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Suplier<span class="required">*</span>
     </label>
     <div class="col-md-6 col-sm-6 col-xs-12">
       <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
     </div>
   </div>

   <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat Suplier<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="first-name" required="required" name="alamat" class="form-control col-md-7 col-xs-12" value="">
    </div>
  </div>

  <div class="form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Telepon<span class="required">*</span>
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
     <input type="text" id="first-name" required="required" name="telepon" class="form-control col-md-7 col-xs-12" value="">
   </div>
 </div>

 <div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email Suplier<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="first-name" required="required" name="email" class="form-control col-md-7 col-xs-12" value="">
  </div>
</div>

<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Input<span class="required">*</span>
  </label>
          <div class="col-md-6 col-sm-6 col-xs-12 date_picker">
            <input type="text" id="update_time" class="form-control" name="update_time" placeholder="Pick Date">
          </div>
</div>

<div class="form-group">
 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status Suplier<span class="required">*</span>
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
        $('#suplier-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/suplier-data',
            columns: [
                {data: 'id_supplier'},
                {data: 'nama_supplier'},
                {data: 'alamat_supplier'},
                {data: 'telepon_supplier'},
                {data: 'email_supplier'},
                {data: 'tanggal'},
                {data: 'status_supplier'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
<script type="text/javascript" src="https://cdn.datatables.net/u/bs-3.3.6/jq-2.2.3,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.12,b-1.2.0,b-colvis-1.2.0,b-html5-1.2.0,b-print-1.2.0,fh-3.1.2,se-1.2.0/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/locales/bootstrap-datepicker.en.min.js"></script>
<script type="text/javascript">
        $('.date_picker input').datepicker({
          format: "dd.mm.yyyy",
          todayBtn: "linked",
          language: "en"
        });
    </script>
@stop
