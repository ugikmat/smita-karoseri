@extends('adminlte::page')

@section('title', 'List Invoice')

@section('content_header')
    <h1>Edit Penjualan SP</h1>
@stop

@section('content')
<input type="hidden" name="tgl" id="tgl" value="{{$penjualanSP->tanggal_penjualan_sp}}">
<input type="hidden" name="customer" id="customer" value="{{$customer->nm_cust}}">
<input type="hidden" name="sales" id="sales" value="{{$sales->nm_sales}}">
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        No Penjualan
      </div>
      <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
        <strong>
        : {{$penjualanSP->id_penjualan_sp}}
        </strong>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Nama Sales
      </div>
      <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
        <strong>
        : {{$sales->nm_sales}}
        </strong>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        HP Sales
      </div>
      <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
        <strong>
        : {{$sales->no_hp}}
        </strong>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        HP Kios
      </div>
      <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
        <strong>
        : {{$customer->no_hp}}
        </strong>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Nama Kios
      </div>
      <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
        <strong>
        : {{$customer->nm_cust}}
        </strong>
      </div>
    </div>
  </div>
</div>
<form action="/smita/list_invoice_SP/store" method="post" class="repeater">
  @csrf
  <div id="deleted">

  </div>
  <input type="hidden" name="id" id="id" value="{{$penjualanSP->id_penjualan_sp}}">
<table id="list-edit-invoice-table" class="table responsive"  width="100%">
    <thead>
    <tr>
      @if($penjualanSP->status_penjualan==0)
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
      <input type="text" class="form-control" name="total" id="total" value="{{number_format($penjualanSP->grand_total,0,",",".")}}" readonly>
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
        <input type="text" class="form-control" name="pembayaran" id="total_pembayaran" value="{{number_format($total_pembayaran,0,'','.')}}" readonly>
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
        @if($penjualanSP->status_penjualan==0)
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
        @endif
      </div>
    <hr>
    </div>
  </div>
@if($penjualanSP->status_penjualan==0)
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
@endif
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
        <h4 class="modal-title" id="myModalLabel">Edit Penjualan SP</h4>
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe SP
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
                      {{-- <input type="submit" class="btn btn-success" value="Simpan"> --}}
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
          <input type="submit" class="btn btn-danger delete-user" value="Hapus">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </form>
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
        $('#selisih').val((parseInt($('#total').val().replace(/\D/g,''),10)-parseInt($('#total_pembayaran').val().replace(/\D/g,''),10)).toLocaleString('id-ID'));
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
                if(confirm('Apakah anda yakin ingin menghapus pembayaran SP ini?')) {
                    $(this).slideUp(deleteElement);
                }
                $('#deleted').append(`<input type='hidden' id='delete' name="delete[${indeks++}]" value='${$('#id', $(this)).val()}'>`);
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
        repeater.setList([
          @foreach($pembayaran as $item)
          {
                'id': "{{$item->id_detail_pembayaran_sp}}",
                'bank': "{{$item->metode_pembayaran}}",
                'trf' : "{{number_format($item->nominal,0,'','.')}}",
                'catatan' : "{{$item->catatan}}"
            },
          @endforeach
        ]);
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
<script>
    $(function () {
        var id = $('#id').val();
        if({{$penjualanSP->status_penjualan}}==0){
          var t= $('#list-edit-invoice-table').DataTable({
            serverSide: true,
            processing: true,
            stateSave: true,
            searching:  false,
            ajax: `/smita/edit_list_invoice_sp/${id}`,
            columns: [
              {data: 'nama_produk'},
                      {data: 'tipe_harga'},
                      {data: 'harga'},
                      {data: 'jumlah'},
                      {data: 'total_harga'},
                      {data: 'action', orderable: false, searchable: false}
            ]
        });
        }else{
          var t= $('#list-edit-invoice-table').DataTable({
            serverSide: true,
            processing: true,
            searching:  false,
            stateSave: true,
            ajax: `/smita/edit_list_invoice_sp/${id}`,
            columns: [
              {data: 'nama_produk'},
                      {data: 'tipe_harga'},
                      {data: 'harga'},
                      {data: 'jumlah'},
                      {data: 'total_harga'},
            ]
        });
        }
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
            t.ajax.url(`/smita/edit_list_invoice_sp/${id}`).load();
            $('#selisih').val((parseInt($('#total').val().replace(/\D/g,''),10)-parseInt($('#total_pembayaran').val().replace(/\D/g,''),10)).toLocaleString('id-ID'));

            // console.log($('#total').val(response.total));

          }
          }, 'json');
        });
        console.log('{{session('total_harga_sp')}}');
    });
</script>
<script>
  $('#editModal').on('show.bs.modal', function (event) {
    var tgl = $('#tgl').val();
    var canvaser = $('#sales').val();
    var downline = $('#customer').val();
    var tipe = document.getElementById("tipe");

    var button = $(event.relatedTarget) // Button that triggered the modal
    var produk = button.data('produk') // Extract info from data-* attributes
    var tipe_harga = button.data('tipe')
    var no_faktur = button.data('faktur')
    var id = button.data('id')
    var id_detail = button.data('id_detail')
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
    console.log(produk);
    // $('#editForm').attr('action', `/invoice_sp/update/${canvaser}/${tgl}/${downline}/${produk}/${no_faktur}/1`);
    $('#link').val(`/smita/list_invoice_sp/update/${id}/${id_detail}`);
  })
</script>
@stop
