@extends('adminlte::page')

@section('title', 'Pembelian Dompul')

@section('content_header')
    <h1>Pembelian Dompul</h1>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">
<style>
  #kiri{
    padding-left: 0px;
  }
</style>
@stop

@section('content')
<form class="invoice-dompul repeater" action="/pembelian/dompul/verify" method="post">
  @if (Session::has('status'))
  <div class="alert alert-success">
    <strong>Berhasil!</strong> Transaksi pembelian Dompul selesai
  </div>
  @endif
<div class="container-fluid  form-inline">
  @csrf
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4" id="kiri">
      Tanggal Penjualan : &nbsp;
      <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_pembelian" name="tgl_pembelian" value="{{Carbon\Carbon::now('Asia/Jakarta')->format('d-m-Y')}}">
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4" id="kiri">
        Nama Lokasi : &nbsp;
        <select id="lokasi" required="required" name="lokasi" class="chosen-select" data-placeholder="">
              <option value="" selected disabled>Pilih Nama Lokasi</option>
              @isset($lokasis)
                  @foreach ($lokasis as $data)
                  <option value="{{ $data->id_lokasi }}">{{ $data->nm_lokasi }}</option>
                  @endforeach
              @endisset
        </select>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4" id="kiri">
        Nama Supplier : &nbsp;
        <select id="supplier" required="required" name="supplier" placeholder="Pilih Nama Supplier" class="chosen-select" data-placeholder="">
              <option value="" selected disabled>Pilih Nama Supplier</option>
              @isset($suppliers)
                  @foreach ($suppliers as $data)
                  <option value="{{ $data->id_supplier }}">{{ $data->nama_supplier }}</option>
                  @endforeach
              @endisset
        </select>
    </div>
  </div>
</div>

<br><br>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-2 top" align="center">
      <b>Nama Barang</b>
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
    <div class="col-xs-2 top" align="center">
      <b>Harga Total</b>
    </div>
  </div>
  <br>

  @foreach($dompuls as $key => $dompul)
  <div class="row">
    <input type="hidden" name="id_harga_dompul" id="id_harga_dompul" value="{{$hargaDompuls->where('nama_harga_dompul',$dompul->produk)->first()['id_harga_dompul']}}">
    <div class="col-xs-2">
      <input type="text" class="form-control" id="nama{{$key+1}}" name="nama{{$key+1}}" value="{{$dompul->produk}}" readonly>
    </div>
    <div class="col-xs-2">
      <input type="text" class="form-control" id="harga{{$key+1}}" name="harga{{$key+1}}" value="{{number_format($hargaDompuls->where('nama_harga_dompul',$dompul->produk)->first()['harga_dompul'],0,",",".")}}" readonly>
    </div>
    <div class="col-xs-2" align="center">
      <select class="form-control" name="tipe{{$key+1}}" id="tipe{{$key+1}}" style="height: calc(3.5rem - 2px); width:100px;">
        @foreach($hargaDompuls as $harga)
          @if($harga->nama_harga_dompul==$dompul->produk)
            <option  value="{{$harga->tipe_harga_dompul}}">{{$harga->tipe_harga_dompul}}</option>
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
  <br>
</div>

<div class="container-fluid" style="background:white;">
  <br>
  <div class="form row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
      <b>Jumlah Tunai</b>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <input type="text" class="form-control" name="total" id="total" value="0" readonly>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

    </div>
  </div>
  <br>
  <div class="form row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
      <b>Total Pembayaran</b>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <input type="text" class="form-control" name="pembayaran" id="total_pembayaran" value="0" readonly>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

    </div>
</div>
<br>
<div class="form row">
  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <b>Kekurangan Pembayaran</b>
  </div>
  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
      <input type="text" class="form-control" name="selisih" id="selisih" value="0" readonly>
  </div>
  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

  </div>
  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

  </div>
</div>
  <hr>
  <div data-repeater-list="bank" id="pembayaran">
    <div data-repeater-item>
      <div class="form row">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-3">
          <b>Pembayaran</b>
          <br>
          <select name="bank" id="bank" style="height: calc(3.5rem - 2px); width:100%;" required="required">
            <option value="">-- Cara Pembayaran --</option>
            <option value="Cash">Cash</option>
            <option value="BCA Pusat">BCA Pusat</option>
            <option value="BCA Cabang">BCA Cabang</option>
            <option value="BRI">BRI</option>
            <option value="BNI">BNI</option>
            <option value="Mandiri">Mandiri</option>
          </select>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-3">
          <b>Nominal</b>
          <br>
          <input type="text" id="trf" name="trf" class="form-control" value="0" required="required" autocomplete="off">
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
          <b>Catatan</b>
          <br>
          <input type="text" id="catatan" name="catatan" class="form-control" value="" autocomplete="off">
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
          <br>
          <button data-repeater-delete type="button" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Delete</button>
        </div>
      </div>
    <hr>
    </div>
  </div>
<button data-repeater-create type="button" class="btn btn-warning"> <span class="glyphicon glyphicon-plus"></span> Tambah Pembayaran</button>

<div class="row">
  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

  </div>
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

  </div>
  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

  </div>
  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
    <br>
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Nota Pembelian</button>
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
<script>
    $(document).ready(function () {
        var bayar=0;
        $('#selisih').val((parseFloat($('#total').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))-parseFloat($('#total_pembayaran').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))).toLocaleString('id-ID'));
        $('.repeater').repeater({
            // (Optional)
            // start with an empty list of repeaters. Set your first (and only)
            // "data-repeater-item" with style="display:none;" and pass the
            // following configuration flag
            // initEmpty: true,
            // (Optional)
            // "defaultValues" sets the values of added items.  The keys of
            // defaultValues refer to the value of the input's name attribute.
            // If a default value is not specified for an input, then it will
            // have its value cleared.
            defaultValues: {
                'trf': '0'
            },
            // (Optional)
            // "show" is called just after an item is added.  The item is hidden
            // at this point.  If a show callback is not given the item will
            // have $(this).show() called on it.
            show: function () {
                $(this).slideDown();
            },
            // (Optional)
            // "hide" is called when a user clicks on a data-repeater-delete
            // element.  The item is still visible.  "hide" is passed a function
            // as its first argument which will properly remove the item.
            // "hide" allows for a confirmation step, to send a delete request
            // to the server, etc.  If a hide callback is not given the item
            // will be deleted.
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
                var n = parseFloat($('#trf', $(this)).val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'));
                var total = parseFloat($('#total_pembayaran').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))-n;
                console.log(total);
                $('#total_pembayaran').val((total).toLocaleString('id-ID'));
                $('#selisih').val((parseFloat($('#total').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))-parseFloat($('#total_pembayaran').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))).toLocaleString('id-ID'));
            },
            // (Optional)
            // You can use this if you need to manually re-index the list
            // for example if you are using a drag and drop library to reorder
            // list items.
            // ready: function (setIndexes) {
            //     $dragAndDrop.on('drop', setIndexes);
            // },
            // (Optional)
            // Removes the delete button from the first list item,
            // defaults to false.
            isFirstItemUndeletable: false
        });
        $("#pembayaran").on("keydown", "#trf", function(){
          console.log((this).value);
          if (this.value.length!=0&&!isNaN(parseFloat($(this).val().replace(/[ .]/g, '').replace(/[ ,]/g, '.')))) {
            console.log(`Value : ${this.value}`);
            bayar = parseFloat($(this).val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'));
          }else{
            bayar=0;
          }
        });
        $("#pembayaran").on("input", "#trf", function(){
          if (this.value.length!=0&&!isNaN(parseFloat($(this).val().replace(/[ .]/g, '').replace(/[ ,]/g, '.')))) {
            var n = parseFloat($(this).val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'));
            (this).value=n.toLocaleString('id-ID');
            var total = parseFloat($('#total_pembayaran').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))-bayar;
            $('#total_pembayaran').val((total+n).toLocaleString('id-ID'));
          }else{
            (this).value=0;
            var n = parseFloat($(this).val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'));
            var total = parseFloat($('#total_pembayaran').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))-bayar;
            $('#total_pembayaran').val((total+n).toLocaleString('id-ID'));
          }
          $('#selisih').val((parseFloat($('#total').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))-parseFloat($('#total_pembayaran').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))).toLocaleString('id-ID'));
        });
    });
</script>
<script type="text/javascript">
  $(".chosen-select").chosen();
</script>
<script type="text/javascript">
  $(".chosen-select").chosen();
  $("#sales").val("{{session('id_sales')}}");
  $("#supplier").val("{{session('id_supplier')}}");
  $("#sales").trigger("chosen:updated");
  $("#supplier").trigger("chosen:updated");
</script>
<script type="text/javascript">

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
console.log("{{$hargaDompuls->where('nama_harga_dompul','DP5')->where('tipe_harga_dompul','CVS')->first()['harga_dompul']}}");
var harga = [];
var totalHarga = 0;
for (let index = 0; index < {{$dompuls->count()}}; index++) {
  harga.push($(`#total${index+1}`).val().replace(/[ .]/g, ''));
  console.log(harga[index]);
  totalHarga+=parseFloat(harga[index]);
  console.log(`total Harga ${$(`#total${index+1}`).val().replace(/[ .]/g, '')}`);
  $(`#jumlah${index+1}`).on('input',function (event) {
    totalHarga-=parseFloat(harga[index]);
    $(`#total${index+1}`).val(($(`#harga${index+1}`).val().replace(/[ .]/g, '').replace(/[ ,]/g, '.')*this.value.replace(/[ .]/g, '')).toLocaleString('id-ID'));
    harga[index]=$(`#total${index+1}`).val().replace(/[ .]/g, '').replace(/[ ,]/g, '.');
    totalHarga+=parseFloat(harga[index]);
    console.log(`total Harga ${harga[index]}`);
    $('#total').val(totalHarga.toLocaleString('id-ID'));
    $('#selisih').val((parseFloat($('#total').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))-parseFloat($('#total_pembayaran').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))).toLocaleString('id-ID'));
  });
}
$('#total').val(totalHarga.toLocaleString('id-ID'));
console.log(`total Harga`);
for (let index = 0; index < {{$dompuls->count()}}; index++) {
  $(`#tipe${index+1}`).on('change',function (event) {
    //ajax call
    $.post('/dompul/get_harga/'+$(this).val()+'/'+$(`#nama${index+1}`).val(), function(response){
    if(response.success)
    {
      totalHarga-=parseFloat(harga[index]);
      console.log(response.harga);
      $('#id_harga_dompul').val(response.id_harga_dompul);
      $(`#harga${index+1}`).val(response.harga.harga_dompul.toLocaleString('id-ID'));
      $(`#total${index+1}`).val(($(`#harga${index+1}`).val().replace(/[ .]/g, '').replace(/[ ,]/g, '.')*$(`#jumlah${index+1}`).val().replace(/[ .]/g, '')).toLocaleString('id-ID'));
      harga[index]=$(`#total${index+1}`).val().replace(/[ .]/g, '').replace(/[ ,]/g, '.');
      totalHarga+=parseFloat(harga[index]);
      console.log(`total Harga ${totalHarga}`);
      $('#total').val(totalHarga.toLocaleString('id-ID'));
      $('#selisih').val((parseFloat($('#total').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))-parseFloat($('#total_pembayaran').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))).toLocaleString('id-ID'));
    }
}, 'json');
  });
}
</script>
<script src="{{ asset('/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
$('.datepicker').datepicker({
  });
</script>
@stop
