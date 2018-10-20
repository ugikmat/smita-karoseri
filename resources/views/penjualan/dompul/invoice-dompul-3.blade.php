@extends('adminlte::page')

@section('title', 'Penjualan Dompul')

@section('content_header')
    <h1>Tambah Penjualan Dompul RO</h1>
@stop

@section('css')
<style>
td{
  background-color: white;
}
</style>
@stop

@section('content')
<div class="container-fluid">
  @isset($datas)
    <input type="hidden" name="tgl" id="tgl" value="{{$datas->tanggal_transfer}}">
  @endisset
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        HP Sales :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
        @isset($datas)
           {{$datas->no_hp_canvasser}}
        @endisset
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Nama Sales :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
        @isset($datas)
          <input type="text" name="canvasser" id="canvasser" value="{{$datas->nama_canvasser}}" disabled>
        @endisset
      </div>
    </div>
  </div>
  <div class="row">
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
        <input type="text" name="downline" id="downline" value="{{$datas->nama_downline}}" disabled>
        @endisset
      </div>
    </div>
  </div>
</div>
<form class="invoice-dompul repeater" action="/smita/penjualan/dompul/verify/{{$datas->nama_canvasser}}/{{$datas->tanggal_transfer}}/{{$datas->nama_downline}}" method="post">
  @csrf
  <input type="hidden" name="lokasi" value="{{$lokasi}}">
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
        <th>Action</th>
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
      @isset($total)
        <input type="text" class="form-control" name="total" id="total" value="{{$total}}" readonly>
      @endisset
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
        <div class="col-xs-3">
          <b>Pembayaran</b>
          <br>
          <select name="bank" id="bank" style="height: calc(3.5rem - 2px); width:100%" required="required">
            <option value="">-- Cara Pembayaran --</option>
            <option value="Cash">Cash</option>
            <option value="BCA Pusat">BCA Pusat</option>
            <option value="BCA Cabang">BCA Cabang</option>
            <option value="BRI">BRI</option>
            <option value="BNI">BNI</option>
            <option value="Mandiri">Mandiri</option>
          </select>
        </div>
        <div class="col-xs-3">
          <b>Nominal</b>
          <br>
          <input type="text" id="trf" name="trf" class="form-control"  value="" required autocomplete="off">
        </div>
        <div class="col-xs-3">
          <b>Catatan</b>
          <br>
          <input type="text" id="catatan" name="catatan" class="form-control" value="" autocomplete="off">
        </div>
        <div class="col-xs-3">
          <br>
          <button data-repeater-delete type="button" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Delete</button>
        </div>
        <hr>
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
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Lanjutkan</button>
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
          <span aria-hidden="true">?</span>
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

                  <input type="hidden" name="link" id="link" value="/invoice_dompul/update/{{$datas->nama_canvasser}}/{{$datas->tanggal_transfer}}/{{$datas->nama_downline}}/{{$datas->produk}}">
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Dompul
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select name="tipe" class="form-control col-md-7 col-xs-12" required="required" id="tipe">

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
                      <input type="button" class="btn btn-success" id="save" value="Simpan" data-dismiss="modal">
                      {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button> --}}
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
                if(confirm('Apakah anda yakin ingin menghapus pembayaran dompul ini?')) {
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
        @if(Session::has('bank'))
        repeater.setList([
          @foreach(session('bank') as $item)
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
        $('#selisih').val((parseInt($('#total').val().replace(/\D/g,''),10)-parseInt($('#total_pembayaran').val().replace(/\D/g,''),10)).toLocaleString('id-ID'));
        var bayar=0;
        var tgl = $('#tgl').val();
        var canvaser = $('#canvasser').val();
        var downline = $('#downline').val();
        var t = $('#invoice-dompul-table').DataTable({
                  serverSide: true,
                  processing: true,
                  stateSave: true,
                  ajax: `/smita/edit_invoice_dompul/${canvaser}/${tgl}/${downline}`,
                  columns: [
                      {data: 'produk'},
                      {data: 'tipe_dompul'},
                      {data: 'harga_dompul'},
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
        t.ajax.url(`/smita/edit_invoice_dompul/${canvaser}/${tgl}/${downline}`).load();
        $('#total').val(response.total.toLocaleString('id-ID'));
        $('#selisih').val((parseInt($('#total').val().replace(/\D/g,''),10)-parseInt($('#total_pembayaran').val().replace(/\D/g,''),10)).toLocaleString('id-ID'));
      }
      }, 'json');
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

    $("#qty_program").on("keyup", function(){
      if (this.value.length!=0) {
        var n = parseInt($(this).val().replace(/\D/g,''),10);
        (this).value=n.toLocaleString('id-ID');
      }else{
        (this).value=0;
      }
    });
    // $('#trf').on('keyup', function (event) {
    //   var n = parseInt($(this).val().replace(/\D/g,''),10);
    //   (this).value=n.toLocaleString('id-ID');
    // })
    });
</script>
<script>
  $('#editModal').on('show.bs.modal', function (event) {
    var tgl = $('#tgl').val();
    var canvaser = $('#canvasser').val();
    var downline = $('#downline').val();
    var tipe = document.getElementById("tipe");

    var button = $(event.relatedTarget) // Button that triggered the modal
    var produk = button.data('produk') // Extract info from data-* attributes
    var tipe_harga = button.data('tipe')
    var tipe_dompul = button.data('tipe_dompul')
    var qty = button.data('qty')
    console.log(tipe_harga);
    var no_faktur = button.data('faktur')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    while (tipe.firstChild) {
        tipe.removeChild(tipe.firstChild);
    }
    var default_opt = document.createElement('option');
    default_opt.value = 'default';
    default_opt.innerHTML = '-- Pilih Tipe Dompul --';
    tipe.appendChild(default_opt);
    tipe_harga.forEach(element => {
      var opt = document.createElement('option');
      opt.value = element.tipe_harga_dompul;
      opt.innerHTML = element.tipe_harga_dompul;
      tipe.appendChild(opt);
    });
    tipe.value=tipe_dompul;
    $('#qty_program').val(qty.toLocaleString('id-ID'));
    console.log(produk);
    $('#link').val(`/smita/invoice_dompul/update/${canvaser}/${tgl}/${downline}/${produk}/${no_faktur}/0`);
  })
</script>
@stop
