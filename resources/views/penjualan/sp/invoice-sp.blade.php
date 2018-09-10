@extends('adminlte::page')

@section('title', 'Penjualan SP')

@section('content_header')
    <h1>Penjualan SP</h1>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">
<style>
  #kiri{
    padding-left: 0px;
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
<form class="invoice-sp repeater" action="/invoice_sp/verify" method="post">
<div class="container-fluid  form-inline">
  @csrf
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" id="kiri">
      Tanggal Penjualan : &nbsp;
      <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_penjualan" name="tgl_penjualan" value="{{Carbon\Carbon::now('Asia/Jakarta')->format('d-m-Y')}}">
    </div>
    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" id="kiri">
        Lokasi : &nbsp;
        <select name="lokasi" required="required" class="form-control" id="lokasi">
          <option value="" disabled selected>Pilih Lokasi</option>
          @isset($lokasis)
            @foreach($lokasis as $lokasi)
              <option value="{{$lokasi->id_lokasi}}" id="{{$lokasi->nm_lokasi}}">{{$lokasi->nm_lokasi}}</option>
            @endforeach
          @endisset
        </select>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" id="kiri">
        Nama Canvaser : &nbsp;
        <select id="sales" required="required" name="sales" class="chosen-select" data-placeholder="{{session('id_sales')}}">
              <option value="" disabled>Pilih Nama Canvaser</option>
              @isset($saless)
                  @foreach ($saless as $data)
                  <option value="{{ $data->id_sales }}">{{ $data->nm_sales }}</option>
                  @endforeach
              @endisset
        </select>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" id="kiri">
        Nama Kios : &nbsp;
        <select id="customer" required="required" name="customer" placeholder="Pilih Nama Kios" class="chosen-select" data-placeholder="{{session('id_cust')}}">
              <option value="" disabled>Pilih Nama Kios</option>
              @isset($kios)
                  @foreach ($kios as $data)
                  <option value="{{ $data->id_cust }}">{{ $data->nm_customer }}</option>
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
    <div class="col-xs-2 top" align="center">
      <b>Harga Total</b>
    </div>
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
</div>

<div class="container-fluid" style="background:white;">
  <br>
  <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
      <b>Jumlah Tunai</b>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

        <input type="text" class="form-control" name="total" id="total" value="{{session('total_harga_sp')}}" readonly>

    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

    </div>
  </div>
  <br>
  <div class="row">
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
<div class="row">
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
  <div data-repeater-list="bank-sp" id="pembayaran">
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
          <input type="text" id="trf" name="trf" class="form-control" value="" required="required" autocomplete="off">
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
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Nota Penjualan</button>
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
        $('#selisih').val((parseInt($('#total').val().replace(/\D/g,''),10)-parseInt($('#total_pembayaran').val().replace(/\D/g,''),10)).toLocaleString('id-ID'));
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
            // defaultValues: {
            //     'text-input': 'foo'
            // },
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
                if(confirm('Apakah anda yakin ingin menghapus pembayaran SP ini?')) {
                    $(this).slideUp(deleteElement);
                }
                var n = parseInt($('#trf', $(this)).val().replace(/\D/g,''),10);
                var total = parseInt($('#total_pembayaran').val().replace(/\D/g,''),10)-n;
                console.log(total);
                $('#total_pembayaran').val((total).toLocaleString('id-ID'));
                $('#selisih').val((parseInt($('#total').val().replace(/\D/g,''),10)-parseInt($('#total_pembayaran').val().replace(/\D/g,''),10)).toLocaleString('id-ID'));
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
          if (this.value.length!=0&&!isNaN(parseInt($(this).val().replace(/\D/g,''),10))) {
            console.log(`Value : ${this.value}`);
            bayar = parseInt($(this).val().replace(/\D/g,''),10);
          }else{
            bayar=0;
          }
        });
    $("#pembayaran").on("input", "#trf", function(){
      if (this.value.length!=0&&!isNaN(parseInt($(this).val().replace(/\D/g,''),10))) {
        var n = parseInt($(this).val().replace(/\D/g,''),10);
        (this).value=n.toLocaleString('id-ID');
        var total = parseInt($('#total_pembayaran').val().replace(/\D/g,''),10)-bayar;
        $('#total_pembayaran').val((total+n).toLocaleString('id-ID'));
      }else{
        (this).value=0;
        var n = parseInt($(this).val().replace(/\D/g,''),10);
        var total = parseInt($('#total_pembayaran').val().replace(/\D/g,''),10)-bayar;
        $('#total_pembayaran').val((total+n).toLocaleString('id-ID'));
      }
      $('#selisih').val((parseInt($('#total').val().replace(/\D/g,''),10)-parseInt($('#total_pembayaran').val().replace(/\D/g,''),10)).toLocaleString('id-ID'));
    });
    });
</script>
<script type="text/javascript">
  $(".chosen-select").chosen();
  $("#sales").val("{{session('id_sales')}}");
  $("#customer").val("{{session('id_cust')}}");
  $("#sales").trigger("chosen:updated");
  $("#customer").trigger("chosen:updated");
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
    $('#selisih').val((parseInt($('#total').val().replace(/\D/g,''),10)-parseInt($('#total_pembayaran').val().replace(/\D/g,''),10)).toLocaleString('id-ID'));
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
    $.post('/get_harga/'+$(this).val()+'/'+$(`#kode${index+1}`).val(), function(response){
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
      $('#selisih').val((parseInt($('#total').val().replace(/\D/g,''),10)-parseInt($('#total_pembayaran').val().replace(/\D/g,''),10)).toLocaleString('id-ID'));
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
