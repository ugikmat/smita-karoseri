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
              @isset($saless)
                  @foreach ($saless as $data)
                  <option value="{{ $data->id_sales }}">{{ $data->nm_sales }}</option>
                  @endforeach
              @endisset
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
              @isset($customerarray)
                  @foreach ($customerarray as $data)
                  <option value="{{ $data->id_cust }}">{{ $data->nm_cust }}</option>
                  @endforeach
              @endisset
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

<br><br>

<form class="invoice-sp" action="" method="post">

<table id="invoice-sp-table" class="table responsive"  width="100%">
  <tr>
    <th>Nama Barang</th>
    <th>Satuan</th>
    <th>Harga Satuan</th>
    <th>Tipe Harga</th>
    <th>Jumlah</th>
    <th>Harga Total</th>
  </tr>
  @foreach($produks as $key => $produk)
  <tr>
    <td>
    <input type="text" class="form-control" id="nama" name="nama" value="{{$produk->nama_produk}}" disabled>
    </td>
    <td>
      <input type="text" class="form-control" id="satuan" name="satuan" value="{{$produk->satuan}}" disabled>
    </td>
    <td>
      <input type="text" class="form-control" id="harga{{$key+1}}" name="harga-satuan" value="20000" disabled>
    </td>
    <td>
      <select class="form-control" name="tipe" id="tipe">
        @foreach($hargaProduks as $harga)
          @if($harga->id_produk==$produk->kode_produk)
            <option value="{{$harga->tipe_harga_sp}}">{{$harga->tipe_harga_sp}}</option>
          @endif
        @endforeach
      </select>
    </td>
    <td>
      <input type="text" class="form-control" id="jumlah{{$key+1}}" name="jumlah">
    </td>
    <td>
      <input type="text" class="form-control" id="total{{$key+1}}" name="total" readonly>
    </td>
  </tr>
  @endforeach

</table>
<div class="pull-right">
  <button type="submit" class="btn btn-success" name="button"><span class="glyphicon glyphicon-ok"></span> Pembelian</button>
</div>

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

@stop

@section('js')
<script type="text/javascript">
  // $produks.forEach(function myFunction(item, index) {
  //   console.log(index)
  //   $(`#jumlah${index+1}`).on('keyup',function (event) {
  //     $(`#total${index+1}`).val($(`#harga${index+1}`).val()*this.value);
  // })
  // })
  
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
