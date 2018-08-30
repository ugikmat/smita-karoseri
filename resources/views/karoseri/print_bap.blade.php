@extends('adminlte::page')

@section('title', 'BAP')

@section('content_header')
    <h1>Berita Acara Penyelesaian</h1>

@stop

@section('content')

<!-- Main content -->
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-truck"></i> Berita Acara Penyelesaian
      </h2>
    </div><!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">

      <address>
        Nama Pemborong&emsp;&emsp;:<strong>{{$data['nm_pb']}}</strong><br>
        Jabatan Pemborong&emsp;:<strong>{{$data['jenis_pb']}}</strong><br>
        Nama SPV&emsp;&emsp;&emsp;&emsp;&emsp;:<strong>{{$data['nm_spv']}}</strong><br>
        Jabatan&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:<strong><label>SPV</label></strong><br>
      </address>
    </div><!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b>No SPKPB {{$data['id_spkpb']}}/SPKPB/{{$rom}}/{{$tahun}}</b><br>
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
            <th>Harga Borongan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$data['jenis_karoseri']}}</td>
            <td>{{$data['ukuran_karoseri']}}<label>mm</label></td>
            <td><label>Rp.</label>{{number_format($data['harga_borongan']).""}}</td>
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
              <h4 class="modal-title" id="myModalLabel">Tambah Tanggal BAP</h4>
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

        <form id="edit" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">
          @csrf
          @method('put')
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" id="tanggal_print" name="tanggal_print" class="ferry ferry-from" required="required">
                <input type="hidden" id="status_print" name="status_print" value="SUDAH PRINT">
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
$('#edit').attr('action', `/bap/{{$data['id_spkpb']}}`);
</script>
@stop
