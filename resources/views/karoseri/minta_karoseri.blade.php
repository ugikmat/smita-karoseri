@extends('adminlte::page')

@section('title', 'Penawaran')

@section('content_header')
    <h1>Penawaran Karoseri</h1>

@stop

@section('content')

<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-truck"></i> Karoseri</a></li>
  <li class="active">Penawaran Karoseri</li>
</ol>

<!-- Modal Tambah -->
<section class="content-header">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">Buat Penawaran Baru</button>

      <div class="modal fade bs-example-modal-lg" id='modal1' tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Tambah Penawaran</h4>
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

        <form method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" action="/permintaan">
          @csrf

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="tanggal" name="tanggal" type="date" class="ferry ferry-from">
              </div>
            </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Customer <span class="required"></span>
            </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="id_cust" required name="id_cust" class="form-control col-md-7 col-xs-12">
                            <option selected disabled value="">Pilih Customer</option>
                            @foreach ($customerarray as $data)
                             <option value="{{ $data->id_cust }}">{{ $data->nm_cust }}</option>
                            @endforeach
                          </select>
                      </select>
                    </div>
                  </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Perusahaan<span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="nm_perusahaan" required="required" name="nm_perusahaan" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="alamat_cust" class="form-control col-md-7 col-xs-12" name="alamat_cust" type="text" readonly>
              </div>
            </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan<span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="jabatan" required="required" name="jabatan" class="form-control col-md-7 col-xs-12" readonly>
                </div>
            </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Karoseri <span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="jenis_karoseri"  name="jenis_karoseri" class="form-control col-md-7 col-xs-12" required>
                        <option selected disabled value="">Pilih Jenis Karoseri</option>
                        <option value="Wings Box">Wings Box</option>
                        <option value="Fix Side">Fix Side</option>
                        <option value="Flat Deck">Flat Deck</option>
                        <option value="Molen">Molen</option>
                        <option value="Pengaman Tracktor Head">Pengaman Tracktor Head</option>
                        <option value="Self Loader">Self Loader</option>
                        <option value="Trailler">Trailler</option>
                      </select>
                    </div>
                  </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jumlah Unit <span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="number" id="jumlah_unit" required="required" name="jumlah_unit" class="form-control col-md-7 col-xs-12 numonly sum jml">
                </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga/unit <span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="harga_unit" required="required" name="harga_unit" class="form-control col-md-7 col-xs-12 numonly sum hrg">
                </div>
            </div>

            <!-- checkbox -->
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">PPN <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="id_ppn" name="id_ppn" class="form-control col-md-7 col-xs-12">
                              <option selected disabled value="">Pilih PPN</option>
                              @foreach ($ppnarray as $data)
                               <option value="{{ $data->id_ppn }}">{{ $data->jenis_ppn }}</option>
                              @endforeach
                          </select>
                        <label>
                          Centang box dibawah jika Field PPN diisi <br>
                          <input id="ppn" name="ppn" type="checkbox" class="ppn">
                          <input id="ppnh" name="ppnh" type="hidden" class="ppnh">
                        </label>
                    </div>
                  </div>
            <!-- checkbox -->

            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Harga Total <span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="harga_total" class="form-control col-md-7 col-xs-12 ht" name="harga_total" type="text" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cara Pembayaran <span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="cara_bayar" required name="cara_bayar" class="form-control col-md-7 col-xs-12">
                      <option selected disabled value="">Pilih Cara Pembayaran</option>
                      @foreach ($carabayararray as $data)
                       <option value="{{$data->id}}">{{$data->keterangan}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

            <!-- textarea -->
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Detail Spesifikasi <span class="required"></span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="ket" name="ket" class="form-control" rows="3" placeholder="Keterangan ..."></textarea>
                </div>
              </div>



          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload File <span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="file" name="file" type="file" required>
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
<!-- Modal Tambah -->

<!-- DataTable -->
  <div class="box-header">
  </div><!-- /.box-header -->
  <div class="box-body">
    <table id="minta-table" class="table table-bordered table-striped">
      <thead>
    <tr>
        <th>No ID</th><!-- /.sebagai ID -->
        <th>Nama Customer</th>
        <th>Tanggal Penawaran</th>
        <th>Dokumen</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tfoot>
  <tr>
      <th>No ID</th><!-- /.sebagai ID -->
      <th>Nama Customer</th>
      <th>Tanggal Penawaran</th>
      <th>Dokumen</th>
      <th>Status</th>
      <th>Action</th>
  </tr>
</tfoot>
</table>
<!-- DataTable -->


<!--Modal Edit-->
<!-- modals -->
<section class="content-header">
  <div class="modal fade bs-example-modal-lg" id='editModal' data-target="#modal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Edit Penawaran</h4>
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
          <div class="form-group tanggal">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="tanggal_upt" name="tanggal_upt" type="date" class="ferry ferry-from" required>
              </div>
            </div>

          <div class="form-group namacustomer">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Customer <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="nm_cust_upt" required="required" name="nm_cust_upt" class="form-control col-md-7 col-xs-12" readonly>
            </div>
                  </div>

          <div class="form-group namaperusahaan">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Perusahaan<span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="nm_perusahaan_upt" required="required" name="nm_perusahaan_upt" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group alamat">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="alamat_cust_upt" class="form-control col-md-7 col-xs-12" name="alamat_cust_upt" type="text" readonly>
              </div>
            </div>

          <div class="form-group jabatan">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan<span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="jabatan_upt" required="required" name="jabatan_upt" class="form-control col-md-7 col-xs-12" readonly>
                </div>
            </div>

          <div class="form-group jenis">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Karoseri <span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="jenis_karoseri_upt" required name="jenis_karoseri_upt" class="form-control col-md-7 col-xs-12">
                        <option disabled value="">Pilih Jenis Karoseri</option>
                        <option value="Wings Box">Wings Box</option>
                        <option value="Fix Side">Fix Side</option>
                        <option value="Flat Deck">Flat Deck</option>
                        <option value="Molen">Molen</option>
                        <option value="Pengaman Tracktor Head">Pengaman Tracktor Head</option>
                        <option value="Self Loader">Self Loader</option>
                        <option value="Trailler">Trailler</option>
                      </select>
                    </div>
                  </div>

          <div class="form-group jumlahunit">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jumlah Unit <span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="number" id="jumlah_unit_upt" required="required" name="jumlah_unit_upt" class="form-control col-md-7 col-xs-12 numonly sum jml">
                </div>
          </div>

          <div class="form-group hargaunit">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga/unit <span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="harga_unit_upt" required="required" name="harga_unit_upt" class="form-control col-md-7 col-xs-12 numonly sum hrg">
                </div>
            </div>


            <!-- checkbox
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">PPN <span class="required"></span>
                </label>
                  <div class="checkbox">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <label>
                          <input id="ppn_upt" name="ppn_upt" type="checkbox" class="ppn" value="0">
                          <input id="ppnh_upt" name="ppnh_upt" type="text" class="ppn" hidden>
                        </label>
                    </div>
                  </div>
                </div>
            checkbox -->

            <div class="form-group hargatotal">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Harga Total <span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="harga_total_upt" class="form-control col-md-7 col-xs-12 ht" name="harga_total_upt" type="text" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cara Pembayaran <span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="cara_bayar_upt" required name="cara_bayar_upt" class="form-control col-md-7 col-xs-12">
                      <option selected disabled value="">Pilih Cara Pembayaran</option>
                      @foreach ($carabayararray as $data)
                       <option value="{{$data->id}}">{{$data->keterangan}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>


            <!-- textarea -->
            <div class="form-group keterangan">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Detail Spesifikasi <span class="required"></span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="ket_upt" name="ket_upt" class="form-control" rows="3" placeholder="Keterangan ..."></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">File <span class="required"></span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="file_upt" name="file_upt" type="file">
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
</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      </section>
            <!-- modals-edit -->
<!--modal acc -->
<section class="content-header">
  <div class="modal fade bs-example-modal-lg" id='accModal' data-target="#modal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Aksi Penawaran</h4>
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
          <div class="form-group tanggalacc">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="tanggal_acc" name="tanggal_acc" type="date" class="ferry ferry-from" readonly>
              </div>
            </div>

          <div class="form-group namacustomeracc">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Customer <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="nm_cust_acc" required="required" name="nm_cust_acc" class="form-control col-md-7 col-xs-12" readonly>
            </div>
                  </div>

          <div class="form-group namaperusahaanacc">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Perusahaan<span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="nm_perusahaan_acc" required="required" name="nm_perusahaan_acc" class="form-control col-md-7 col-xs-12" readonly>
                </div>
            </div>

            <div class="form-group alamatacc">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="alamat_cust_acc" class="form-control col-md-7 col-xs-12" name="alamat_cust_acc" type="text" readonly>
              </div>
            </div>

          <div class="form-group jabatanacc">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan<span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="jabatan_acc" required="required" name="jabatan_acc" class="form-control col-md-7 col-xs-12" readonly>
                </div>
            </div>

          <div class="form-group jenisacc">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Karoseri <span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="jenis_karoseri_acc" class="form-control col-md-7 col-xs-12" name="jenis_karoseri_acc" type="text" readonly>
                    </div>
                  </div>

          <div class="form-group jumlahunitacc">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jumlah Unit <span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="number" id="jumlah_unit_acc" required="required" name="jumlah_unit_acc" class="form-control col-md-7 col-xs-12" readonly>
                </div>
          </div>

          <div class="form-group hargaunitacc">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga/unit <span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="harga_unit_acc" required="required" name="harga_unit_acc" class="form-control col-md-7 col-xs-12" readonly>
                </div>
            </div>

            <div class="form-group hargatotalacc">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Harga Total <span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="harga_total_acc" class="form-control col-md-7 col-xs-12" name="harga_total_acc" type="text" readonly>
              </div>
            </div>

            <div class="form-group carabayaracc">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cara Pembayaran <span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="cara_bayar_acc" class="form-control col-md-7 col-xs-12" name="cara_bayar_acc" type="text" readonly>
                  </div>
                </div>

            <!-- textarea -->
            <div class="form-group keteranganacc">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Detail Spesifikasi <span class="required"></span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="ket_acc" name="ket_acc" class="form-control" rows="3" placeholder="Keterangan ..." readonly></textarea>
                </div>
              </div>

              <div class="form-group berkas">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">File<span class="required"></span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="download" name="download" class="col-md-8 col-xs-12" type="text" readonly>
                      <a href="" target="_blank" id="unduh" type="submit" name="unduh" class="btn btn-warning"><i class="glyphicon glyphicon-download"></i>Unduh File</a>
                    </div>
                  </div>





          <div class="ln_solid"></div>
          <!-- BUAT ACC ATAU TIDAK -->
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tolak</button>
              <input type="submit" class="btn btn-success" Value="Setuju">
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
          <h4 class="modal-title">Apakah Anda Yakin ingin menghapus?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <input type="submit" class="btn btn-danger delete-user" value="Hapus">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
        </form>
    </div>
  </div>
</div>
@stop

@section('js')
<script>
    $(function () {
        $('#minta-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/karoseri-permintaan',
            columns: [
                {data: 'id_spkc'},
                {data: 'nm_cust'},
                {data: 'tanggal'},
                {data: 'dokumen'},
                {data: 'status'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>

<script>
$(document).ready(function(){
  $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
                $("#id_cust").change(function(){
                 id = $(this).val()
                  $.ajax({

                                url: '/getData',
                                data: 'id=' + id,
                                type: 'POST',
                                success: function(response){
                                    $('#jabatan').val(response['jabatan'])
                                    $('#alamat_cust').val(response['alamat_cust'])

                                }
                            })
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
</script>

<script>
CKEDITOR.replace( 'ket' );
CKEDITOR.replace( 'ket_upt' );

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
  var tanggal = button.data('tanggal')
  var status= button.data('status')
  var id = button.data('id')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  $('#jenis_karoseri_upt').val(jenis)
  $('#cara_bayar_upt').val(carabayar)
  $('#editForm').attr('action', `/permintaan/${id}`);
  //$('#setuju').attr('href', `/permintaan/${id}`);
  modal.find('.modal-body .namacustomer input').val(name)
  modal.find('.modal-body .namaperusahaan input').val(namep)
  modal.find('.modal-body .jabatan input').val(jabatan)
  modal.find('.modal-body .jenis input').val(jenis)
  modal.find('.modal-body .jumlahunit input').val(unit)
  modal.find('.modal-body .hargaunit input').val(harga)
  modal.find('.modal-body .hargatotal input').val(total)
  modal.find('.modal-body .keterangan textarea').val(ket)
  modal.find('.modal-body .alamat input').val(alamat)
  modal.find('.modal-body .tanggal input').val(tanggal)
  modal.find('.modal-body .status input').val(status)

    CKEDITOR.instances.ket_upt.setData(ket,function()  {
      this.checkDirty();
    });
  })

  $('#accModal').on('show.bs.modal', function (event) {
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
  $('#jenis_karoseri_acc').val(jenis)
  $('#cara_bayar_acc').val(carabayar)
  $('#accForm').attr('action', `/accept/${id}`);
  $('#unduh').attr('href', `/unduh/`+berkas);
  //$('#setuju').attr('href', `/permintaan/${id}`);
  modal.find('.modal-body .namacustomeracc input').val(name)
  modal.find('.modal-body .namaperusahaanacc input').val(namep)
  modal.find('.modal-body .jabatanacc input').val(jabatan)
  modal.find('.modal-body .jenisacc input').val(jenis)
  modal.find('.modal-body .jumlahunitacc input').val(unit)
  modal.find('.modal-body .hargaunitacc input').val(harga)
  modal.find('.modal-body .hargatotalacc input').val(total)
  modal.find('.modal-body .keteranganacc textarea').val(ket)
  modal.find('.modal-body .alamatacc input').val(alamat)
  modal.find('.modal-body .tanggalacc input').val(tanggal)
  modal.find('.modal-body .status input').val(status)
  modal.find('.modal-body .berkas input').val(berkas)
  })

  $('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')// Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  $('#deleteForm').attr('action', `/permintaan/${id}`);
  })

</script>

@stop
