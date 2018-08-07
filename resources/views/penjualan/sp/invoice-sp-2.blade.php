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
<form class="invoice-sp" action="" method="post">
  <input type="hidden" name="id" id="id" value="{{$penjualanSp->id_penjualan_sp}}" disabled>
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
      <input class="datepicker" data-date-format="dd-mm-yyyy" id="tgl" value="{{$penjualanSp->tanggal_penjualan_sp}}">
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
    <tfoot>
      <tr>
        <td></td>
        <td></td>
        <td colspan="2"><b>Grand Total</b></td>
        <td></td>
        <td>
          <!-- @isset($total)
          <input type="text" class="form-control" name="total" id="total" value="{{$total}}" readonly>
          @endisset -->
        </td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td colspan="2"><b>Jumlah Tunai</b></td>
        <td></td>
        <td>
        <input type="text" id="tunai" required="required" name="tunai" class="form-control" value="{{session('tunai')}}" onkeyup="inputTunai(this.value)">
        </td>
        <td></td>

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
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td colspan="2"><b>Jumlah Transfer 1</b></td>
        <td></td>
        <td><input type="text" id="trf1" name="trf1" class="form-control"></td>
        <td></td>
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
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td colspan="2"><b>Jumlah Transfer 2</b></td>
        <td></td>
        <td><input type="text" id="trf2" name="trf2" class="form-control"></td>
        <td></td>
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
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td colspan="2"><b>Jumlah Transfer 3</b></td>
        <td></td>
        <td><input type="text" id="trf3" name="trf3" class="form-control"></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td colspan="2"><b>Catatan</b></td>
        <td></td>
        <td>
          <input type="text" id="catatan" required="required" name="catatan" class="form-control" value="{{session('catatan')}}" onkeyup="inputCatatan(this.value)">
        </td>
        <td></td>
      </tr>
      <tr>
        <td colspan="7">
          <div class="pull-right">
            <button type="submit" class="btn btn-success" name="button"><span class="glyphicon glyphicon-ok"></span><a href="/penjualan/sp/invoice-sp-3" style="text-decoration:none;"> Lanjutkan</a></button>
          </div>
        </td>
      </tr>
  </tfoot>
</table>
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

                <form id="editForm" method="POST" data-parsley-validate class="form-horizontal form-label-left" action="">
                  @csrf @method('put')
                  <!-- <input type="hidden" name="update_catatan" id="update_catatan" value="{{session('catatan')}}">
                  <input type="hidden" name="update_tunai" id="update_tunai" value="{{session('tunai')}}"> -->
                  <div class="form-group kode">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe sp
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select name="tipe" required="required" id="tipe">
                        <option value="CVS">CVS</option>
                        <option value="DS">DS</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group nama">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Qty Program
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="qty_program" required="required" name="qty_program" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>/


                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="reset">Reset</button>
                      <input type="submit" class="btn btn-success" value="Simpan">
                    </div>
                  </div>
                </form>
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
                      {data: 'harga_total'},
                      {data: 'action', orderable: false, searchable: false}
                  ]
              });
    });
</script>
{{-- <script>
  $('#editModal').on('show.bs.modal', function (event) {
    var tgl = $('#tgl').val();
    var canvaser = $('#canvasser').val();
    var downline = $('#downline').val();
    var tipe = document.getElementById("tipe");

    var button = $(event.relatedTarget) // Button that triggered the modal
    var produk = button.data('produk') // Extract info from data-* attributes
    var tipe_harga = button.data('tipe')
    var no_faktur = button.data('faktur')
    var qty_program = button.data('qty')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    while (tipe.firstChild) {
        tipe.removeChild(tipe.firstChild);
    }
    var default_opt = document.createElement('option');
    default_opt.value = 'default';
    default_opt.innerHTML = '-- Pilih Tipe sp --';
    tipe.appendChild(default_opt);
    tipe_harga.forEach(element => {
      var opt = document.createElement('option');
      opt.value = element.tipe_harga_sp;
      opt.innerHTML = element.tipe_harga_sp;
      tipe.appendChild(opt);
    });
    $('#qty_program').val(qty_program);
    $('#editForm').attr('action', `/invoice_sp/update/${canvaser}/${tgl}/${downline}/${produk}/${no_faktur}/0`);
  })
</script> --}}
@stop
