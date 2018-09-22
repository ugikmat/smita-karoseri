@extends('adminlte::page')

@section('title', 'Surat Jalan')

@section('content_header')
    <h1>SURAT JALAN</h1>

@stop

@section('content')

<!-- Main content -->
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-truck"></i> SURAT JALAN
      </h2>
    </div><!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">

      <address>
        Kode Produksi&emsp;&emsp;&emsp;:<strong>{{$data['kode_produksi']}}</strong><br>
        Nama Customer&emsp;&emsp;:<strong>{{$data['nm_cust']}}</strong><br>
        Nama Perusahaan&emsp;:<strong>{{$data['nm_perusahaan']}}</strong><br>
        Alamat&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:<strong>{{$data['alamat_cust']}}</strong><br>
      </address>
    </div><!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b>{{$data['id_spkc']}}/SPKC/{{$rom}}/{{$tahun}}</b><br>
      <br>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Karoseri</th>
            <th>Ukuran</th>
            <th>Detail Spesifikasi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$data['jenis_karoseri']}}</td>
            <td>{{$data['ukuran_karoseri']}}<label>mm</label></td>
            <td>{!!$data['ket']!!}</td>
          </tr>
        </tbody>
      </table>
    </div><!-- /.col -->
  </div><!-- /.row -->

</section><!-- /.content -->

<section class="content-header">
<a href="" class="btn btn-info pull-right" data-toggle="modal" data-target="#tambahModal"><i class="glyphicon glyphicon-print"></i> Print</a>
      <div class="modal fade bs-example-modal-lg" id='tambahModal' tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Tambah Tanggal Surat Jalan</h4>
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

        <form method="post" data-parsley-validate class="form-horizontal form-label-left" action="/surat_jalan">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" id="tanggal_kirim" name="tanggal_kirim" class="ferry ferry-from" required="required">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pengiriman<span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="nm_sopir" autocomplete="off" required="required" name="nm_sopir" class="form-control col-md-7 col-xs-12">
                      <input type="hidden" id="id_produksi" value="{{$data['kode_produksi']}}" required="required" name="id_produksi" class="form-control col-md-7 col-xs-12">
                      <input type="hidden" id="id_spkc" value="{{$data['id_spkc']}}" required="required" name="id_spkc" class="form-control col-md-7 col-xs-12">

                  </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan <span class="required"></span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <textarea id="catatan" name="catatan" rows="10" cols="80"></textarea>
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
<script>
CKEDITOR.replace('catatan');
</script>
@stop
