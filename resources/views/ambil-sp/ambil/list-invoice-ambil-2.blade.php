@extends('adminlte::page')

@section('title', 'List Invoice')

@section('content_header')
    <h1>Edit Pengambilan SP</h1>
@stop

@section('content')
<input type="hidden" name="tgl" id="tgl" value="{{$pengambilanSP->tanggal_pengambilan_sp}}">
<input type="hidden" name="sales" id="sales" value="{{$sales->nm_sales}}">
<div class="container-fluid">
  <div class="row">
    <!-- kalo ga ada no pengambilan ato no embo pokoe, hapus ae -->
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        No Penjualan
      </div>
      <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
        <strong>
        : {{$pengambilanSP->id_pengambilan_sp}}
        </strong>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        Nama Canvaser
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
        HP Canvaser
      </div>
      <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
        <strong>
        : {{$sales->no_hp}}
        </strong>
      </div>
    </div>
  </div>
</div>
<form action="/list_invoice_SP/store" method="post" class="">
  @csrf
  <div id="deleted">

  </div>
  <input type="hidden" name="id" id="id" value="{{$pengambilanSP->id_pengambilan_sp}}">
<table id="list-edit-invoice-table" class="table responsive"  width="100%">
    <thead>
    <tr>
      @if($pengambilanSP->status_pengambilan==0)
        <th>Nama Barang</th>
        <th>Tipe Harga</th>
        {{-- <th>Harga Satuan</th> --}}
        <th>Jumlah</th>
        <th>Action</th>
      @else
        <th>Nama Barang</th>
        <th>Tipe Harga</th>
        {{-- <th>Harga Satuan</th> --}}
        <th>Jumlah</th>
      @endif
    </tr>
    </thead>
    {{-- <tfoot>
      <tr>
        <td></td>
        <td></td>
        <td>Total Pengambilan</td>
        <!-- totale seng diambil, sum jumlah -->
        <td>totale piro</td>
      </tr>
    </tfoot> --}}
</table>
@if($pengambilanSP->status_pengambilan==0)
{{-- <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Simpan</button> --}}
@endif

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
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Pengambilan
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="jumlah" required="required" name="jumlah" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="reset">Reset</button>
                      <!-- kembali ke list invoice ambil -->
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

    // gaada pembayaran blassssss

    $(document).ready(function () {
        $('#selisih').val((parseInt($('#total').val().replace(/\D/g,''),10)-parseInt($('#total_pembayaran').val().replace(/\D/g,''),10)).toLocaleString('id-ID'));
        var indeks = 0;
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
        if({{$pengambilanSP->status_pengambilan}}==0){
          var t= $('#list-edit-invoice-table').DataTable({
            serverSide: true,
            processing: true,
            stateSave: true,
            searching:  false,
            ajax: `/pengambilan_sp/detail/${id}`,
            columns: [
              {data: 'nama_produk'},
                      {data: 'tipe_harga'},
                      {data: 'jumlah'},
                      {data: 'action', orderable: false, searchable: false}
            ]
        });
        }else{
          var t= $('#list-edit-invoice-table').DataTable({
            serverSide: true,
            processing: true,
            searching:  false,
            stateSave: true,
            ajax: `/pengambilan_sp/detail/${id}`,
            columns: [
              {data: 'nama_produk'},
                      {data: 'tipe_harga'},
                      {data: 'jumlah'},
            ]
        });
        }
        $(`#save`).on('click',function (event) {
          //ajax call
            $.post(`${$('#link').val()}`, { tipe: $('#tipe').val(), jumlah: $('#jumlah').val() })
            .done(function(response){
          if(response.success)
          {
            console.log('success')

            t.ajax.url(`/pengambilan_sp/detail/${id}`).load();
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
    // var downline = $('#customer').val();
    var tipe = document.getElementById("tipe");
    var button = $(event.relatedTarget) // Button that triggered the modal
    var produk = button.data('produk') // Extract info from data-* attributes
    var tipe_harga = button.data('tipe')
    var no_faktur = button.data('faktur')
    var id = button.data('id')
    var id_detail = button.data('id_detail')
    $('#jumlah').val(button.data('qty'));
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
    $('#link').val(`/pengambilan_sp/update/${id}/${id_detail}`);
  })
</script>
@stop
