@extends('adminlte::page')

@section('title', 'SPKPB')

@section('content_header')
    <h1>SPK Pemborong</h1>

@stop

@section('content')

<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-truck"></i> Karoseri</a></li>
  <li class="active">SPK Pemborong</li>
</ol>

<!-- Modal Tambah -->
<section class="content-header">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah</button>
      <div class="modal fade bs-example-modal-lg" id='tambahModal' tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Tambah SPKPB</h4>
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

        <form  method="post" data-parsley-validate class="form-horizontal form-label-left" action="/spkpb">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" name="tgl_spkpb" class="ferry ferry-from" required="required">
              </div>
            </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pemborong <span class="required"></span>
            </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="pemborong" name="pemborong" class="form-control" required>
                            <option selected disabled value="">Pilih Pemborong</option>
                            @foreach ($pemborongarray as $pb)
                              <option value="{{$pb->id_pb}}" name="{{$pb->id_pb}}">{{$pb->nm_pb}}</option>
                            @endforeach
                          </select>
                      </select>
                    </div>
                  </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan<span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="jabatan" required="required" name="jabatan" class="form-control col-md-7 col-xs-12"  readonly>
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="first-name">Harga Borongan<span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" autocomplete="off" id="harga_borongan" required="required" name="harga_borongan" class="form-control col-md-7 col-xs-12 numonly" >
                  </div>
              </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SPKC No <span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="spkc" name="spkc" class="form-control" required>
                              <option selected disabled value="">Pilih No SPKC</option>
                              @foreach ($spkcarray as $sk)
                              <?php
                              $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                              $tanggal = $sk->tanggal;
                              $tahun = date('Y', strtotime($tanggal));
                              $bulan = date('m', strtotime($tanggal));
                              $tgl = date('d', strtotime($tanggal));

                              $rom = $blnromawi[$bulan-1]; ?>
                                <option value="{{$sk->id_spkc}}" name="{{$sk->id_spkc}}">{{$sk->id_spkc}}/SPK/{{$rom}}/{{$tahun}}</option>
                              @endforeach
                            </select>
                        </select>
                      </div>
                    </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jenis Karoseri <span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="jenis_karoseri" required="required" name="jenis_karoseri" class="form-control col-md-7 col-xs-12"  readonly>
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ukuran ( P x L x T ) <span class="required"></span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="ukuran_karoseri" required="required" name="ukuran_karoseri" class="form-control col-md-7 col-xs-12"  >
                    </div>
              </div>

          <!--<div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Permintaan Bahan Baku No. <span class="required"></span>
            </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="pbb" name="pbb" class="form-control" required>
                            <option selected disabled value="">Pilih No PBB</option>
                            @foreach ($pbbarray as $pbb)
                            <?php
                            /*$blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                            $tanggal = $pbb->tgl_pbb;
                            $tahun = date('Y', strtotime($tanggal));
                            $bulan = date('m', strtotime($tanggal));
                            $tgl = date('d', strtotime($tanggal));

                            $rom = $blnromawi[$bulan-1]; */?>
                              <option value="{{$pbb->id_pbb}}" name="{{$pbb->id_pbb}}">{{$pbb->id_pbb}}/PBB/{{$rom}}/{{$tahun}}</option>
                            @endforeach
                          </select>
                      </select>
                    </div>
                  </div>-->

          <!-- textarea -->
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan<span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                 <textarea id="keterangan_spkpb" name="keterangan_spkpb" rows="10" cols="80"></textarea>
              </div>
            </div>


          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button class="btn btn-primary" type="reset">Reset</button>
              <input type="submit" class="btn btn-success" Value="Tambah">
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
<!-- Modal Tambah -->

<section class="content-header">
      <div class="modal fade bs-example-modal-lg" id='tanggalModal' tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Tanggal Mulai Pekerjaan Pemborong</h4>
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

        <form method="post" data-parsley-validate class="form-horizontal form-label-left" action="/qcpb">
          @csrf

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" id="tgl_pengerjaan" name="tgl_pengerjaan" class="ferry ferry-from" required="required">
                <input type="hidden" id="spkpb_qc" name="spkpb_qc" class="form-control" required="required" readonly>
                <input type="hidden" id="spkpb_nama" name="spkpb_nama" class="form-control" required="required" readonly>
                <input type="hidden" id="spkpb_jenis" name="spkpb_jenis" class="form-control" required="required" readonly>
              </div>
            </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <input type="submit" class="btn btn-success" Value="Create QC">
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

<!-- DataTable -->
  <div class="box-header">
  </div><!-- /.box-header -->
  <div class="box-body">
    <table id="spkpb-table" class="table table-bordered table-striped">
      <thead>
    <tr>
        <th>No Dokumen SPKPB</th>
        <th>No Dokumen SPKC</th><!-- /.sebagai ID -->
        <th>Tanggal</th>
        <th>Nama Pemborong</th>
        <th>Harga Borongan</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
</table>
<!-- DataTable -->


<!--Modal Edit-->
<section class="content-header">
  <div class="modal fade bs-example-modal-lg" id='editModal' data-target="#modal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Edit SPKB</h4>
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
          <div class="form-group tgl_spkpb">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" id="tgl_upt" name="tgl_upt" class="ferry ferry-from" required="required">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pemborong <span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="pemborong_upt" name="pemborong_upt" class="form-control" required>
                              <option selected disabled value="">Pilih Pemborong</option>
                              @foreach ($pemborongarray as $pb)
                                <option value="{{$pb->id_pb}}" name="{{$pb->id_pb}}">{{$pb->nm_pb}}</option>
                              @endforeach
                            </select>
                        </select>
                      </div>
                    </div>

          <div class="form-group jabatan">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan<span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="jabatan_upt" required="required" name="jabatan_upt" class="form-control col-md-7 col-xs-12" >
                </div>
            </div>

            <div class="form-group harga">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Borongan<span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="harga_borongan_upt" required="required" name="harga_borongan_upt" class="form-control col-md-7 col-xs-12" >
                  </div>
              </div>

              <div class="form-group nospkc">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SPKC No <span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="spkc_upt" name="spkc_upt" class="form-control" required>
                                <option selected disabled value="">Pilih No SPKC</option>
                                @foreach ($spkcarray as $sk)
                                <?php
                                $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                                $tanggal = $sk->tanggal;
                                $tahun = date('Y', strtotime($tanggal));
                                $bulan = date('m', strtotime($tanggal));
                                $tgl = date('d', strtotime($tanggal));

                                $rom = $blnromawi[$bulan-1]; ?>
                                  <option value="{{$sk->id_spkc}}" name="{{$sk->id_spkc}}">{{$sk->id_spkc}}/SPK/{{$rom}}/{{$tahun}}</option>
                                @endforeach
                              </select>
                        </div>
                      </div>

              <div class="form-group jenis">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jenis Karoseri <span class="required"></span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="jenis_karoseri_upt" required="required" name="jenis_karoseri_upt" class="form-control col-md-7 col-xs-12"  readonly>
                    </div>
              </div>

              <div class="form-group ukuran">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ukuran ( P x L x T ) <span class="required"></span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="ukuran_karoseri_upt" required="required" name="ukuran_karoseri_upt" class="form-control col-md-7 col-xs-12"  >
                    </div>
              </div>

            <!--  <div class="form-group nopbb">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Permintaan Bahan Baku No. <span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="pbb_upt" name="pbb_upt" class="form-control" required>
                                <option selected disabled value="">Pilih No PBB</option>
                                @foreach ($pbbarray as $pbb)
                                <?php
                                /*$blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                                $tanggal = $pbb->tgl_pbb;
                                $tahun = date('Y', strtotime($tanggal));
                                $bulan = date('m', strtotime($tanggal));
                                $tgl = date('d', strtotime($tanggal));

                                $rom = $blnromawi[$bulan-1]; */?>
                                  <option value="{{$pbb->id_pbb}}" name="{{$pbb->id_pbb}}">{{$pbb->id_pbb}}/PBB/{{$rom}}/{{$tahun}}</option>
                                @endforeach
                              </select>
                          </select>
                        </div>
                      </div>-->

          <!-- textarea -->
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan <span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                 <textarea id="keterangan_upt" name="keterangan_upt" rows="10" cols="80" ></textarea>
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


      <section class="content-header">
        <div class="modal fade bs-example-modal-lg" id='accModal' data-target="#modal2" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">ACC SPKPB</h4>
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

              <form id="accForm" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">
                @csrf
                <div class="form-group tgl_spkpbacc">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="tgl_acc" name="tgl_acc" class="ferry ferry-from" readonly>
                    </div>
                  </div>

                  <div class="form-group pemborongacc">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pemborong <span class="required"></span>
                    </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="pemborong_acc" required="required" name="pemborong_acc" class="form-control col-md-7 col-xs-12" >
                            </div>
                          </div>

                <div class="form-group jabatanacc">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan<span class="required"></span>
                    </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="jabatan_acc" required="required" name="jabatan_acc" class="form-control col-md-7 col-xs-12" >
                      </div>
                  </div>

                  <div class="form-group hargaacc">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Borongan<span class="required"></span>
                      </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="harga_borongan_acc" required="required" name="harga_borongan_acc" class="form-control col-md-7 col-xs-12" >
                        </div>
                    </div>

                    <div class="form-group nospkcacc">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SPKC No <span class="required"></span>
                      </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="spkc_acc_show" name="spkc_acc_show" class="form-control" disabled>
                              <option selected disabled value="">Pilih No SPKC</option>
                              @foreach ($spkcarray as $sk)
                              <?php
                              $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                              $tanggal = $sk->tanggal;
                              $tahun = date('Y', strtotime($tanggal));
                              $bulan = date('m', strtotime($tanggal));
                              $tgl = date('d', strtotime($tanggal));

                              $rom = $blnromawi[$bulan-1]; ?>
                                <option value="{{$sk->id_spkc}}" name="{{$sk->id_spkc}}">{{$sk->id_spkc}}/SPK/{{$rom}}/{{$tahun}}</option>
                              @endforeach
                            </select>
                                  <input type="hidden" id="spkc_acc" required="required" name="spkc_acc" class="form-control col-md-7 col-xs-12" >
                              </div>
                            </div>

                    <div class="form-group jenisacc">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jenis Karoseri <span class="required"></span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="jenis_karoseri_acc" required="required" name="jenis_karoseri_acc" class="form-control col-md-7 col-xs-12"  readonly>
                          </div>
                    </div>

                    <div class="form-group ukuranacc">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ukuran ( P x L x T ) <span class="required"></span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="ukuran_karoseri_acc" required="required" name="ukuran_karoseri_acc" class="form-control col-md-7 col-xs-12"  >
                          </div>
                    </div>

                  <!--  <div class="form-group nopbbacc">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Permintaan Bahan Baku No. <span class="required"></span>
                      </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="pbb_acc_show" name="pbb_acc_show" class="form-control" disabled>
                              <option selected disabled value="">Pilih No PBB</option>
                              @foreach ($pbbarray as $pbb)
                              <?php
                              /*$blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                              $tanggal = $pbb->tgl_pbb;
                              $tahun = date('Y', strtotime($tanggal));
                              $bulan = date('m', strtotime($tanggal));
                              $tgl = date('d', strtotime($tanggal));

                              $rom = $blnromawi[$bulan-1]; */?>
                                <option value="{{$pbb->id_pbb}}" name="{{$pbb->id_pbb}}">{{$pbb->id_pbb}}/PBB/{{$rom}}/{{$tahun}}</option>
                              @endforeach
                            </select>
                                  <input type="hidden" id="pbb_acc" required="required" name="pbb_acc" class="form-control col-md-7 col-xs-12"  >
                              </div>
                            </div>-->

                <!-- textarea -->
                <div class="form-group keteranganacc">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan <span class="required"></span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                       <textarea id="keterangan_acc" name="keterangan_acc" rows="10" cols="80" class="form-control" readonly></textarea>
                    </div>
                  </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <input type="submit" class="btn btn-success pull-right" Value="Terima">
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

            <section class="content-header">
                  <div class="modal fade bs-example-modal-lg" id='kasbonModal' tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Tambah Kasbon Pemborong</h4>
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
                            <input type="date" id="tgl_kasbon" name="tgl_kasbon" class="ferry ferry-from">
                          </div>
                        </div>

                        <div class="form-group spkpbkasbon">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. SPK Pemborong <span class="required"></span>
                          </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="spkpb_kasbon" name="spkpb_kasbon" class="form-control" disabled>
                                  @foreach ($spkpbarray as $skb)
                                  <?php
                                  $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                                  $tanggal = $skb->tgl_spkpb;
                                  $tahun = date('Y', strtotime($tanggal));
                                  $bulan = date('m', strtotime($tanggal));
                                  $tgl = date('d', strtotime($tanggal));

                                  $rom = $blnromawi[$bulan-1]; ?>
                                    <option value="{{$skb->id_spkpb}}" name="{{$skb->id_spkpb}}">{{$skb->id_spkpb}}/SPKPB/{{$rom}}/{{$tahun}}</option>
                                  @endforeach
                                </select>
                                <input type="hidden" name="spkpb_kasbon_value" id="spkpb_kasbon_value">
                            </div>
                        </div>

                        <div class="form-group pemborongkasbon">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pemborong<span class="required"></span>
                          </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" required="required" name="deskripsikegiatan" class="form-control col-md-7 col-xs-12"  readonly>
                            </div>
                        </div>

                      <div class="form-group jabatankasbon">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan<span class="required"></span>
                          </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" name="deskripsikegiatan" class="form-control col-md-7 col-xs-12"  readonly>
                            </div>
                        </div>

                        <div class="form-group hargaborongankasbon">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Borongan<span class="required"></span>
                            </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="harga_borongan_kasbon" required="required" name="harga_borongan_kasbon" class="form-control col-md-7 col-xs-12"  readonly>
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
                                  <input type="text" id="jumlah_kasbon" required="required" name="jumlah_kasbon" class="form-control col-md-7 col-xs-12" >
                                </div>
                          </div>

                          <div class="form-group sisakasbon">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Sisa Borongan<span class="required"></span>
                              </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="sisa" required="required" name="sisa" class="form-control col-md-7 col-xs-12"  readonly>
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
          <h4 class="modal-title">Hapus Dokumen Ini?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <input type="submit" class="btn btn-danger delete-user" value="Ya">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
  </div>
</div>
@stop

@section('js')


<script>
CKEDITOR.replace( 'keterangan_spkpb' );
CKEDITOR.replace( 'keterangan_upt' );

CKEDITOR.replace( 'keterangan_acc' );

$(document).ready(function(){
  $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
                $("#pemborong").change(function(){
                  id = $(this).val()
                  $.ajax({

                                url: '/getDataPemborong',
                                data: 'id=' + id,
                                type: 'POST',
                                success: function(response){
                                    $('#jabatan').val(response['jenis_pb'])

                                }
                            })
                  });
                  $("#spkc").change(function(){
                    id = $(this).val()
                    $.ajax({

                                  url: '/getDataSpkc',
                                  data: 'id=' + id,
                                  type: 'POST',
                                  success: function(response){
                                      $('#jenis_karoseri').val(response['jenis_karoseri'])

                                  }
                              })
                    });
                    $("#pemborong_upt").change(function(){
                      id = $(this).val()
                      $.ajax({

                                    url: '/getDataPemborong',
                                    data: 'id=' + id,
                                    type: 'POST',
                                    success: function(response){
                                        $('#jabatan_upt').val(response['jenis_pb'])

                                    }
                                })
                      });
                      $("#spkc_upt").change(function(){
                        id = $(this).val()
                        $.ajax({

                                      url: '/getDataSpkc',
                                      data: 'id=' + id,
                                      type: 'POST',
                                      success: function(response){
                                          $('#jenis_karoseri_upt').val(response['jenis_karoseri'])

                                      }
                                  })
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

    $(function () {
        $('#spkpb-table').DataTable({
            serverSide: true,
            processing: true,
            ordering: false,
            searching: false,
            ajax: '/karoseri-spkpb',
            columns: [
                {data: 'id_spkpb'},
                {data: 'id_spkc'},
                {data: 'tgl_spkpb'},
                {data: 'nm_pb'},
                {data: 'harga_borongan'},
                {data: 'status_spkpb'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });

    $('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')// Extract info from data-* attributes
    var namapb = button.data('namapb')
    var jabatan = button.data('jabatan')
    var harga = button.data('harga')
    var idspkc = button.data('idspkc')
    var jenis = button.data('jenis')
    var ukuran = button.data('ukuran')
    var idpbb = button.data('idpbb')
    var tanggal = button.data('tanggal')
    var keterangan = button.data('keterangan')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    $('#pemborong_upt').val(namapb)
    $('#spkc_upt').val(idspkc)
    $('#pbb_upt').val(idpbb)
    //$('#cara_bayar_upt').val(carabayar)
    $('#editForm').attr('action', `/spkpb/${id}`);
    //$('#setuju').attr('href', `/permintaan/${id}`);
    modal.find('.modal-body .jabatan input').val(jabatan)
    modal.find('.modal-body .harga input').val(harga)
    modal.find('.modal-body .jenis input').val(jenis)
    modal.find('.modal-body .ukuran input').val(ukuran)
    modal.find('.modal-body .tgl_spkpb input').val(tanggal)
    CKEDITOR.instances.keterangan_upt.setData(keterangan,function()  {
      this.checkDirty();
    });
    })

    $('#accModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')// Extract info from data-* attributes
    var namapb = button.data('namapb')
    var jabatan = button.data('jabatan')
    var harga = button.data('harga')
    var idspkc = button.data('idspkc')
    var jenis = button.data('jenis')
    var ukuran = button.data('ukuran')
    var idpbb = button.data('idpbb')
    var tanggal = button.data('tanggal')
    var keterangan = button.data('keterangan')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    //$('#cara_bayar_upt').val(carabayar)
    $('#spkc_acc_show').val(idspkc)
    $('#pbb_acc_show').val(idpbb)
    $('#accForm').attr('action', `/acc/${id}`);
    //$('#setuju').attr('href', `/permintaan/${id}`);
    modal.find('.modal-body .jabatanacc input').val(jabatan)
    modal.find('.modal-body .hargaacc input').val(harga)
    modal.find('.modal-body .jenisacc input').val(jenis)
    modal.find('.modal-body .ukuranacc input').val(ukuran)
    modal.find('.modal-body .tgl_spkpbacc input').val(tanggal)
    modal.find('.modal-body .pemborongacc input').val(namapb)
    modal.find('.modal-body .nospkcacc input').val(idspkc)
    modal.find('.modal-body .nopbbacc input').val(idpbb)
    modal.find('.modal-body .keteranganacc textarea').val(keterangan)

    CKEDITOR.instances.keterangan_acc.setData(keterangan,function()  {
      this.checkDirty();
    });
    })


    $('#kasbonModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')// Extract info from data-* attributes
    var namapb = button.data('namapb')
    var jabatan = button.data('jabatan')
    var harga = button.data('harga')
    var idspkc = button.data('idspkc')
    var jenis = button.data('jenis')
    var ukuran = button.data('ukuran')
    var idpbb = button.data('idpbb')
    var tanggal = button.data('tanggal')
    var sisa = button.data('sisa')

    $('#spkpb_kasbon').val(id)
    var modal = $(this)
    //$('#cara_bayar_upt').val(carabayar)
    $('#kasbonForm').attr('action', `/kasbon/${id}`);
    //$('#setuju').attr('href', `/permintaan/${id}`);
    modal.find('.modal-body .spkpbkasbon input').val(id)
    modal.find('.modal-body .jabatankasbon input').val(jabatan)
    modal.find('.modal-body .hargaborongankasbon input').val(harga)
    //modal.find('.modal-body .kasbon input').val(y + '-' + m + '-' + d)
    modal.find('.modal-body .pemborongkasbon input').val(namapb)
    modal.find('.modal-body .sisakasbon input').val(sisa)
    })
    //$('#printspkpb').attr('href', `/printspkpb/`+id);

    $('#tanggalModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')// Extract info from data-* attributes
    var namapb = button.data('namapb')
    var jabatan = button.data('jabatan')
    var harga = button.data('harga')
    var idspkc = button.data('idspkc')
    var jenis = button.data('jenis')
    var ukuran = button.data('ukuran')
    var idpbb = button.data('idpbb')
    var tanggal = button.data('tanggal')
    var sisa = button.data('sisa')

    $('#spkpb_qc').val(id)
    $('#spkpb_nama').val(namapb)
    $('#spkpb_jenis').val(jabatan)
    var modal = $(this)
    //$('#cara_bayar_upt').val(carabayar)
    //$('#tanggalForm').attr('action', `/kasbon/${id}`);
    //$('#setuju').attr('href', `/permintaan/${id}`);
    modal.find('.modal-body .spkpbkasbon input').val(id)
    modal.find('.modal-body .jabatankasbon input').val(jabatan)
    modal.find('.modal-body .hargaborongankasbon input').val(harga)
    //modal.find('.modal-body .kasbon input').val(y + '-' + m + '-' + d)
    modal.find('.modal-body .pemborongkasbon input').val(namapb)
    modal.find('.modal-body .sisakasbon input').val(sisa)
    })

    $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')// Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#deleteForm').attr('action', `/spkpb/${id}`);
    })
</script>
@stop
