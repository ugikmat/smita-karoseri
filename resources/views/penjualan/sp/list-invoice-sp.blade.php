@extends('adminlte::page')

@section('title', 'List Invoice')

@section('content_header')
    <h1>List Penjualan SP</h1>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')
@if (Session::has('status'))
<div class="alert alert-success">
  {{session('status')}}
</div>
@endif
{{-- @if (session('tgl'))
  <input type="hidden" id="tgl"value={{ session('tgl')}}></input>
@endif --}}
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInput">Input Tanggal Penjualan</button>
<form action="" method="post">
<table id="list-invoice-table" class="table responsive" width="100%">
    <thead>
    <tr>
        {{-- <th>No</th> --}}
        <th>No Penjualan</th>
        <th>Sales</th>
        <th>Hp Kios</th>
        <th>Nama Kios</th>
        <th>Tanggal Penjualan</th>
        <th>Status Verifikasi</th>
        <th>Action</th>
    </tr>
    </thead>
</table>
</form>

<!--Modal input-->
<div class="modal fade bs-example-modal-lg" id='modalInput' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">?</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Input Penjualan SP</h4>
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

                <form id="editForm" method="POST" data-parsley-validate class="form-horizontal form-label-left" action="">
                  @csrf @method('put')
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Awal
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      @if(Session::has('sp-list-tgl-awal'))
                        <input class="datepicker col-md-7 col-xs-12" name="tgl_awal" id="tgl_awal" data-date-format="dd-mm-yyyy" value="{{session('sp-list-tgl-awal')}}" required>
                      @else
                        <input class="datepicker col-md-7 col-xs-12" name="tgl_awal" id="tgl_awal" data-date-format="dd-mm-yyyy" value="{{Carbon\Carbon::now('Asia/Jakarta')->format('d-m-Y')}}" required>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Akhir
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      @if(Session::has('sp-list-tgl-akhir'))
                        <input class="datepicker col-md-7 col-xs-12" name="tgl_akhir" id="tgl_akhir" data-date-format="dd-mm-yyyy" value="{{session('sp-list-tgl-akhir')}}" required>
                      @else
                        <input class="datepicker col-md-7 col-xs-12" name="tgl_akhir" id="tgl_akhir" data-date-format="dd-mm-yyyy" value="{{Carbon\Carbon::now('Asia/Jakarta')->format('d-m-Y')}}" required>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Canvasser
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="sales" required="required" class="form-control col-md-7 col-xs-12" id="sales" value='{{session('dompul_sales_id')}}'>

                          @isset($saless)
                          @if($saless->count()>1)
                            <option value="all" id="all">- Semua Canvaser -</option>
                          @endif
                            @foreach($saless as $sales)
                              <option value="{{$sales->id_sales}}" id="{{$sales->nm_sales}}">{{$sales->nm_sales}}</option>
                            @endforeach
                          @endisset
                        </select>
                      </div>
                    </div>

                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Lokasi
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select name="lokasi" required="required" class="form-control col-md-7 col-xs-12" id="lokasi">
                        <option value="all" id="all">- Semua Lokasi -</option>
                          @isset($lokasis)
                            @foreach($lokasis as $lokasi)
                              <option value="{{$lokasi->id_lokasi}}" id="{{$lokasi->nm_lokasi}}">{{$lokasi->nm_lokasi}}</option>
                            @endforeach
                          @endisset
                        </select>
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="reset"> <i class="fa fa-repeat"></i> Kosongkan</button>
                      <button class="btn btn-success" type="button" data-dismiss="modal" id="show"> </i> Tampilkan List Penjualan</button>
                      {{-- <input type="btn" class="btn btn-success" onclick="loadData()" value="Tampilkan List Penjualan"> --}}
                      {{-- <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="glyphicon glyphicon-ok"></i>Tampilkan List Penjualan</button> --}}
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

<!--Modal Verifikasi-->
<div class="modal fade" id="verificationModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" method="POST" id="verificationForm">
        @csrf @method('put')
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Apakah Anda Yakin ingin memverifikasi transaksi ini?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Verifikasi</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--Modal Hapus-->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="deleteForm" action="{{ url('/') }}/invoice_sp/delete" method="POST">
        @csrf @method('put')
        <input type="hidden" name="id" id="id_penjualan" value="">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Apakah Anda Yakin ingin menghapus?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-danger" value="Hapus">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>

@stop

@section('js')
<script src="{{ asset('/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
  $('.datepicker').datepicker({
  });
</script>
<script>
    $(function () {
      @if(Session::has('sp-list-sales'))
          $('#sales').val("{{session('sp-list-sales')}}").change();
        @endif
        @if(Session::has('lokasi_penjualan'))
          $('#lokasi').val("{{session('lokasi_penjualan')}}").change();
        @endif
        $tgl_awal = ($('#tgl_awal').val()=='') ? 'null' : $('#tgl_awal').val();
        $tgl_akhir = ($('#tgl_akhir').val()=='') ? 'null' : $('#tgl_akhir').val();
        $lokasi = $('#lokasi').val();
        $sales = $('#sales').val();
        var t = $('#list-invoice-table').DataTable({
            serverSide: true,
            processing: true,
            stateSave: true,
            lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
            ajax: `{{ url('/') }}/invoice_sp/list/${$tgl_awal}/${$tgl_akhir}/${$lokasi}/${$sales}`,
            // "columnDefs": [ {
            // "searchable": false,
            // "orderable": false,
            // "targets": 0
            //     } ],
            // "order": [[ 1, 'asc' ]],
            columns: [
                // {data: 'indeks'},
                {data: 'id_penjualan_sp'},
                {data: 'nm_sales'},
                {data: 'no_hp'},
                {data: 'nm_cust'},
                {data: 'tanggal_penjualan'},
                {data: 'status_verif'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
        // t.on( 'order.dt search.dt', function () {
        // t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        //     cell.innerHTML = i+1;
        //   } );
        // } ).draw();
        $('#show').on('click',function (event) {
          $tgl_awal = ($('#tgl_awal').val()=='') ? 'null' : $('#tgl_awal').val();
        $tgl_akhir = ($('#tgl_akhir').val()=='') ? 'null' : $('#tgl_akhir').val();
        $lokasi = $('#lokasi').val();
        $sales = $('#sales').val();
          console.log('Loading Data...');
          t.ajax.url(`{{ url('/') }}/invoice_sp/list/${$tgl_awal}/${$tgl_akhir}/${$lokasi}/${$sales}`).load();
          console.log('Loaded');
        });
        $('#deleteModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var id = button.data('id'); // Extract info from data-* attributes
          $('#id_penjualan').val(id);
        });
        $('#verificationModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var id = button.data('id'); // Extract info from data-* attributes
          $('#verificationForm').attr('action',`{{ url('/') }}/invoice_sp/verify/${id}`);
        });
    });
</script>
@stop
