@extends('adminlte::page') @section('title', 'Harga Dompul') @section('content_header')
<h1>Master Harga Dompul</h1>

@stop @section('css') {{--
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/u/bs-3.3.6/jq-2.2.3,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.12,b-1.2.0,b-colvis-1.2.0,b-html5-1.2.0,b-print-1.2.0,fh-3.1.2,se-1.2.0/datatables.min.css"
/> --}}
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css"/> @stop @section('content')
<style>
  tfoot input {
    width: 100%;
    box-sizing: border-box;
  }
</style>
<table id="harga-dompul-table" class="table responsive" width="100%">
  <thead>
    <tr>
      <th>Id Harga Dompul</th>
      <th>Nama Harga Dompul</th>
      <th>Tipe Harga Dompul</th>
      <th>Harga Dompul</th>
      <th>Tanggal Update</th>
      <th>Status</th>
      @if(Auth::user()->level_user!='Kasir')
      <th>Action</th>
      @endif
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Id Harga Dompul</th>
      <th>Nama Harga Dompul</th>
      <th>Tipe Harga Dompul</th>
      <th>Harga Dompul</th>
      <th>Tanggal Update</th>
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
          <h4 class="modal-title" id="myModalLabel">Tambah Harga Dompul</h4>
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

                  <form id="tambah" method="post" data-parsley-validate class="form-horizontal form-label-left" action="/operasional/smita/master/harga_dompul">
                    @csrf
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Harga Dompul
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="nama" required="required">
                          <option value="DP5">DP5</option>
                          <option value="DP10">DP10</option>
                          <option value="DOMPUL">DOMPUL</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Harga Dompul
                        <span class="required">*</span>
                      </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="tipe" required="required">
                          @isset($tipes)
                            @foreach($tipes as $tipe)
                              <option value="{{$tipe->tipe_dompul}}" id="{{$tipe->tipe_dompul}}">{{$tipe->tipe_dompul}}</option>
                            @endforeach
                          @endisset
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Dompul
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="harga" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    {{-- <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Update
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12 date_picker">
                        <input type="text" id="update_time" class="form-control" name="update_time" placeholder="Pick Date">
                      </div>
                    </div> --}}
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
        <h4 class="modal-title" id="myModalLabel">Edit Harga Dompul</h4>
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
                  <div class="form-group nama">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Harga Dompul
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group tipe">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Harga Dompul
                      <span class="required">*</span>
                    </label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="tipe" required="required">
                          @isset($tipes)
                            @foreach($tipes as $tipe)
                              <option value="{{$tipe->tipe_dompul}}" id="{{$tipe->tipe_dompul}}">{{$tipe->tipe_dompul}}</option>
                            @endforeach
                          @endisset
                        </select>
                      </div>
                  </div>

                  <div class="form-group harga">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Dompul
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="harga" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  {{-- <div class="form-group tanggal">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Update
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12 date_picker">
                      <input type="text" id="update_time" class="form-control" name="update_time" placeholder="Pick Date">
                    </div>
                  </div> --}}

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
        <button type="submit" class="btn btn-danger" >Hapus</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
      </form>
    </div>
  </div>
</div>
@stop @section('js')
<script>
  $(function () {
    $('#harga-dompul-table').DataTable({
      serverSide: true,
      processing: true,
      stateSave: true,
      ajax: '/operasional/smita/harga-dompul-data',
      columns: [{
          data: 'id_harga_dompul'
        },
        {
          data: 'nama_harga_dompul'
        },
        {
          data: 'tipe_harga_dompul'
        },
        {
          data: 'harga_dompul'
        },
        {
          data: 'tanggal_update'
        },
        {
          data: 'status_harga_dompul'
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
    var id = button.data('id')
    var nama = button.data('nama')
    var tipe = button.data('tipe')
    var harga = button.data('harga')
    // var tanggal = button.data('tanggal')
    // var status = button.data('status')

    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    $('#editForm').attr('action', `/operasional/smita/master/harga_dompul/${id}`);
    modal.find('.modal-body .nama input').val(nama)
    modal.find(`.modal-body .tipe #${tipe}`).attr('selected','selected');
    modal.find('.modal-body .harga input').val(harga)
    // modal.find('.modal-body .tanggal input').val(tanggal)
    // modal.find('.modal-body .status input').val(status)
  })
</script>
<script>
  $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#deleteForm').attr('action', `/operasional/smita/master/harga_dompul/${id}`);
  })
</script>
{{--
<script type="text/javascript" src="https://cdn.datatables.net/u/bs-3.3.6/jq-2.2.3,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.12,b-1.2.0,b-colvis-1.2.0,b-html5-1.2.0,b-print-1.2.0,fh-3.1.2,se-1.2.0/datatables.min.js"></script> --}}
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
