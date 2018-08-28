@extends('adminlte::page')

@section('title', 'Kasbon')

@section('content_header')
    <h1>Kasbon Pemborong</h1>

@stop

@section('content')

<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-truck"></i> Karoseri</a></li>
  <li class="active">Kasbon Pemborong</li>
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
              <h4 class="modal-title" id="myModalLabel">Tambah Kasbonn Pemborong</h4>
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

        <form id="simpan-kegiatan" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" name="tgl" class="ferry ferry-from">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. SPK Pemborong <span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" class="form-control" required>
                              <option selected disabled value="1">Pilih No.SPKPB</option>
                              <option value="1">1/SPKPB/VII/2018</option>
                              <option value="2">1/SPKPB/VII/2018</option>
                            </select>
                        </select>
                      </div>
                    </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pemborong<span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" required="required" name="deskripsikegiatan" class="form-control col-md-7 col-xs-12" onKeyPress="return kodeScript(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" readonly>
                </div>
            </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat<span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" required="required" name="deskripsikegiatan" class="form-control col-md-7 col-xs-12" onKeyPress="return kodeScript(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" readonly>
                </div>
            </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan<span class="required"></span>
              </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" name="deskripsikegiatan" class="form-control col-md-7 col-xs-12" onKeyPress="return kodeScript(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" readonly>
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Borongan<span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" required="required" name="deskripsikegiatan" class="form-control col-md-7 col-xs-12" onKeyPress="return kodeScript(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" readonly>
                  </div>
              </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Keterangan <span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="last-name" required="required" name="penanggungjawab" class="form-control col-md-7 col-xs-12" onKeyPress="return kodeScript(event,'0123456789',this)">
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kas Bon <span class="required"></span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" required="required" name="penanggungjawab" class="form-control col-md-7 col-xs-12" onKeyPress="return kodeScript(event,'0123456789',this)">
                    </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Sisa Borongan<span class="required"></span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" required="required" name="penanggungjawab" class="form-control col-md-7 col-xs-12" onKeyPress="return kodeScript(event,'0123456789',this)" readonly>
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
<!-- Modal Tambah -->

<!-- DataTable -->
  <div class="box-header">
  <div class="box-body">
    <table id="kasbon-table" class="table table-bordered table-striped">
      <thead>
    <tr>
        <th>No Dokumen Kasbon</th>
        <th>No Dokumen SPKPB</th>
        <th>Tanggal</th>
        <th>Nama Pemborong</th>
        <th>Keterangan</th>
        <th>Kasbon</th>
        <th>Sisa Borongan</th>
    </tr>
    </thead>
</table>
</div>
</div><!-- /.box-header -->
<!-- DataTable -->

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
        $('#kasbon-table').DataTable({
            serverSide: true,
            processing: true,
            ordering: false,
            ajax: '/karoseri-kasbon',
            columns: [
                {data: 'id_kasbon'},
                {data: 'id_spkpb'},
                {data: 'tgl_kasbon'},
                {data: 'nm_pb'},
                {data: 'nm_kasbon'},
                {data: 'jumlah_kasbon'},
                {data: 'sisa_borongan'}
            ]
        });
    });
</script>
@stop
