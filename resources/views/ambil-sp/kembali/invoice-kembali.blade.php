@extends('adminlte::page')

@section('title', 'Pengembalian SP')

@section('content_header')
    <h1>Pengembalian SP</h1>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">
<style>
  #kiri{
    padding: 0px;
  }
  .border{
    border-style: solid;
    border-width: 1px;
    padding: 5px;
  }
  .top{
    font-size: 17px;
  }
</style>
@stop

@section('content')

<!-- sama kayak invoice ambil garis besarnya -->

<form class="invoice-kembali-sp repeater" action="/operasional/smita//kembali-sp/verify" method="post">
  @csrf
<div class="container-fluid  form-inline">

  <!-- alert biasa -->
  @if (Session::has('status'))
  <div class="alert alert-success">
    <strong>Berhasil!</strong> Transaksi pengembalian SP anda berhasil
  </div>
  @endif
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2" id="kiri">
      <strong>Tanggal Pengembalian :</strong> &nbsp;
      <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_penjualan" name="tgl_penjualan" value="{{Carbon\Carbon::now('Asia/Jakarta')->format('d-m-Y')}}">
    </div>
    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2" id="kiri" style="margin-left:20px;">
        <strong>Lokasi :</strong> &nbsp;
        <select name="lokasi" required="required" class="form-control chosen-select" id="lokasi">
          <option value="" disabled selected>Pilih Lokasi</option>
          @isset($lokasis)
            @foreach($lokasis as $lokasi)
              <option value="{{$lokasi->id_lokasi}}" id="{{$lokasi->nm_lokasi}}">{{$lokasi->nm_lokasi}}</option>
            @endforeach
          @endisset
        </select>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" id="kiri">
        <strong>Nama Canvaser :</strong> &nbsp;
        <select id="sales" required="required" name="sales" class="chosen-select" data-placeholder="{{session('id_sales')}}">
              @isset($saless)
                  @if($saless->count()>1)
                    <option value="" disabled>Pilih Nama Canvaser</option>
                  @endif
                  @foreach ($saless as $data)
                  <option value="{{ $data->id_sales }}">{{ $data->nm_sales }}</option>
                  @endforeach
              @endisset
        </select>
    </div>
  </div>
</div>

<br><br>

<!-- hanya produk (sp) yg diambil yg ditampilkan -->
<!-- gausa atek harga total -->
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-2 top" align="center">
      <b>Nama Barang</b>
    </div>
    <div class="col-xs-2 top" align="center">
      <b>Satuan</b>
    </div>
    <div class="col-xs-2 top" align="center">
      <b>Harga Satuan</b>
    </div>
    <div class="col-xs-2 top" align="center">
      <b>Tipe Harga</b>
    </div>
    <div class="col-xs-2 top" align="center">
      <b>Jumlah</b>
    </div>
    <!-- <div class="col-xs-2 top" align="center">
      <b>Harga Total</b>
    </div> -->
  </div>
  <br>
  @foreach($produks as $key => $produk)
  <div class="row">
    <input type="hidden" name="kode{{$key+1}}" id="kode{{$key+1}}" value="{{$produk->kode_produk}}">
    <div class="col-xs-2">
      <input type="text" class="form-control" id="nama{{$key+1}}" name="nama{{$key+1}}" value="{{$produk->nama_produk}}" disabled>
    </div>
    <div class="col-xs-2">
      <input type="text" class="form-control" id="satuan{{$key+1}}" name="satuan{{$key+1}}" value="{{$produk->satuan}}" disabled>
    </div>
    <div class="col-xs-2">
      <input type="text" class="form-control" id="harga{{$key+1}}" name="harga{{$key+1}}" value="{{number_format($hargaProduks->where('id_produk',$produk->kode_produk)->first()['harga_sp'],0,",",".")}}" readonly>
    </div>
    <div class="col-xs-2" align="center">
      <select class="form-control" name="tipe{{$key+1}}" id="tipe{{$key+1}}" style="height: calc(3.5rem - 2px); width:100px;">
        @foreach($hargaProduks as $harga)
          @if($harga->id_produk==$produk->kode_produk)
            <option  value="{{$harga->tipe_harga_sp}}">{{$harga->tipe_harga_sp}}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="col-xs-2">
      <input type="number" class="form-control" id="jumlah{{$key+1}}" name="jumlah{{$key+1}}" value=0 style="width=100%;">
    </div>
    <div class="col-xs-2">
      <input type="text" class="form-control" id="total{{$key+1}}" name="total{{$key+1}}" readonly value=0>
    </div>
  </div>
  <br>
  @endforeach
  <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

    </div>
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
      <br>
      <!-- link ke invoice-kembali-2 -->
      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> balikkan SP</button>
      <br><br>
    </div>
  </div>
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
  $(".chosen-select").chosen();
  @if(Session::has('id_sales'))
    $("#sales").val("{{session('id_sales')}}");
    $("#sales").trigger("chosen:updated");
  @endif
  @if(Session::has('lokasi_penjualan'))
    $("#lokasi").val("{{session('lokasi_penjualan')}}");
    $("#lokasi").trigger("chosen:updated");
  @endif
</script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var harga = [];
var totalHarga = 0;
for (let index = 0; index < {{$jumlah}}; index++) {
  harga.push($(`#total${index+1}`).val().replace(/[ .]/g, ''));
  totalHarga+=parseFloat(harga[index]);
  console.log(`total Harga ${$(`#total${index+1}`).val().replace(/[ .]/g, '')}`);
  $(`#jumlah${index+1}`).on('input',function (event) {
    totalHarga-=parseFloat(harga[index]);
    $(`#total${index+1}`).val(($(`#harga${index+1}`).val().replace(/[ .]/g, '')*this.value.replace(/[ .]/g, '')).toLocaleString('id-ID'));
    harga[index]=$(`#total${index+1}`).val().replace(/[ .]/g, '');
    totalHarga+=parseFloat(harga[index]);
    console.log(`total Harga ${harga[index]}`);
    $('#total').val(totalHarga.toLocaleString('id-ID'));
  });
  // $(`#tipe${index+1}`).on('change',function (event) {
  //   $.session.set("tipe_harga", this.value);
  //   $.session.set("kode_produk", $(`#kode${index+1}`).val());
  //   $(`#harga${index+1}`).val({{$hargaProduks->where('id_produk',session('kode_produk'))->where('tipe_harga_sp',session('tipe_harga'))->first()['harga_sp']}});
  // });
}
$('#total').val(totalHarga.toLocaleString('id-ID'));
console.log(`total Harga`);
for (let index = 0; index < {{$jumlah}}; index++) {

  $(`#tipe${index+1}`).on('change',function (event) {
    //ajax call
    $.post('/operasional/smita/get_harga/'+$(this).val()+'/'+$(`#kode${index+1}`).val(), function(response){
    if(response.success)
    {
      totalHarga-=parseFloat(harga[index]);
      console.log(response.harga);
      $(`#harga${index+1}`).val(response.harga.harga_sp.toLocaleString('id-ID'));
      $(`#total${index+1}`).val(($(`#harga${index+1}`).val().replace(/[ .]/g, '')*$(`#jumlah${index+1}`).val().replace(/[ .]/g, '')).toLocaleString('id-ID'));
      harga[index]=$(`#total${index+1}`).val().replace(/[ .]/g, '');
      totalHarga+=parseFloat(harga[index]);
      console.log(`total Harga ${totalHarga}`);
      $('#total').val(totalHarga.toLocaleString('id-ID'));
    }
}, 'json');
  });
}
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
