@extends('adminlte::page')

@section('title', 'Penjualan Dompul')

@section('content_header')
    <h1>Detail Penjualan Dompul</h1>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">

@stop

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Tanggal Penjualan :
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        @if (Session::has('tgl_penjualan_dompul'))
          <input type="input" disabled id="tgl" value={{ session('tgl_penjualan_dompul')}}>
        @else
          <input type="input" disabled id="tgl" value={{ Carbon\Carbon::now()->format('d-m-Y')}}>
        @endif
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    </div>
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 pull-right">
      <span class="pull-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLink">Input Data</button></span>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama Kasir
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : (nama)
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama Logistik
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : (nama)
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama PIC
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        : (nama)
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        ID Canvaser
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        @if (Session::has('dompul_sales_id'))
            : {{ session('dompul_sales_id') }}
        @endif
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama Canvaser :
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        @if (Session::has('dompul_sales_nama'))
          <input type="input" disabled id="canvaser"value='{{ session('dompul_sales_nama')}}'>
        @endif
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Tanggal Cetak Penjualan :
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        @if (session('now'))
            {{ session('now') }}
        @endif
      </div>
    </div>
  </div>

<table id="invoice-dompul-table" class="table responsive" width="100%">
    <thead>
    <tr>
        <th>No.</th>
        <th>Nama RO</th>
        <th>Qty Penjualan</th>
    </tr>
    </thead>
</table>

<!--Modal Edit-->
<div class="modal fade bs-example-modal-lg" id='modalLink' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Input Penjualan Dompul</h4>
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

              <form id="editForm" method="POST" data-parsley-validate class="form-horizontal form-label-left" action="/penjualan/dompul/invoice-dompul">
                  @csrf
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Canvasser
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      {{-- <input type="text" id="first-name" required="required" name="id" class="form-control col-md-7 col-xs-12" value=""> --}}
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="id" required="required" class="form-control col-md-7 col-xs-12" id="sales">
                          @isset($saless)
                            @foreach($saless as $sales)
                              <option value="{{$sales->nm_sales}}" id="{{$sales->nm_sales}}">{{$sales->nm_sales}}</option>
                            @endforeach
                          @endisset
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Penjualan
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="Auto Generate"  disabled>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl Penjualan
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      @if (Session::has('tgl_penjualan_dompul'))
                        <input class="datepicker col-md-7 col-xs-12" required="required" name="tgl" data-date-format="dd-mm-yyyy" value="{{ session('tgl_penjualan_dompul') }}">
                      @else
                        <input class="datepicker col-md-7 col-xs-12" required="required" name="tgl" data-date-format="dd-mm-yyyy" value="{{Carbon\Carbon::now()->format('d-m-Y')}}">
                      @endif
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="reset"> <i class="fa fa-repeat"></i> Kosongkan</button>
                      <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Rekap Penjualan</button>
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

@stop

@section('js')
<script>
    $(function () {
        $('#sales').attr('value',"{{session('dompul_sales_id')}}");
        if ($('#tgl').val()==undefined) {
          var tgl = 'null';
        } else {
          var tgl = $('#tgl').val();
        }
        if ($('#canvaser').val()==undefined) {
          var canvaser = 'null';
        } else {
          var canvaser = $('#canvaser').val();
        }
        console.log(tgl);
        console.log(canvaser);
        var t = $('#invoice-dompul-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: `/invoice_dompul/${canvaser}/${tgl}`,
            "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
                } ],
            "order": [[ 1, 'asc' ]],
            columnDefs: [
                {
                    targets:1,
                    render: function ( data, type, row, meta ) {
                        if(type === 'display'){
                            data = `<a class="link-post" href="/penjualan/dompul/${canvaser}/${tgl}/${data}">` + data + '</a>';
                        }
                        return data;
                    }
                }
            ],
            columns: [
                {data: 'indeks'},
                {data: 'nama_downline'},
                {data: 'qty'}
            ]
        });
        t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
          } );
        } ).draw();
    });
</script>
<script src="{{ asset('/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
$('.datepicker').datepicker({
});
</script>
@stop
