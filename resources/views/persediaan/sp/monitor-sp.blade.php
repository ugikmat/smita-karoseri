@extends('adminlte::page')

@section('title', 'Persediaan SP')

@section('content_header')
    <h1>Mutasi SP per CVS</h1>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">
<style>
  th{
    text-align: center;
    margin: auto;
    padding: 10%;
  }
  td{
    text-align: center;
    margin: auto;
    padding: 10%;
  }
</style>
@stop

@section('content')
<div class="container-fluid form-inline">
  <form class="invoice-sp repeater" action="" method="post">
  @csrf
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <strong>Tanggal Awal :</strong>
        @if(Session::has('tgl_stok_sp'))
          <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_awal" name="tgl_awal" value="{{session('tgl_stok_sp')}}">
        @else
          <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_awal" name="tgl_awal" value="{{Carbon\Carbon::now()->format('d-m-Y')}}">
        @endif
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <strong>Tanggal Akhir :</strong>
        @if(Session::has('tgl_stok_sp'))
          <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_akhir" name="tgl_akhir" value="{{session('tgl_stok_sp')}}">
        @else
          <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_akhir" name="tgl_akhir" value="{{Carbon\Carbon::now()->format('d-m-Y')}}">
        @endif
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <strong>Nama SP :</strong> &nbsp;
        <select id="sales" required="required" name="sales" class="chosen-select" data-placeholder="{{session('id_sales')}}">
              <option value="" disabled>Pilih Nama SP</option>
              @isset()
                  @foreach ( as $data)
                  <option value="{{ $data->}}">{{ $data-> }}</option>
                  @endforeach
              @endisset
        </select>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
      <button type="button" id="save" class="btn btn-success" ><i class="fa fa-caret-square-o-right"></i>Tampilkan</button>
    </div>
  </div>
</div>
<br><br>

<table id="mutasi-sp-cvs-table" class="table responsive" width="100%">
    <thead>
      <tr>
        <th>Nama CVS</th>
        <th>Jumlah yang Dibawa</th>
      </tr>
    </thead>
</table>


@stop

@section('js')
<!-- <script src="{{ asset('/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
  $('.chosen-select').chosen();
  @if(Session::has('sales_stok_sp'))
    $("#sales").val("{{session('sales_stok_sp')}}");
  @endif
  $('#sales').trigger("chosen:updated");
</script>
<script>
  $('.datepicker').datepicker({
  });
</script>
<script>
    $(function () {
        $sales = $('#sales').val();
        $tgl_akhir = $('#tgl_akhir').val();
        $tgl_awal = $('#tgl_awal').val();
        $sales = $('#sales').val();
        var t = $('#mutasi-sp-cvs-table').DataTable({
            serverSide: true,
            processing: true,
            stateSave: true,
            lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
            ajax: `/smita/stok-sp/data/${$sales}/${$tgl_awal}/${$tgl_akhir}`,
            columns: [
              // {data: 'indeks'},
              {data: 'nama_produk'},
              {data: 'stok_awal'},
              {data: 'stok_masuk'},
              {data: 'stok_keluar'},
              {data: 'jumlah_stok'}
            ],
            dom: 'lBrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        });
        $('#save').on('click',function(event) {
          $tgl_akhir = $('#tgl_akhir').val();
        $tgl_awal = $('#tgl_awal').val();
          $sales = $('#sales').val();
          t.ajax.url(`/smita/stok-sp/data/${$sales}/${$tgl_awal}/${$tgl_akhir}`).load();
        });
    });
</script> -->
@stop
