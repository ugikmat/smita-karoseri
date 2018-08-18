@extends('adminlte::page')

@section('title', 'Penjualan SP')

@section('content_header')
    <h1>Pembayaran Penjualan SP</h1>
@stop

@section('css')
<style>
td{
  background-color: white;
}
</style>
@stop

@section('content')
<form class="invoice-sp repeater" action="/invoice_sp/verify" method="post">
  @csrf
  <input type="hidden" name="id" id="id" value="{{$penjualanSp->id_temp_penjualan_sp}}">

  <input type="hidden" name="data" value="{{$data}}">
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
          Nama Canvaser :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-8">
        @isset($sales)
          <input type="text" name="canvasser" id="canvasser" value="{{$sales->nm_sales}}" disabled>
        @endisset
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          Nama Kios :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        @isset($customer)
        <input type="text" name="downline" id="downline" value="{{$customer->nm_cust}}" disabled>
        @endisset
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

<br><br>

<table id="invoice-sp-table" class="table responsive"  width="100%">
    <thead>
      <tr>
        <th>Nama Barang</th>
        <th>Tipe Harga</th>
        <th>Harga Satuan</th>
        <th>Jumlah</th>
        <th>Qty Program</th>
        <th>Harga Total</th>
        <th>action</th>
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
  <hr>
  <div data-repeater-list="bank-sp">
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
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Pembelian</button>
    <br><br>
  </div>
</div>
</div>
</form>

<!--Modal Edit-->
<div class="modal fade bs-example-modal-lg" id='editModal' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Tipe</h4>
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

                <input type="hidden" name="link" id="link" value="">
                  <input type="hidden" name="update_catatan" id="update_catatan" value="{{session('catatan')}}">
                  <input type="hidden" name="update_tunai" id="update_tunai" value="{{session('tunai')}}">
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe SP
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select name="tipe" required="required" id="tipe" class="form-control col-md-7 col-xs-12">
                        <option value="CVS">CVS</option>
                        <option value="DS">DS</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Qty Program
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="qty_program" required="required" name="qty_program" class="form-control col-md-7 col-xs-12" value="" autocomplete="off">
                    </div>
                  </div>


                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="reset">Reset</button>
                      <!-- <input type="submit" class="btn btn-success" value="Simpan"> -->
                      <input type="button" class="btn btn-success" id="save" value="Simpan" data-dismiss="modal">
                    </div>
                  </div>
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
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
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
                if(confirm('Are you sure you want to delete this element?')) {
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
    $(function () {

        var id = $('#id').val();
        var t = $('#invoice-sp-table').DataTable({
                  serverSide: true,
                  processing: true,
                  ajax: `/edit_invoice_sp/${id}`,
                  columns: [
                      {data: 'nama_produk'},
                      {data: 'tipe_harga'},
                      {data: 'harga'},
                      {data: 'jumlah'},
                      {data: 'jumlah_program'},
                      {data: 'total_harga'},
                      {data: 'action', orderable: false, searchable: false}
                  ]
              });
              $(`#save`).on('click',function (event) {
      //ajax call
        $.post(`${$('#link').val()}`, { tipe: $('#tipe').val(), qty_program: $('#qty_program').val() })
        .done(function(response){
      if(response.success)
      {
        console.log('success')
        console.log(response.total);
        console.log($('#total').val());
        $('#total').val(response.total);
        console.log($('#total').val());
        t.ajax.url(`/edit_invoice_sp/${id}`).load();

        // console.log($('#total').val(response.total));

      }
      }, 'json');
    });
        console.log('{{session('total_harga_sp')}}');
    });
</script>
<script>
  $('#editModal').on('show.bs.modal', function (event) {
    var tipe = document.getElementById("tipe");

    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    var tipe_harga = button.data('tipe')
    var qty_program = button.data('qty')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    while (tipe.firstChild) {
        tipe.removeChild(tipe.firstChild);
    }
    var default_opt = document.createElement('option');
    default_opt.value = 'default';
    default_opt.innerHTML = '-- Pilih Tipe SP --';
    tipe.appendChild(default_opt);
    tipe_harga.forEach(element => {
      var opt = document.createElement('option');
      opt.value = element.tipe_harga_sp;
      opt.innerHTML = element.tipe_harga_sp;
      tipe.appendChild(opt);
    });
    $('#qty_program').val(qty_program);
    // $('#editForm').attr('action', `/invoice_sp/update/${id}`);
    $('#link').val(`/invoice_sp/update/${id}`);
  })
</script>
@stop
