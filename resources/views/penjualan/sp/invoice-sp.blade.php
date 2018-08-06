@extends('adminlte::page')

@section('title', 'Penjualan SP')

@section('content_header')
    <h1>Penjualan SP</h1>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">

@stop

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
          Nama Canvaser :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-8">
        <select id="sales" required="required" name="sales" placeholder="Pilih Nama Canvaser" class="form-control">
              <option value="" selected disabled>Pilih Nama Canvaser</option>
              <!-- @isset($lokasiarray)
                  @foreach ($lokasiarray as $data)
                  <option value="{{ $data->id_sales }}">{{ $data->nm_lokasi }}</option>
                  @endforeach
              @endisset -->
        </select>
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          Nama Kios :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <select id="customer" required="required" name="customer" placeholder="Pilih Nama Kios" class="form-control">
              <option value="" selected disabled>Pilih Nama Kios</option>
              <!-- @isset($lokasiarray)
                  @foreach ($lokasiarray as $data)
                  <option value="{{ $data->id_sales }}">{{ $data->nm_lokasi }}</option>
                  @endforeach
              @endisset -->
        </select>
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Tanggal Penjualan :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <input class="datepicker" data-date-format="dd-mm-yyyy" id="tgl">
      </div>
    </div>
  </div>
</div>

<table>
  <tr>
    <th>Nama Barang</th>
    <th>Satuan</th>
    <th>Harga Satuan</th>
    <th>Tipe Harga</th>
    <th>Jumlah</th>
    <th>Harga Total</th>
  </tr>
  <tr>
    <td>
      <input type="text" class="form-control" id="Produk" name="barang" value="BRONET 2GB" disabled>
    </td>
    <td>
      <input type="text" class="form-control" id="Produk" name="satuan" value="PCS" disabled>
    </td>
    <td>
      <input type="text" class="form-control" id="Produk" name="harga-satuan" value="20000" disabled>
    </td>
    <td>
      <input type="text" class="form-control" id="Produk" name="satuan" value="PCS" disabled>
    </td>
    <td>
      <input type="text" class="form-control" id="Produk" name="satuan" value="PCS" disabled>
    </td>
    <td>
      <input type="text" class="form-control" id="Produk" name="satuan" value="PCS" disabled>
    </td>
  </tr>
</table>

<form class="repeater">
    <!--
        The value given to the data-repeater-list attribute will be used as the
        base of rewritten name attributes.  In this example, the first
        data-repeater-item's name attribute would become group-a[0][text-input],
        and the second data-repeater-item would become group-a[1][text-input]
    -->
    <div data-repeater-list="group-a">
      <div data-repeater-item>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            ID Barang : <input type="text" name="text-input" value=""/>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            Nama Barang : <input type="text" name="text-input" value=""/>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            Satuan : <input type="text" name="text-input" value=""/>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <button data-repeater-delete type="button" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Delete</button>
        </div>
      </div>
    </div>
    <button data-repeater-create type="button" class="btn btn-success"> <span class="glyphicon glyphicon-plus"></span> Add</button>
</form>

<!-- <table id="invoice-sp-table" class="table responsive" width="100%">
    <thead>
    <tr>
        <th>No.</th>
        <th>Nama RO</th>
        <th>Qty Penjualan</th>
    </tr>
    </thead>
</table> -->

<!--Modal Link-->
<div class="modal fade bs-example-modal-lg" id='modalLink' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
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

              <form id="editForm" method="POST" data-parsley-validate class="form-horizontal form-label-left" action="/penjualan/dompul/invoice-sp">
                  @csrf
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Canvasser
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control col-md-7 col-xs-12" name="id">
                        <option value="1">pras</option>
                        <option value="3">ugik</option>
                        <option value="2">jovi</option>
                      </select>
                    </div>
                  </div>

                  <!-- ini dinamis mengikuti id canvaser yg dipilih di atas-->
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Kios
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control col-md-7 col-xs-12" name="id">
                        <option value="1">pras</option>
                        <option value="3">ugik</option>
                        <option value="2">jovi</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Penjualan
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="Auto Generate"  disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl Penjualan
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input class="datepicker col-md-7 col-xs-12" required="required" name="tgl" data-date-format="dd-mm-yyyy">
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="reset"> <i class="fa fa-repeat"></i> Kosongkan</button>
                      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Rekap Penjualan</button>
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
<script type="text/javascript">
  function today(){
    var today = new Date();
    var today = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
  }

</script>
<!-- <script>
    $(function () {
        if ($('#tgl').val()==undefined) {
          var tgl = null;
        } else {
          var tgl = $('#tgl').val();
        }
        if ($('#canvaser').val()==undefined) {
          var canvaser = null;
        } else {
          var canvaser = $('#canvaser').val();
        }
        var t = $('#invoice-sp-table').DataTable({
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
</script> -->
<script src="{{ asset('/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
$('.datepicker').datepicker({
});
</script>
@stop
