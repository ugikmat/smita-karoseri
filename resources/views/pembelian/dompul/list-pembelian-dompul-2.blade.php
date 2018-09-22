@extends('adminlte::page')

@section('title', 'List Invoice')

@section('content_header')
    <h1>Edit Pembelian Dompul RO</h1>
@stop

@section('content')
<div class="container-fluid form-inline">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      No Pembelian&nbsp;: (no_pembelian)
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      Nama Sales&nbsp;: (nama_sales)
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      HP Sales&nbsp;: (hp_sales)
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      HP Kios&nbsp;: (hp_kios)
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      Nama Kios&nbsp;: (Nama_kios)
    </div>
  </div>
</div>
<br>
<form action="/operasional/smita/pembelian/dompul/list/store" method="post" class="repeater">
  @csrf
  <input type="hidden" name="id_pembelian" id="id_pembelian" value="{{$pembelianDompul->id_pembelian_dompul}}">
  <div id="deleted">

  </div>
<table id="list-edit-invoice-table" class="table responsive"  width="100%">
    <thead>
    <tr>
      @if($pembelianDompul->status_pembayaran==0)
      {{-- <th>No</th> --}}
        <th>Uraian</th>
        <th>Tipe</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Harga Total</th>
        <th>Action</th>
      @else
              {{-- <th>No</th> --}}
        <th>Uraian</th>
        <th>Tipe</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Harga Total</th>
      @endif
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
        <input type="hidden" id="id" name="id" class="form-control" value="">
        @if($pembelianDompul->status_pembayaran==0)
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-3">
          <b>Pembayaran</b>
          <br>
          <select name="bank" id="bank" style="height: calc(3.5rem - 2px); width:100%" required>
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
          <input type="text" id="trf" name="trf" class="form-control" value="" autocomplete="off" required>
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
        @else
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-3">
          <b>Pembayaran</b>
          <br>
          <input type="text" name="bank" id="bank" class="form-control" value="" readonly>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-3">
          <b>Nominal</b>
          <br>
          <input type="text" id="trf" name="trf" class="form-control" value="" readonly>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
          <b>Catatan</b>
          <br>
          <input type="text" id="catatan" name="catatan" class="form-control" value="" readonly>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
          <br>
        </div>
        @endif
      </div>
    <hr>
    </div>
  </div>
@if($pembelianDompul->status_pembayaran==0)
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
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Simpan</button>
    <br><br>
  </div>
</div>
@else
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
    <br><br>
  </div>
</div>
@endif
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
        <h4 class="modal-title" id="myModalLabel">Edit Penjualan Dompul</h4>
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
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Dompul
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select name="tipe" required="required" id="tipe" class="form-control col-md-7 col-xs-12">

                      </select>
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

<!--Modal Hapus-->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="deleteForm" action="" method="POST">
        @csrf @method('delete')
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Apakah Anda Yakin ingin menghapus?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-danger" value="Hapus">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>

@stop

@section('js')
<script>
    $(document).ready(function () {
        $('#selisih').val((parseFloat($('#total').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))-parseFloat($('#total_pembayaran').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))).toLocaleString('id-ID'));
        var indeks = 0;
        var bayar=0;
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
                if(confirm('Apakah anda yakin ingin menghapus pembayaran dompul ini?')) {
                    $(this).slideUp(deleteElement);
                }
                $('#deleted').append(`<input type='hidden' id='delete' name="delete[${indeks++}]" value='${$('#id', $(this)).val()}'>`);
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
        repeater.setList([
          @if($pembelianDompul->status_pembayaran==0)
            @foreach($detailPembayaranDompul as $item)
            {
                  'id': "{{$item->id_detail_pembayaran_dompul}}",
                  'bank': "{{$item->metode_pembayaran}}",
                  'trf' : "{{number_format($item->nominal,3,",",".")}}",
                  'catatan' : "{{$item->catatan}}"
              },
            @endforeach
          @else
            @foreach($detailPembayaranDompul as $item)
            {
                  'id': "{{$item->id_detail_pembayaran_dompul}}",
                  'bank': "{{$item->metode_pembayaran}}",
                  'trf' : "{{number_format($item->nominal,3,",",".")}}",
                  'catatan' : "{{$item->catatan}}"
              },
            @endforeach
          @endif
        ]);
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
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $(function () {
        var id_pembelian = $('#id_pembelian').val();
        @if($pembelianDompul->status_pembayaran==0)
          var t = $('#list-edit-invoice-table').DataTable({
            serverSide: true,
            processing: true,
            searching:  false,
            ajax: `/operasional/smita/pembelian_dompul/detail/${id_pembelian}`,
            columns: [
              {data: 'produk'},
              {data: 'tipe_harga'},
              {data: 'harga_satuan'},
              {data: 'jumlah'},
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
            t.ajax.url(`/operasional/smita/pembelian_dompul/detail/${id_pembelian}`).load();
            $('#total').val(response.total.toLocaleString('id-ID'));
            $('#selisih').val((parseFloat($('#total').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))-parseFloat($('#total_pembayaran').val().replace(/[ .]/g, '').replace(/[ ,]/g, '.'))).toLocaleString('id-ID'));
          }
          }, 'json');
        });
        @else
          $('#list-edit-invoice-table').DataTable({
            serverSide: true,
            processing: true,
            stateSave: true,
            searching:  false,
            ajax: `/operasional/smita/pembelian_dompul/detail/${id_pembelian}`,
            columns: [
              {data: 'produk'},
              {data: 'tipe_harga'},
              {data: 'harga_satuan'},
              {data: 'jumlah'},
              {data: 'total_harga'}
            ]
        });
        @endif

    });
</script>
<script>
  $('#editModal').on('show.bs.modal', function (event) {

    var tipe = document.getElementById("tipe");

    var button = $(event.relatedTarget) // Button that triggered the modal
    var produk = button.data('produk') // Extract info from data-* attributes
    var tipe_harga = button.data('tipe')
    var tipe_dompul = button.data('tipe_dompul')
    var qty = button.data('qty')
    var id = button.data('id')
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
    console.log(tipe_harga);
    tipe_harga.forEach(element => {
      var opt = document.createElement('option');
      opt.value = element.tipe_harga_dompul;
      opt.innerHTML = element.tipe_harga_dompul;
      tipe.appendChild(opt);
    });
    tipe.value=tipe_dompul;
    // $('#qty_program').val(qty.toLocaleString('id-ID'));
    console.log(produk);
    $('#link').val(`/pembelian/dompul/list/update/${id}`);
  })
</script>
@stop
