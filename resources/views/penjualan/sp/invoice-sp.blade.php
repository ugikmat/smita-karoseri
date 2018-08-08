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
  <form class="invoice-sp" action="/penjualan/sp/invoice-sp/edit" method="post">
  @csrf
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Tanggal Penjualan :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <input class="datepicker form-control" data-date-format="dd-mm-yyyy" id="tgl_penjualan" name="tgl_penjualan" value="{{session('now')}}"
      </div>
    </div>
  </div>
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
</div>

<br><br>

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
    <input type="hidden" name="kode{{$key+1}}" id="kode{{$key+1}}" value="{{$produk->kode_produk}}">
    <td>
    <input type="text" class="form-control" id="nama{{$key+1}}" name="nama{{$key+1}}" value="{{$produk->nama_produk}}" disabled>
    </td>
    <td>
      <input type="text" class="form-control" id="satuan{{$key+1}}" name="satuan{{$key+1}}" value="{{$produk->satuan}}" disabled>
    </td>
    <td>
      <input type="text" class="form-control" id="harga{{$key+1}}" name="harga{{$key+1}}" value="{{$hargaProduks->where('id_produk',$produk->kode_produk)->first()['harga_sp']}}" readonly>
    </td>
    <td>
      <select class="form-control" name="tipe{{$key+1}}" id="tipe{{$key+1}}">
        @foreach($hargaProduks as $harga)
          @if($harga->id_produk==$produk->kode_produk)
            <option value="{{$harga->tipe_harga_sp}}">{{$harga->tipe_harga_sp}}</option>
          @endif
        @endforeach
      </select>
    </td>
    <td>
      <input type="number" class="form-control" id="jumlah{{$key+1}}" name="jumlah{{$key+1}}" value=0>
    </td>
    <td>
      <input type="text" class="form-control" id="total{{$key+1}}" name="total{{$key+1}}" readonly value=0>
    </td>
  </tr>
  @endforeach
  <tr>
        <td></td>
        <td></td>
        <td colspan="2"><b>Grand Total</b></td>
        <td></td>
        <td>
          <input type="text" class="form-control" name="total" id="total" value="{{session('total_harga_sp')}}" readonly>
        </td>
        
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td colspan="2"><b>Jumlah Tunai</b></td>
        <td></td>
        <td>
        <input type="text" id="tunai" required="required" name="tunai" class="form-control" value="{{session('tunai')}}" onkeyup="inputTunai(this.value)">
        </td>
        

      </tr>
      <tr>
        <td></td>
        <td></td>
        <td colspan="2"><b>Bank Transfer 1</b></td>
        <td></td>
        <td>
          <select class="form-control" name="bank1" id="bank1">
            <option value="" selected disabled>-- Pilih Bank --</option>
            <option value="BCA">BCA Pusat</option>
            <option value="BCA">BCA Cabang</option>
            <option value="BCA">BRI</option>
            <option value="BCA">BNI</option>
            <option value="BCA">Mandiri</option>
          </select>
        </td>
        
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td colspan="2"><b>Jumlah Transfer 1</b></td>
        <td></td>
        <td><input type="text" id="trf1" name="trf1" class="form-control"></td>
        
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td colspan="2"><b>Bank Transfer 2</b></td>
        <td></td>
        <td>
          <select class="form-control" name="bank2" id="bank2">
            <option value="" selected disabled>-- Pilih Bank --</option>
            <option value="BCA">BCA Pusat</option>
            <option value="BCA">BCA Cabang</option>
            <option value="BCA">BRI</option>
            <option value="BCA">BNI</option>
            <option value="BCA">Mandiri</option>
          </select>
        </td>
        
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td colspan="2"><b>Jumlah Transfer 2</b></td>
        <td></td>
        <td><input type="text" id="trf2" name="trf2" class="form-control"></td>
        
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td colspan="2"><b>Bank Transfer 3</b></td>
        <td></td>
        <td>
          <select class="form-control" name="bank3" id="bank3">
            <option value="" selected disabled>-- Pilih Bank --</option>
            <option value="BCA">BCA Pusat</option>
            <option value="BCA">BCA Cabang</option>
            <option value="BCA">BRI</option>
            <option value="BCA">BNI</option>
            <option value="BCA">Mandiri</option>
          </select>
        </td>
        
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td colspan="2"><b>Jumlah Transfer 3</b></td>
        <td></td>
        <td><input type="text" id="trf3" name="trf3" class="form-control"></td>
        
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td colspan="2"><b>Catatan</b></td>
        <td></td>
        <td>
          <input type="text" id="catatan" required="required" name="catatan" class="form-control" value="{{session('catatan')}}" onkeyup="inputCatatan(this.value)">
        </td>
        
      </tr>
</table>

<div class="pull-right">

  <button type="submit" class="btn btn-success" name="button"><span class="glyphicon glyphicon-ok"></span>Pembelian</button>
</div>

</form>
</div>
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
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var harga = [];
var totalHarga = 0;
for (let index = 0; index < {{$jumlah}}; index++) {
  harga.push($(`#total${index+1}`).val());
  totalHarga+=harga[index];
  console.log(`total Harga ${$(`#total${index+1}`).val().replace(/./g, '')}`);
  $(`#jumlah${index+1}`).on('keyup',function (event) {
    totalHarga-=harga[index];    
    $(`#total${index+1}`).val(($(`#harga${index+1}`).val())*this.value);
    harga[index]=$(`#total${index+1}`).val();
    totalHarga+=harga[index];
    console.log(`total Harga ${harga[index]}`);
    $('#total').val(totalHarga);
  });
  // $(`#tipe${index+1}`).on('change',function (event) {
  //   $.session.set("tipe_harga", this.value);
  //   $.session.set("kode_produk", $(`#kode${index+1}`).val());
  //   $(`#harga${index+1}`).val({{$hargaProduks->where('id_produk',session('kode_produk'))->where('tipe_harga_sp',session('tipe_harga'))->first()['harga_sp']}});
  // });
}
$('#total').val(totalHarga);
console.log(`total Harga`);
for (let index = 0; index < {{$jumlah}}; index++) {

  $(`#tipe${index+1}`).on('change',function (event) {
    //ajax call 
    console.log($(this).val());
    console.log($(`#kode${index+1}`).val());
    $.post('/get_harga/'+$(this).val()+'/'+$(`#kode${index+1}`).val(), function(response){
    if(response.success)
    {
      totalHarga-=harga[index];
      console.log(response.harga);
      $(`#harga${index+1}`).val(response.harga.harga_sp);
      $(`#total${index+1}`).val(($(`#harga${index+1}`).val())*$(`#jumlah${index+1}`).val());
      harga[index]=$(`#total${index+1}`).val();
      totalHarga+=harga[index];
      console.log(`total Harga ${totalHarga}`);
      $('#total').val(totalHarga);
    }
}, 'json');
    // $.ajax({
    //      url: "/sp/set-session",
    //      data: { tipe_harga: this.value , kode_produk:$(`#kode${index+1}`).val()}
    // }); 
    // $.session.set("tipe_harga", this.value);
    // $.session.set("kode_produk", $(`#kode${index+1}`).val());
    // console.log($.session.get("tipe_harga"));
    // console.log($.session.get("kode_produk"));
    // $(`#harga${index+1}`).val('0');
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
