@extends('adminlte::page')

@section('title', 'Penjualan Dompul')

@section('content_header')
    <h1>Review Penjualan Dompul RO</h1>
@stop

@section('css')
<style>
td{
  background-color: white;
}
</style>
@stop

@section('content')
<div class="row">
  @isset($datas)
  <input type="hidden" name="canvaser" id="canvaser" value="{{$datas->nama_canvasser}}" readonly>
  <input type="hidden" name="tgl" id="tgl" value="{{$tgl}}">
  @endisset

    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        HP Kios :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
        @isset($datas)
          {{$datas->no_hp_downline}}
        @endisset
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Nama Kios :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
        @isset($datas)
        <input type="text" name="downline" id="downline" value="{{$datas->nama_downline}}" readonly>
        @endisset
      </div>
    </div>
  </div>

<form class="invoice-dompul" action="/invoice_dompul/store" method="post">
  @csrf
  <input type="hidden" name="sales" id="sales" value="{{$sales->id_sales}}">
  <input type="hidden" name="nm_sales" id="nm_sales" value="{{$sales->nm_sales}}">
  <input type="hidden" name="downline" id="downline" value="{{$datas->no_hp_downline}}">
  <input type="hidden" name="tgl" id="tgl" value="{{$tgl}}">
  <input type="hidden" name="user" id="user" value="{{ Auth::user()->id }}">
<table id="invoice-dompul-table" class="table responsive"  width="100%">
    <thead>
    <tr>
        {{-- <th>No</th> --}}
        <th>Uraian</th>
        <th>Tipe</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Jumlah Program</th>
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
            @isset($total)
            <input type="text" name="total" id="total" value="{{$total}}" readonly>
            @endisset
          </td>
        </tr>
        @foreach($bank as $key=>$value)
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Pembayaran {{$key+1}}</b></td>
          <td></td>
        <td><input type="text" id="bank{{$key}}" required="required" name="bank[{{$key}}][bank]" class="form-control" value="{{$value['bank']}}" readonly></td>

        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Nominal {{$key+1}}</b></td>
          <td></td>
          <td><input type="text" id="trf{{$key}}" required="required" name="bank[{{$key}}][trf]" class="form-control" value="{{$value['trf']}}" readonly></td>

        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Catatan {{$key+1}}</b></td>
          <td></td>
          <td><input type="text" id="catatan{{$key}}" required="required" name="bank[{{$key}}][catatan]" class="form-control" value="{{$value['catatan']}}" readonly></td>

        </tr>
        @endforeach
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
    $(function () {
        var tgl = $('#tgl').val();
        var canvaser = $('#canvaser').val();
        var downline = $('#downline').val();
        var t = $('#invoice-dompul-table').DataTable({
                  serverSide: true,
                  processing: true,
                  searching:  false,
                  ajax: `/edit_invoice_dompul/${canvaser}/${tgl}/${downline}`,
                  columns: [
                      {data: 'produk'},
                      {data: 'tipe_dompul'},
                      {data: 'harga_dompul'},
                      {data: 'qty'},
                      {data: 'qty_program'},
                      {data: 'total_harga'}
                  ]
              });
    });
</script>
@stop
