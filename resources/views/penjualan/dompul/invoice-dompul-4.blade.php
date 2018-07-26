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
            <input type="number" name="total" id="total" value="{{$total}}" readonly>
              
            @endisset
          </td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Jumlah Tunai</b></td>
          <td></td>
          <td>
          <input type="text" id="tunai" required="required" name="tunai" class="form-control" value="{{$tunai}}" readonly>
          </td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Bank Transfer 1</b></td>
          <td></td>
          <td><input type="text" id="bank1" required="required" name="bank1" class="form-control" value="{{$bank1}}" readonly></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Jumlah Transfer 1</b></td>
          <td></td>
          <td><input type="text" id="trf1" required="required" name="trf1" class="form-control" value="{{$trf1}}" readonly></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Bank Transfer 2</b></td>
          <td></td>
          <td><input type="text" id="bank2" required="required" name="bank2" class="form-control" value="{{$bank2}}" readonly></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Jumlah Transfer 2</b></td>
          <td></td>
          <td><input type="text" id="trf2" required="required" name="trf2" class="form-control" value="{{$trf2}}" readonly></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Bank Transfer 3</b></td>
          <td></td>
          <td><input type="text" id="bank3" required="required" name="bank3" class="form-control" value="{{$bank3}}" readonly></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Jumlah Transfer 3</b></td>
          <td></td>
          <td><input type="text" id="trf3" required="required" name="trf3" class="form-control" value="{{$trf2}}" readonly></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Catatan</b></td>
          <td></td>
          <td><input type="text" id="catatan" required="required" name="catatan" class="form-control" value="{{$catatan}}" readonly></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="6">
            <div class="pull-right">
              <a href="{{ URL::previous() }}" class="btn btn-success btn-lg">
                <span class="glyphicon glyphicon-chevron-left"></span> Kembali
              </a>
              <div class="pull-right">
                <input type="submit" class="btn btn-success glyphicon glyphicon-ok" value="Simpan">
              </div>
            </div>
          </td>
          <td></td>
        </tr>
    </tfoot>
</table>
</form>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Tambah</button>

@stop

@section('js')
<script>
    $(function () {
        var tgl = $('#tgl').val();
        var canvaser = $('#canvaser').val();
        var downline = $('#downline').val();
        var t = $('#invoice-dompul-table').DataTable({
                  serverSide: true,
                  processing: true,
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
