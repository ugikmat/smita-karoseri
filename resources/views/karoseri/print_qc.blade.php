@extends('adminlte::page')

@section('title', 'Quality Control')

@section('content_header')
    <h1>Quality Control</h1>

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

        <form method="post" data-parsley-validate class="form-horizontal form-label-left" action="/qualitycontrol" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="controls input-append date form_datetime" data-date="2018-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                      <input size="25" type="text" value="" readonly>
                      <span class="add-on"><i class="icon-remove"></i></span>
                      <span class="add-on"><i class="icon-th"></i></span>
                      </div>
                        <input type="hidden" id="dtp_input1" name="dtp_input1" value="" required/><br/>
                </div>
              </div>

              <div class="form-group produksi">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Produksi<span class="required"></span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kode_produksi" required="required" name="kode_produksi" class="form-control col-md-7 col-xs-12"  value="{{Request()->get('num')}}" readonly>
                      <input type="hidden" id="id_produksi_get" required="required" name="id_produksi_get" class="form-control col-md-7 col-xs-12"  value="{{Request()->get('idprod')}}" readonly>

                    </div>
                </div>

              <!-- textarea -->
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Progress Unit <span class="required"></span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <textarea id="progress" name="progress" rows="10" cols="80" placeholder="Progress Unit ..."></textarea>
                  </div>
                </div>

              <div class="form-group">
                <label for="exampleInputFile"class="control-label col-md-3 col-sm-3 col-xs-12">Upload File <span class="required"></span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="exampleInputFile" name="uploadedfiles[]" multiple>
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
<!-- modals-tambah -->

<!-- Main content -->
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-money"></i> Penawaran
      </h2>
    </div><!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      @php
      $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
      $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
      $tanggal = $data->tanggal;
      $tahun = date('Y', strtotime($tanggal));
      $bulan = date('m', strtotime($tanggal));
      $tgl = date('d', strtotime($tanggal));

      $fix = $tgl.' '.$blnindo[$bulan-1].' '.$tahun;
      $rom = $blnromawi[$bulan-1];
      @endphp
      <address>
        No SPKC&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;:<strong>{{$data->id_spkc}}/SPK/{{$rom}}/{{$tahun}}</strong><br>
        Tanggal SPKC&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<strong>{{$fix}}</strong><br>
        Nama Customer&emsp;&emsp;:<strong>{{$data->nm_cust}}</strong><br>
        Jenis Karoseri&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;:<strong>{{$data->jenis_karoseri}}</strong><br>
        Kode Produksi&emsp;&emsp;&nbsp;&nbsp;&nbsp;:<strong>{{Request()->get('num')}}</strong><br>
      </address>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table id="qc-table" class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal & Waktu Mulai</th>
            <th>Foto Pengerjaan</th>
            <th>Progress Unit</th>
          </tr>
        </thead>
        <!--<tbody>

          <tr>
            <td>1</td>
            <td>15 Agustus 2018 16:41:10</td>
            <td>foto.jpeg</td>
            <td>Sudah di cat</td>
          </tr>
        </tbody>-->
      </table>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <div class="row">
    <div class="col-xs-6">
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th style="width:50%">Tanggal akhir:</th>
            <td><label>{{$data->tgl_akhir}}</td>
          </tr>
        </table>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- /selesai -->
  <section class="content-header">

@if($data->tgl_akhir == null)
  <a href="" class="btn btn-info pull-right" data-toggle="modal" data-target="#selesaiModal"><i class="glyphicon glyphicon-check"></i>Selesai</a>
@endif
        <div class="modal fade bs-example-modal-lg" id='selesaiModal' tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Selesai</h4>
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

          <form method="post" data-parsley-validate class="form-horizontal form-label-left" action="/akhirproduksi" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Selesai<span class="required"></span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="controls input-append date form_datetime" data-date="2018-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input2">
                        <input size="16" type="text" value="" readonly>
                        <span class="add-on"><i class="icon-remove"></i></span>
                        <span class="add-on"><i class="icon-th"></i></span>
                        </div>
                          <input type="hidden" id="dtp_input2" name="dtp_input2" value="" /><br/>
                          <input type="hidden" id="id_produksi" name="id_produksi" value="{{Request()->get('idprod')}}" /><br/>
                  </div>
                </div>

            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <input type="submit" class="btn btn-success" Value="Selesai">
                {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button> --}}
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


</section><!-- /.content -->
@stop

@section('js')

<script>
CKEDITOR.replace('progress');
$(function () {
  var id = $('#id_produksi_get').val()
    $('#qc-table').DataTable({
        serverSide: true,
        processing: true,
        ordering: false,
        paging: false,
        info: false,
        searching: false,
        method: 'post',
        ajax: `/karoseri-print_qc/${id}`,
        columns: [
            {data: 'id_produksi'},
            {data: 'tgl_jam'},
            {data: 'foto_pengerjaan'},
            {data: 'kegiatan'}
        ]
    });
});
</script>
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
