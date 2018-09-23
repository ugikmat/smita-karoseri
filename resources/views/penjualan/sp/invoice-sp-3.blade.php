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
<form class="invoice-sp repeater" action="/operasional/smita/invoice_sp/store" method="post">
  @csrf
  <input type="hidden" name="lokasi" value="{{$lokasi}}">
<input type="hidden" name="id" id="id" value="{{$penjualanSp->id_temp_penjualan_sp}}">
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
            <input class="datepicker" data-date-format="dd-mm-yyyy" id="tgl" value="{{Carbon\Carbon::parse($penjualanSp->tanggal_penjualan_sp)->format('d/m/Y')}}" readonly>
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
      <th>Harga Total</th>
    </tr>
    </thead>
</table>
<br>
<div class="container-fluid" style="background:white;">
  <br>
  <div class="form row">
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
  <div class="form row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
      <b>Total Pembayaran</b>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <input type="text" class="form-control" name="pembayaran" id="total_pembayaran" value="{{$total_pembayaran}}" readonly>
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
      <input type="text" class="form-control" name="selisih" id="selisih" value="{{$selisih}}" readonly>
  </div>
  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

  </div>
  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

  </div>
</div>
  <hr>
  <div data-repeater-list="bank-sp">
    <div data-repeater-item>
      <div class="form row">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-3">
          <b>Pembayaran</b>
          <br>
          <input type="text" id="bank" name="bank" class="form-control" value=""  readonly>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-3">
          <b>Nominal</b>
          <br>
          <input type="text" id="trf" name="trf" class="form-control" value="" required="required" readonly>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
          <b>Catatan</b>
          <br>
          <input type="text" id="catatan" name="catatan" class="form-control" value="" readonly>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
          <br>
        </div>
      </div>
    <hr>
    </div>
  </div>

<div class="row">
  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

  </div>
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

  </div>
  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

  </div>
  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
    <br>
  <a href="{{URL::previous()}}"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</button></a>
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Simpan</button>
    <br><br>
  </div>
</div>
</div>
</form>

@stop

@section('js')
<script>
    $(document).ready(function () {
        var repeater = $('.repeater').repeater({
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
        @if(Session::has('bank-sp'))
        repeater.setList([
          @foreach(session('bank-sp') as $item)
          {
                'bank': "{{$item['bank']}}",
                'trf' : "{{$item['trf']}}",
                'catatan' : "{{$item['catatan']}}"
            },
          @endforeach
        ]);
        @endif
    });
</script>
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
                  stateSave: true,
                  searching:  false,
                  ajax: `/operasional/smita/edit_invoice_sp/${id}`,
                  columns: [
                      {data: 'nama_produk'},
                      {data: 'tipe_harga'},
                      {data: 'harga'},
                      {data: 'jumlah'},
                      {data: 'total_harga'}
                  ]
              });
        console.log('{{session('total_harga_sp')}}');
    });
</script>
@stop
