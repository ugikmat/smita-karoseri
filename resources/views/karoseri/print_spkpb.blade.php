@extends('adminlte::page')

@section('title', 'Print SPKPB')

@section('content_header')
    <h1>SPKPB</h1>

@stop

@section('content')

@php
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

$idc = Request()->get('idspkpb');
$idqc = DB::table('qcpb_tabels')->where('id_spkpb', $idc)->first();


@endphp

<section class="content-header">
<a href="" class="btn btn-success" data-toggle="modal" data-target="#tambahModal"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Kasbon</a>
<a href="" class="btn btn-success" data-toggle="modal" data-target="#tambah1Modal"><i class="glyphicon glyphicon-plus-sign"></i> Tambah QC</a>

      <div class="modal fade bs-example-modal-lg" id='tambahModal' tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Tambah Kasbon</h4>
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
                <input type="date" id="tgl_kasbon" name="tgl_kasbon" class="ferry ferry-from" required="required">
              </div>
            </div>

            <div class="form-group spkpbkasbon">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. SPK Pemborong <span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?php
                  $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                  $tanggal = $data->tgl_spkpb;
                  $tahun = date('Y', strtotime($tanggal));
                  $bulan = date('m', strtotime($tanggal));
                  $tgl = date('d', strtotime($tanggal));

                  $rom = $blnromawi[$bulan-1]; ?>
                  <select id="spkpb_kasbon" name="spkpb_kasbon" class="form-control" disabled>
                        <option value="" name="">{{$data['id_spkpb']}}/SPKPB/{{$rom}}/{{$tahun}}</option>
                    </select>
                    <input type="hidden" name="spkpb_kasbon_value" id="spkpb_kasbon_value" Value="{{$data['id_spkpb']}}">
                </div>
            </div>

            <div class="form-group pemborongkasbon">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pemborong<span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="nm_pemborong" required="required" name="nm_pemborong" class="form-control col-md-7 col-xs-12" value="{{$data['nm_pb']}}" readonly>
                </div>
            </div>

          <div class="form-group jabatankasbon">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan<span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="jabatan" required="required" name="jabatan" class="form-control col-md-7 col-xs-12"  value="{{$data['jenis_pb']}}" readonly>
                </div>
            </div>

            <div class="form-group hargaborongankasbon">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Borongan<span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="harga_borongan_kasbon" required="required" name="harga_borongan_kasbon" class="form-control col-md-7 col-xs-12"  value="{{$data['harga_borongan']}}" readonly>
                  </div>
              </div>

            <div class="form-group keterangankasbon">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Keterangan <span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="nm_kasbon" required="required" name="nm_kasbon" class="form-control col-md-7 col-xs-12" >
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kas Bon <span class="required"></span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" autocomplete="off" id="jumlah_kasbon" required="required" name="jumlah_kasbon" class="form-control col-md-7 col-xs-12 numonly" >
                    </div>
              </div>

              <div class="form-group sisakasbon">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Sisa Borongan<span class="required"></span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="sisa" required="required" name="sisa" class="form-control col-md-7 col-xs-12" value="{{$sisa['sb']}}" readonly>
                    </div>
              </div>


          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <input type="submit" class="btn btn-success pull-right" Value="Create Kasbon">
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


<section class="content-header">
      <div class="modal fade bs-example-modal-lg" id='tambah1Modal' tabindex="-1" role="dialog" aria-hidden="true">
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

        <form id="updateqc" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">
          @csrf
          @method('put')
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="controls input-append date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                      <input required size="16" type="text" value="" readonly>
                      <span class="add-on"><i class="icon-remove"></i></span>
                      <span class="add-on"><i class="icon-th"></i></span>
                      </div>
                        <input type="hidden" id="dtp_input1" name="dtp_input1" value="" /><br/>
                </div>
              </div>

                <div class="form-group produksi">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Persentase<span class="required"></span>
                    </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="persentase_upt" required="required" name="persentase_upt" class="form-control col-md-7 col-xs-12"  value="">
                        <input type="hidden" id="idqc_upt" required="required" name="idqc_upt" class="form-control col-md-7 col-xs-12"  value="{{$idqc->id_qcpb}}">
                      </div>
                  </div>

                  <div class="form-group produksi">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Perkejaan<span class="required"></span>
                      </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="jn_kerja" required="required" name="jn_kerja" class="form-control col-md-7 col-xs-12"  value="">
                        </div>
                    </div>

                    <div class="form-group produksi">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keterangan<span class="required"></span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="keterangan" required="required" name="keterangan" class="form-control col-md-7 col-xs-12"  value="">
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
        <i class="fa fa-money"></i> Kasbon
      </h2>
    </div><!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">

      <address>
        No SPK Pemborong&emsp;:&emsp;<strong>{{$data['id_spkpb']}}/SPKPB/{{$rm}}/{{$thn}}</strong><br>
        Nama Pemborong&emsp;&ensp;:&emsp;{{$data['nm_pb']}}<br>
        Jabatan&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;:&emsp;{{$data['jenis_pb']}}<br>
        Harga Borongan&emsp;&ensp;&nbsp;&nbsp;&nbsp;&nbsp;:&emsp;{{number_format($data['harga_borongan']).""}}<br>
      </address>
    </div><!-- /.col -->
    <div class="col-sm-4 invoice-col">
      Jenis Karoseri &nbsp;&emsp;: {{$data['jenis_karoseri']}}<br>
      Ukuran &emsp;&emsp;&emsp;&emsp;: {{$data['ukuran_karoseri']}} m<br>
      Jumlah Unit &emsp;&emsp;: {{$data['jumlah_unit']}} Unit<br>
      <br>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Katerangan</th>
            <th>Kasbon</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          @foreach($kasbon as $dt)
          <tr>
            <td>{{$i}}</td>
            <td>{{$dt['nm_kasbon']}}</td>
            <td><Label>Rp.</label>{{number_format($dt['jumlah_kasbon']).""}}</td>
          </tr>
          <?php $i++ ?>
          @endforeach
        </tbody>
      </table>
    </div><!-- /.col -->
  </div><!-- /.row -->


  <div class="row">
    <div class="col-xs-6">
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th style="width:50%">Sisa Borongan:</th>
            <td><label>Rp.</label>{{number_format($sisa['sb']).""}}</td>
          </tr>
        </table>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">
      <a href="/viewprint_spkpb/{{$data['id_spkpb']}}" id="print" target="_blank" class="btn btn-info pull-right"><i class="fa fa-print pull-right"></i> Print</a>
    </div>
  </div>
</section><!-- /.content -->

<!-- Main content -->
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-chain"></i> Quality Control
      </h2>
    </div><!-- /.col -->
  </div>

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal & Waktu</th>
            <th>Jenis Pekerjaan</th>
            <th>Keterangan</th>
            <th>Tanggal Selesai</th>
            <th>Persentase</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$idqc->id_qcpb}}</td>
            <td>{{$idqc->tgl_progress}}</td>
            <td>{{$idqc->jenis_pekerjaan}}</td>
            <td>{{$idqc->keterangan}}</td>
            <td>{{$idqc->tgl_selesai}}</td>
            <td>{{$idqc->persentase}}</td>
          </tr>
        </tbody>
      </table>
    </div><!-- /.col -->
  </div><!-- /.row -->

</section><!-- /.content -->

<section class="content-header">

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

        <form id="selesaiForm" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" id="tgl_selesai" name="tgl_selesai" class="ferry ferry-from" required="required">

                <input type="hidden" id="id_qcpb" name="id_qcpb" class="ferry ferry-from" required="required" value="{{$idqc->id_qcpb}}" readonly>
              </div>
            </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <input type="submit" class="btn btn-success" Value="Submit">
              {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button> --}}
            </div>
          </div>
        </form>
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
    </div>
    <div class="row no-print">
      <div class="col-xs-12">
        <a href="" class="btn btn-info pull-right" data-toggle="modal" data-target="#tanggalModal"><i class="glyphicon glyphicon-ok"></i> Selesai</a>
      </div>
    </div>
      </section>

@stop

@section('js')
<script>
$(document).ready(function(){
  $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
                        var sisabaru;
                        var cek = false;
                        $("#jumlah_kasbon").keyup(function(){
                          kasbon = $(this).val()
                          borongan = $('#harga_borongan_kasbon').val()
                          if(sisabaru == null){
                            sisabaru = $('#sisa').val()
                          }
                          if($("#sisa").val() == '' && cek == false)
                          {
                            cek = true
                          }

                          if(cek == true){
                            $("#sisa").val(borongan-kasbon)
                          }
                          else{
                            sisa = sisabaru - kasbon
                            $("#sisa").val(sisa)
                          }

                        });

                  $(".numonly").keydown(function (e) {
                    // Allow: backspace, delete, tab, escape, enter and .
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                         // Allow: Ctrl/cmd+A
                        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                         // Allow: Ctrl/cmd+C
                        (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                         // Allow: Ctrl/cmd+X
                        (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                         // Allow: home, end, left, right
                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                             // let it happen, don't do anything
                             return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
});
var id =$('idqc_upt').val()
$('#updateqc').attr('action', `/qcpb/${id}`);
$('#selesaiForm').attr('action', `/qcpb_done/${id}`);
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
