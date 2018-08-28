@extends('adminlte::page')

@section('title', 'Quality Control')

@section('content_header')
    <h1>Quality Control Pemborong</h1>

@stop
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
@section('content')

<section class="content-header">
<a href="" class="btn btn-success" data-toggle="modal" data-target="#tambahModal"><i class="glyphicon glyphicon-plus-sign"></i> Tambah QC</a>
      <div class="modal fade bs-example-modal-lg" id='tambahModal' tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Tambah Quality Control</h4>
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

        <form method="post" data-parsley-validate class="form-horizontal form-label-left" action="/kasbon">
          @csrf
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="controls input-append date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                      <input size="16" type="text" value="" readonly>
                      <span class="add-on"><i class="icon-remove"></i></span>
                      <span class="add-on"><i class="icon-th"></i></span>
                      </div>
                        <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
              </div>

              <div class="form-group produksi">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Produksi<span class="required"></span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="produksi" required="required" name="produksi" class="form-control col-md-7 col-xs-12"  value="" readonly>
                    </div>
                </div>

                <div class="form-group produksi">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Presentase<span class="required"></span>
                    </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="presentase" required="required" name="presentase" class="form-control col-md-7 col-xs-12"  value="">
                      </div>
                  </div>

              <!-- textarea -->
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Progress Unit <span class="required"></span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <textarea id="editor1" name="editor1" rows="10" cols="80" placeholder="Progress Unit ..."></textarea>
                  </div>
                </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <input type="submit" class="btn btn-success pull-right" Value="Create QC">
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
<!-- modals-edit -->

<!-- Main content -->
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
      </h2>
    </div><!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">

      <address>
        No SPKC&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:<strong>12/SPK/VIII/2018</strong><br>
        Tanggal SPKB&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:<strong>13 Juli 2018</strong><br>
        Nama Pemborong&emsp;&emsp;&emsp;&emsp;:<strong>Dwizta</strong><br>
        Jabatan Pemborong&emsp;&emsp;&emsp;:<strong>Rakit</strong><br>
      </address>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal & Waktu</th>
            <th>Presentase</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1A</td>
            <td>12 Agustus 2018-10.10am</td>
            <td>25%</td>
            <td>Sudah di cat</td>
          </tr>
        </tbody>
      </table>
    </div><!-- /.col -->
  </div><!-- /.row -->

</section><!-- /.content -->

<section class="content-header">
<a href="" class="btn btn-info pull-right" data-toggle="modal" data-target="#tanggalModal"><i class="glyphicon glyphicon-print"></i> Print</a>
      <div class="modal fade bs-example-modal-lg" id='tanggalModal' tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Tanggal Selesai Pekerjaan Pemborong</h4>
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

        <form method="post" data-parsley-validate class="form-horizontal form-label-left" action="">
          @csrf

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" id="tgl_pengerjaan" name="tgl_pengerjaan" class="ferry ferry-from" required="required">
                <input type="text" id="id_qcpb" name="id_qcpb" class="ferry ferry-from" required="required" value="{{Re}}" readonly>
              </div>
            </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <input type="submit" class="btn btn-success" Value="Print">
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
@stop

@section('js')
<script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
@stop
