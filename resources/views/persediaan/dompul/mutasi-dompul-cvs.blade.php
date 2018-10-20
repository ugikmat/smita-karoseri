@extends('adminlte::page')

@section('title', 'Persediaan Dompul')

@section('content_header')
    <h1>Mutasi Dompul per CVS</h1>
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
  <form class="invoice-dompul repeater" action="" method="post">
  @csrf
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <strong>Tanggal Awal :</strong>
        @if(Session::has('tgl_stok_dompul'))
          <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_awal" name="tgl_awal" value="{{session('tgl_stok_dompul')}}">
        @else
          <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_awal" name="tgl_awal" value="{{Carbon\Carbon::now()->format('d-m-Y')}}">
        @endif
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <strong>Tanggal Akhir :</strong>
        @if(Session::has('tgl_stok_dompul'))
          <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_akhir" name="tgl_akhir" value="{{session('tgl_stok_dompul')}}">
        @else
          <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_akhir" name="tgl_akhir" value="{{Carbon\Carbon::now()->format('d-m-Y')}}">
        @endif
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <strong>Nama Canvaser :</strong> &nbsp;
        <select id="sales" required="required" name="sales" class="chosen-select" data-placeholder="{{session('id_sales')}}">
              <option value="" disabled>Pilih Nama canvaser</option>
              @isset($saless)
                  @foreach ($saless as $data)
                  <option value="{{ $data->id_sales }}">{{ $data->nm_sales }}</option>
                  @endforeach
              @endisset
        </select>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
      <button type="button" id="save" class="btn btn-success" ><i class="fa fa-caret-square-o-right"></i>Tampilkan Mutasi Dompul</button>
    </div>
  </div>
</div>
<br><br>

<table id="mutasi-dompul-cvs-table" class="table responsive" width="100%">
    <thead>
      <tr>
        <th>Nama Produk</th>
        <th>Stok Awal</th>
        <th>Stok Masuk</th>
        <th>Stok Keluar</th>
        <th>Stok Akhir</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td><b>Total Mutasi</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tfoot>
</table>


@stop

@section('js')
<script src="{{ asset('/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
  $('.chosen-select').chosen();
  @if(Session::has('sales_stok_dompul'))
    $("#sales").val("{{session('sales_stok_dompul')}}");
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
        var t = $('#mutasi-dompul-cvs-table').DataTable({
            serverSide: true,
            processing: true,
            stateSave: true,
            lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
            ajax: `/smita/stok-dompul/data/${$sales}/${$tgl_awal}/${$tgl_akhir}`,
            columns: [
              // {data: 'indeks'},
              {data: 'produk'},
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
          t.ajax.url(`/smita/stok-dompul/data/${$sales}/${$tgl_awal}/${$tgl_akhir}`).load();
        });
    });
</script>
@stop
