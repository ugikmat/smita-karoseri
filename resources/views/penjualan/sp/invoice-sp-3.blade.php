@extends('adminlte::page')

@section('title', 'Penjualan sp')

@section('content_header')
    <h1>Review Penjualan sp RO</h1>
@stop

@section('css')
<style>
td{
  background-color: white;
}
</style>
@stop


@section('content')
<form class="invoice-sp" action="/invoice_sp/store" method="post">
  @csrf
<input type="hidden" name="id" id="id" value="{{$penjualanSp->id_penjualan_sp}}">
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
          Nama Canvaser :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-8">
        <input type="text" name="canvasser" id="canvasser" value="{{$sales->nm_sales}}" disabled>
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          Nama Kios :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <input type="text" name="downline" id="downline" value="{{$customer->nm_cust}}" disabled>
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">

    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
          No HP Canvaser :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-8">
        @isset($sales)
           {{$sales->no_hp}}
        @endisset
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          No HP Kios :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        @isset($customer)
          {{$customer->no_hp}}
        @endisset
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Tanggal Penjualan :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <input class="datepicker" data-date-format="dd-mm-yyyy" id="tgl" value="{{$penjualanSp->tanggal_penjualan_sp}}" readonly>
      </div>
    </div>
  </div>
</div>




<table id="invoice-sp-table" class="table responsive"  width="100%">
    <thead>
    <tr>
      <th>Nama Barang</th>
      <th>Tipe Harga</th>
      <th>Harga Satuan</th>
      <th>Jumlah</th>
      <th>Qty Program</th>
      <th>Harga Total</th>
    </tr>
    </thead>
      <tfoot>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Grand Total</b></td>
          <td></td>
          <td>            
            <input type="text" name="total" id="total" value="{{session('total_harga_sp')}}" readonly>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Jumlah Tunai</b></td>
          <td></td>
          <td>
            @isset($tunai)
          <input type="text" id="tunai"  name="tunai" class="form-control" value="{{$tunai}}" readonly>
          @endisset
          </td>

        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Bank Transfer 1</b></td>
          <td></td>
          <td><input type="text" id="bank1" required="required" name="bank1" class="form-control" value="{{$bank1}}" readonly></td>

        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Jumlah Transfer 1</b></td>
          <td></td>
          <td><input type="text" id="trf1" required="required" name="trf1" class="form-control" value="{{$trf1}}" readonly></td>

        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Bank Transfer 2</b></td>
          <td></td>
          <td><input type="text" id="bank2" required="required" name="bank2" class="form-control" value="{{$bank2}}" readonly></td>

        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Jumlah Transfer 2</b></td>
          <td></td>
          <td><input type="text" id="trf2" required="required" name="trf2" class="form-control" value="{{$trf2}}" readonly></td>

        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Bank Transfer 3</b></td>
          <td></td>
          <td><input type="text" id="bank3" required="required" name="bank3" class="form-control" value="{{$bank3}}" readonly></td>

        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Jumlah Transfer 3</b></td>
          <td></td>
          <td><input type="text" id="trf3" required="required" name="trf3" class="form-control" value="{{$trf2}}" readonly></td>

        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Catatan</b></td>
          <td></td>
          <td><input type="text" id="catatan" required="required" name="catatan" class="form-control" value="{{$catatan}}" readonly></td>

        </tr>
        <tr>
          <td colspan="6">
            <div class="pull-right">
              <button type="button" onclick="goBack()" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</button>
              <button type="submit" class="btn btn-success" name="button"><span class="glyphicon glyphicon-ok"></span> Simpan</button>
            </div>
          </td>
        </tr>
    </tfoot>
</table>
</form>

@stop

@section('js')
<script>
function goBack() {
    window.history.back()
}
</script>
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $(function () {
        var id = $('#id').val();
        var t = $('#invoice-sp-table').DataTable({
                  serverSide: true,
                  processing: true,
                  ajax: `/edit_invoice_sp/${id}`,
                  columns: [
                      {data: 'nama_produk'},
                      {data: 'tipe_harga'},
                      {data: 'harga_satuan'},
                      {data: 'jumlah_sp'},
                      {data: 'harga_beli'},
                      {data: 'total_harga'}
                  ]
              });
        console.log('{{session('total_harga_sp')}}');
    });
</script>
@stop
