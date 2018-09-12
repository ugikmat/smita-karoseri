@extends('adminlte::page') @section('title', 'Upload') @section('content_header')
<h1>Upload File</h1>

@stop @section('css')
<style>
</style>
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">
<style>
  tfoot input {
    width: 100%;
    box-sizing: border-box;
  }
</style>
<style>
  .scrolling table {
    table-layout: inherit;
  }

  .scrolling td,
  th {
    vertical-align: top;
    padding: 10px;
    min-width: 100px;
  }

  .outer {
    position: relative
  }

  .inner {
    overflow-x: auto;
    overflow-y: visible;
  }
  #detailModal.modal{
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  overflow: hidden;
}

#detailModal .modal-dialog{
  position: fixed;
  margin: 0;
  width: 100%;
  height: 100%;
  padding: 0;
}

#detailModal .modal-content{
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  border: 2px solid #3c7dcf;
  border-radius: 0;
  box-shadow: none;
}

#detailModal .modal-header{
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  height: 50px;
  padding: 10px;
  background: #6598d9;
  border: 0;
}

#detailModal .modal-title{
  font-weight: 300;
  font-size: 2em;
  color: #fff;
  line-height: 30px;
}

#detailModal .modal-body{
  position: absolute;
  top: 50px;
  bottom: 60px;
  width: 100%;
  font-weight: 300;
  overflow: auto;
}

#detailModal .modal-footer{
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  height: 60px;
  padding: 10px;
  background: #f1f3f5;
}
</style>
@stop @section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">Upload</button>
      <a href="{{ URL::to('downloadExcel/xls') }}">
        <button class="btn btn-success">Download Excel xls</button>
      </a>
      <a href="{{ URL::to('downloadExcel/xlsx') }}">
        <button class="btn btn-success">Download Excel xlsx</button>
      </a>
      <a href="{{ URL::to('downloadExcel/csv') }}">
        <button class="btn btn-success">Download CSV</button>
      </a>
      <a href="{{ URL::to('downloadExcel/pdf') }}">
        <button class="btn btn-success">Download PDF</button>
      </a>
      {{-- <a href="{{ URL::to('/upload/empty') }}">
        <button class="btn btn-warning">Empty Data</button>
      </a> --}}
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      Tanggal : {{Carbon\Carbon::now('Asia/Jakarta')->format('d-m-Y')}}
    </div>
  </div>
</div>
<br>
<table id="tgl-upload-table" class="table responsive" width="100%">
  <thead>
    <tr>
      <th>Tanggal TRX</th>
      <th>Tanggal Upload</th>
      <th>User</th>
      <th>Lokasi</th>
      <th>Qty</th>
      <th>Aktif</th>
      <th>Action</th>
      
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Tanggal TRX</th>
      <th>Tanggal Upload</th>
      <th>User</th>
      <th>Lokasi</th>
      <th>Aktif</th>
      <th>Qty</th>
    </tr>
  </tfoot>
</table>
<!-- Modal -->
<div id="detailModal" class="modal fade" role="dialog" width="100%">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Transaksi</h4>
      </div>
      <div class="modal-body">
        <div class="scrolling outer">
  <div class="inner">
    <table id="upload-table" class="table responsive" width="100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>HP Sub Master</th>
          <th>Nama Sub Master</th>
          <th>Tanggal TRX</th>
          <th>Tanggal Upload</th>
          <th>No Faktur</th>
          <th>Produk</th>
          <th>Qty</th>
          <th>Balance</th>
          <th>Diskon</th>
          <th>HP Downline</th>
          <th>Nama Downline</th>
          <th>Status</th>
          <th>HP Kanvacer</th>
          <th>Nama Kanvacer</th>
          <th>Inbox</th>
          {{-- <th>Print</th> --}}
          <th>Bayar</th>
          {{-- <th>Action</th> --}}
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>HP Sub Master</th>
          <th>Nama Sub Master</th>
          <th>Tanggal TRX</th>
          <th>Tanggal Upload</th>
          <th>No Faktur</th>
          <th>Produk</th>
          <th>Qty</th>
          <th>Balance</th>
          <th>Diskon</th>
          <th>HP Downline</th>
          <th>Nama Downline</th>
          <th>Status</th>
          <th>HP Kanvacer</th>
          <th>Nama Kanvacer</th>
          <th>Inbox</th>
          {{-- <th>Print</th> --}}
          <th>Bayar</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="uploadModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Excel</h4>
      </div>
      <div class="modal-body">
        <!-- Form -->
        <form method='post' action='/importExcel' enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="import_file">File</label>
            <input type='file' name='import_file' id='import_file' class='form-control' accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
            <br>
            <input type='submit' class='btn btn-info' value='Upload' id='upload'>
          </div>
        </form>
        <!-- Preview-->
        <div id='preview'></div>
      </div>

    </div>
  </div>
</div>

<!--Modal Edit-->
<div class="modal fade bs-example-modal-lg" id='editModal' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No HP Sub Master Dompul
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="hpsub" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group tipe">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Sub Master Dompul
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="namasub" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group induk">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Transfer
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input class="datepicker col-md-7 col-xs-12" data-date-format="mm/dd/yyyy">
                    </div>
                  </div>

                  <div class="form-group nilai">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Faktur
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="faktur" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  <div class="form-group nilai">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Produk
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="produk" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  <div class="form-group nilai">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Qty
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="qty" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  <div class="form-group nilai">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Balance
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="balance" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  <div class="form-group nilai">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Diskon
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="diskon" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  <div class="form-group nilai">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No HP Downline
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="nodl" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  <div class="form-group nilai">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Downline
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="namadl" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  <div class="form-group nilai">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="status" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  <div class="form-group nilai">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No HP Kanvacer
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="nokvc" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  <div class="form-group nilai">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Kanvacer
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="namakvc" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  <div class="form-group nilai">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Print
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="print" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  <div class="form-group nilai">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bayar
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="bayar" class="form-control col-md-7 col-xs-12" value="">
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
      <form action="" method="POST" id="deleteForm">
        @csrf @method('delete')
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Apakah Anda Yakin ingin menghapus?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Hapus</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--Modal Aktivasi-->
<div class="modal fade" id="activationModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" method="POST" id="activationForm">
        @csrf @method('put')
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Apakah Anda Yakin ingin melakukan aktivasi pada file ini?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Aktivasi</button>
        </div>
      </form>
    </div>
  </div>
</div>

@stop @section('js') {{--
<script type="text/javascript">
  //    validasi form (hanya file .xls yang diijinkan)
  function validateForm() {
    function hasExtension(inputID, exts) {
      var fileName = document.getElementById(inputID).value;
      return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
    }

    if (!hasExtension('dompul', ['.xls'])) {
      alert("Hanya file XLS yang diijinkan.");
      return false;
    }
  }
</script> --}}
<script>
  $(function () {
    $('#tgl-upload-table').DataTable({
      serverSide: true,
      processing: true,
      stateSave: true,
      ajax: '/upload/tgl',
      columns: [
        {
          data: 'tanggal_transfer'
        },
        {
          data: 'tanggal_upload'
        },
        {
          data: 'name'
        },
        {
          data: 'nm_lokasi'
        },
        {
          data: 'jumlah_transaksi'
        },
        {
          data: 'status_active'
        },
        {
          data: 'action',
          orderable: false,
          searchable: false
        }
        
      ],
      dom: 'lBrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
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
    var table = $('#upload-table').DataTable({
      serverSide: true,
      processing: true,
      stateSave: true,
      //Just Dummy Date
      ajax: '/upload/null/null',
      columns: [{
          data: 'id_upload'
        },
        {
          data: 'no_hp_sub_master_dompul'
        },
        {
          data: 'nama_sub_master_dompul'
        },
        {
          data: 'tanggal_transfer'
        },
        {
          data: 'tanggal_upload'
        },
        {
          data: 'no_faktur'
        },
        {
          data: 'produk'
        },
        {
          data: 'qty'
        },
        {
          data: 'balance'
        },
        {
          data: 'diskon'
        },
        {
          data: 'no_hp_downline'
        },
        {
          data: 'nama_downline'
        },
        {
          data: 'status'
        },
        {
          data: 'no_hp_canvasser'
        },
        {
          data: 'nama_canvasser'
        },
        {
          data: 'inbox'
        },
        // {
        //   data: 'print'
        // },
        {
          data: 'bayar'
        }
      ],
      dom: 'lBrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
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
  $('#detailModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var transfer = button.data('transfer') // Extract info from data-* attributes
    var upload = button.data('upload')
    table.ajax.url(`/upload/${transfer}/${upload}`).load();
  })
  $('#activationModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var transfer = button.data('transfer') // Extract info from data-* attributes
    var upload = button.data('upload')
    $('#activationForm').attr('action',`/upload/aktifasi/${transfer}/${upload}`);
  })
</script>
<script src="{{ asset('/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
  $('.datepicker').datepicker({});
</script>
@stop
