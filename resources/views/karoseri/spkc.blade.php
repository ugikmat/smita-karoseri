@extends('adminlte::page')

@section('title', 'SPKC')

@section('content_header')
    <h1>Surat Pemesanan Kendaraan Customer</h1>

@stop

@section('content')

<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-truck"></i> Karoseri</a></li>
  <li class="active">SPKC</li>
</ol>

<!-- Modal Tambah -->
<section class="content-header">
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">Tambah</button>-->
      <div class="modal fade bs-example-modal-lg" id='modal1' tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Tambah SPKC</h4>
            </div>
            <div class="modal-body">
               <div class="clearfix"></div>

<!--<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />

        <form id="simpan-kegiatan" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kode Permintaan Karoseri <span class="required">*</span>
              </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="kodebar" name="kodebarang" required="required" class="form-control col-md-7 col-xs-12" onKeyPress="return kodeScript(event,'ANG01234567890',this)">
                  </div>
										<button class="btn btn-info" id="carilah">Cari</button>
					  </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Customer <span class="required">*</span>
                </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="kodebar" name="kodebarang" required="required" class="form-control col-md-7 col-xs-12" onKeyPress="return kodeScript(event,'ANG01234567890',this)"disabled>
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
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>-->
        </div>
      </div>
      </section>
<!-- Modal Tambah -->

<!-- DataTable -->
  <div class="box-header">
  </div><!-- /.box-header -->
  <div class="box-body">
    <table id="spkc-table" class="table table-bordered table-striped table-responsive">
      <thead>
    <tr>
        <th>No SPKC</th><!-- /.sebagai ID -->
        <th>Nama Customer</th>
        <th>Tanggal</th>
        <th>Status Dokumen</th>
        <th>Work Order</th>
        <th>Action</th>
    </tr>
    </thead>
    <tfoot>
  <tr>
      <th>No SPKC</th><!-- /.sebagai ID -->
      <th>Nama Customer</th>
      <th>Tanggal</th>
      <th>Status Dokumen</th>
      <th>Work Order</th>
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
          <h4 class="modal-title" id="myModalLabel">Check SPKC</h4>
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
        <form action="#" class="form-horizontal form-label-left">

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
                    <textarea id="ket_acc" name="ket_acc" class="form-control" rows="3" placeholder="Keterangan ..."readonly></textarea>
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
              <a href="" id="print" type="submit" class="btn btn-primary" >PRINT</a>
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
              <div class="modal fade bs-example-modal-lg" id='createWO' data-target="#modal2" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel">Create WO</h4>
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
                    <form id="formWO" action="" class="form-horizontal form-label-left" method="post">
                      @csrf
                      @method('put')
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Supervisor<span class="required"></span>
                          </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="id_spv" required name="id_spv" class="form-control col-md-7 col-xs-12">
                                <option selected disabled value="">Pilih Supervisor</option>
                                @foreach ($supervisorarray as $data)
                                 <option value="{{$data->id_spv}}">{{$data->nm_spv}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>


                      <div class="ln_solid"></div>
                      <!-- BUAT ACC ATAU TIDAK -->
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="submit" class="btn btn-success" Value="Create WO">
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
          <h4 class="modal-title">Cancel Transaksi Ini?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <input type="submit" class="btn btn-danger delete-user" value="Cancel">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
  </div>
</div>
@stop

@section('js')
<script>
    $(function () {
        $('#spkc-table').DataTable({
            responsive: true,
            serverSide: true,
            processing: true,
            ajax: '/karoseri-spkc',
            columns: [
                {data: 'id_spkc'},
                {data: 'nm_cust'},
                {data: 'tanggal'},
                {data: 'status'},
                {data: 'statuswo'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });

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
  var berkas = button.data('berkas')
  var carabayar = button.data('carabayar')
  var alamat = button.data('alamat')
  var tanggal = button.data('tanggal')
  var status= button.data('status')
  var id = button.data('id')


  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  $('#jenis_karoseri_acc').val(jenis)
  $('#cara_bayar_acc').val(carabayar)
  $('#print').attr('href', `/printKu/`+id);
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

  $('#createWO').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var name = button.data('name')// Extract info from data-*
  var id = button.data('id')


  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  //$('#setuju').attr('href', `/permintaan/${id}`);
  $('#formWO').attr('action', `/spkc/${id}`);
  modal.find('.modal-body .namacustomeracc input').val(name)
  })

  $('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')// Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  $('#deleteForm').attr('action', `/spkc/${id}`);
  })
</script>

@stop
