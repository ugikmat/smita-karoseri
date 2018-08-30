@extends('adminlte::page')

@section('title', 'Penawaran Karoseri')

@section('content_header')
    <h1>Penawaran Karoseri</h1>

@stop

@section('content')

<section class="content-header">
<a href="" class="btn btn-success" data-toggle="modal" data-target="#tambahModal"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Penawaran</a>
      <div class="modal fade bs-example-modal-lg" id='tambahModal' tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Tambah Penawaran Karoseri</h4>
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

        <form method="post" data-parsley-validate class="form-horizontal form-label-left" action="/penawaran">
          @csrf

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" id="tgl_penawaran" name="tgl_penawaran" class="ferry ferry-from" required="required">
              </div>
            </div>

            <div class="form-group spkpbkasbon">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Penawaran <span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="id_penawaran" id="id_penawaran" required="required" value="{{$idpenawaran}}" readonly>
                    <input type="hidden" name="jenis_karoseri_penawaran" id="jenis_karoseri_penawaran" Value="{{$data['jenis_karoseri']}}">
                    <input type="hidden" name="id_spkc_penawaran" id="id_spkc_penawaran" Value="{{$data['id_spkc']}}">
                    <input type="hidden" name="total_harga_penawaran" id="total_harga_penawaran" class="ht">
                </div>
            </div>

          <div class="form-group jabatankasbon">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Unit<span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" autocomplete="off" id="jumlah_unit_penawaran" required="required" name="jumlah_unit_penawaran" class="form-control col-md-7 col-xs-12 numonly sum jml"  value="">
                </div>
            </div>

            <div class="form-group hargaborongankasbon">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga/Unit<span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" autocomplete="off" id="harga_unit_penawaran" required="required" name="harga_unit_penawaran" class="form-control col-md-7 col-xs-12 numonly sum hrg"  value="">
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">PPN <span class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="id_ppn_penawaran" name="id_ppn_penawaran" class="form-control col-md-7 col-xs-12">
                                <option selected disabled value="">Pilih PPN</option>
                                @foreach ($ppnarray as $pn)
                                 <option value="{{ $pn->id_ppn }}">{{ $pn->jenis_ppn }}</option>
                                @endforeach
                            </select>
                          <label>
                            Centang box dibawah jika Field PPN diisi <br>
                            <input id="ppn_penawaran" name="ppn_penawaran" type="checkbox" class="ppn">
                            <input id="ppnh_penawaran" name="ppnh_penawaran" type="hidden" class="ppnh">
                          </label>
                      </div>
                    </div>

            <div class="form-group keterangankasbon">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Detail Spesifikasi <span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="det_spek" name="det_spek" rows="10" cols="80" ></textarea>
                  </div>
              </div>


          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <input type="submit" class="btn btn-success pull-right" Value="Buat Penawaran">
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
        <i class="fa fa-money"></i> Penawaran
      </h2>
    </div><!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">

      <address>
        No Penawaran&emsp;&emsp;&nbsp;&nbsp;&nbsp;:<strong>{{$data['id_spkc']}}</strong><br>
        Nama Customer&emsp;&emsp;:<strong>{{$data['nm_cust']}}</strong><br>
        Jabatan Customer&emsp;:<strong>{{$data['jabatan']}}</strong><br>
        Jenis Karoseri&emsp;&emsp;&nbsp;&nbsp;&nbsp;:<strong>{{$data['jenis_karoseri']}}</strong><br>
      </address>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No Penawaran</th>
            <th>Tanggal</th>
            <th>Jenis Karoseri</th>
            <th>Jumlah Unit</th>
            <th>Harga/Unit</th>
            <th>Total Harga</th>
            <th>Detail Spesifikasi</th>
          </tr>
        </thead>
        <tbody>
          <!--<tr>
            <td>{{$data['id_spkc']}}</td>
            <td>{{$data['tanggal']}}</td>
            <td>{{$data['jenis_karoseri']}}</td>
            <td>{{$data['jumlah_unit']}}</td>
            <td>{{number_format($data['harga_unit']).""}}</td>
            <td>{{number_format($data['harga_total']).""}}</td>
            <td>{!!$data['ket']!!}</td>
          </tr>-->

          @foreach($tes as $dt)
          <tr>
            <td>{{$dt['id_penawaran']}}</td>
            <td>{{$dt['tgl_penawaran']}}</td>
            <td>{{$dt['karoseri_penawaran']}}</td>
            <td>{{$dt['jml_unit_penawaran']}}</td>
            <td>{{number_format($dt['harga_unit_penawaran']).""}}</td>
            <td>{{number_format($dt['total_harga_penawaran']).""}}</td>
            <td>{{$dt['spek_penawaran']}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div><!-- /.col -->
  </div><!-- /.row -->

<!-- PRINT -->
  <section class="content-header">
  <a href="" class="btn btn-info pull-right" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-plus-sign"></i> Setujui</a>
        <div class="modal fade bs-example-modal-lg" id='editModal' tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Penyetujuan Dokumen Penawaran</h4>
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

          <form id="accForm" method="post" data-parsley-validate class="form-horizontal form-label-left" action="{{route('setuju', $data['id_spkc'])}}">
            @csrf
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Penawaran <span class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="id_penawaran_acc" id="id_penawaran_acc" required="required" value="{{$idpenawaranacc}}" readonly>
              </div>
            </div>

            <?php
            use Illuminate\Support\Facades\DB;

            $pen = DB::table('penawarans')->select('*')->where('id_penawaran', $idpenawaranacc)->first();
             ?>
            <div class="form-group ">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Unit<span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" value="{{$pen->jml_unit_penawaran}}" autocomplete="off" id="jumlah_unit_penawaran_acc" required="required" name="jumlah_unit_penawaran_acc" class="form-control col-md-7 col-xs-12"  readonly>
                  </div>
              </div>

              <div class="form-group ">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga/Unit<span class="required"></span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" value="{{$pen->harga_unit_penawaran}}" autocomplete="off" id="harga_unit_penawaran_acc" required="required" name="harga_unit_penawaran_acc" class="form-control col-md-7 col-xs-12" readonly>
                      <input type="hidden" value="{{$pen->total_harga_penawaran}}" name="total_harga_penawaran_acc" id="total_harga_penawaran_acc">
                      <input type="hidden" value="{{$pen->ppn_penawaran}}" name="ppn_penawaran_acc" id="ppn_penawaran_acc">
                    </div>
                </div>

              <div class="form-group ">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Detail Spesifikasi <span class="required"></span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="det_spek_acc" name="det_spek_acc" rows="10" cols="80" readonly>{!!$pen->spek_penawaran!!}</textarea>
                    </div>
                </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <input type="submit" class="btn btn-success pull-right" Value="Setujui">
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
<!-- PRINT -->
</section><!-- TABLES -->
@stop

@section('js')
<script>

$(document).ready(function(){
  $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
                        $("#harga_unit_penawaran").keyup(function(){
                          harga = $(this).val()
                          jumlah = $('#jumlah_unit_penawaran').val()

                          total = harga * jumlah

                          $('#total_harga_penawaran').val(total)

                        });

                        $(".sum").keyup(function(){
                          unit = $('.jml').val()
                          harga = $('.hrg').val()
                          noppn = $('.ppnh').val(0)

                          hasil = unit * harga
                          $(".ht").val(hasil)
                        });

                        $(".ppn").click(function(){

                          tot = parseInt($('.ht').val())
                          v = $('.jml').val()
                          w = $('.hrg').val()
                          x = w * 0.1

                          ppn10 = (tot * 0.1)
                          ppn11 = (tot * 10)
                          ppn = (tot * 0.1) + tot
                          noppn = tot - (v * x)

                          if($(this).is(':checked')){
                          $(".ht").val(ppn)
                          $(".ppnh").val(ppn10)
                          }
                          else{
                          $(".ht").val(noppn)
                          $(".ppnh").val(0)
                          }

                        })

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


  CKEDITOR.replace('det_spek');

  $('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var name = button.data('name')// Extract info from data-* attributes
  var namep = button.data('nameperusahaan')
  var jabatan = button.data('jabatan')
  var jenis = button.data('jenis')
  var unit = button.data('unit')
  var harga = button.data('harga')
  var total = button.data('total')
  var ket = button.data('ket')
  var carabayar = button.data('carabayar')
  var alamat = button.data('alamat')
  var berkas = button.data('berkas')
  var tanggal = button.data('tanggal')
  var status= button.data('status')
  var id = button.data('id')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  //$('#accForm').attr('action', `/accept/${id}`);
  })


</script>
@stop
