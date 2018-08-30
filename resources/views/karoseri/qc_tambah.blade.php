@extends('adminlte::page')

@section('title', 'Produksi')

@section('content_header')
    <h1>Produksi</h1>

@stop

@section('content')

<!-- DataTable -->
<input type="hidden" name="idspkcget" value="{{Request()->get('idspkc')}}">
  <div class="box-header">
  </div><!-- /.box-header -->
  <div class="box-body">
    <table id="produksi-table" class="table table-bordered table-striped">
      <thead>
    <tr>
        <th>No Produksi</th><!-- /.sebagai ID -->
        <th>No Dokumen SPKC</th>
        <th>Tanggal SPKC</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
      @php
      $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
      $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
      $tanggal = $data->tanggal;
      $tahun = date('Y', strtotime($tanggal));
      $bulan = date('m', strtotime($tanggal));
      $tgl = date('d', strtotime($tanggal));

      $fix = $tgl.' '.$blnindo[$bulan-1].' '.$tahun;
      $rom = $blnromawi[$bulan-1];
      $jum = $data->jumlah_unit;

      @endphp
      @foreach($prod as $pd)
      <tr>
          <td>{{$pd['kode_produksi']}}</td>
          <td>{{$pd['id_spkc']}}/SPK/{{$rom}}/{{$tahun}}</td>
          <td>{{$fix}}</td>
          <td>{{$pd['status_produksi']}}</td>
          <td>
            <div>
              <a href="{{route('qc', [$data->id_spkc, 'num' => $pd['kode_produksi'], 'idprod' => $pd['id_produksi']])}}" class="btn btn-info" data-id="{{$pd['kode_produksi']}}" data-idspkc="{{$pd['id_spkc']}}"><i class="glyphicon glyphicon-search"></i>View</a>

            </div>
          </td>
      </tr>
      @endforeach
    </tbody>
</table>
<!-- DataTable -->
<input type="hidden" name="getid" value="{{$data->id_spkc}}">

<section class="content-header">
  <div class="modal fade bs-example-modal-lg" id='inputtanggal' data-toggle="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Input Tanggal Mulai</h4>
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

        <form  method="post" data-parsley-validate class="form-horizontal form-label-left" action="">
          @csrf
          <div class="form-group tanggal">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="tgl_mulai" name="tgl_mulai" type="date" class="ferry ferry-from" required>
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
    $('#pro').DataTable({
        serverSide: true,
        processing: true,
        ajax: '/karoseri-qc_tambah',
        columns: [
            {data: 'kode_produksi'},
            {data: 'id_spkc'},
            {data: 'tanggal'},
            {data: 'status_produksi'},
            {data: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>

@stop
