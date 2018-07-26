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
  @isset($tgl)
    <input type="hidden" name="tgl" id="tgl" value="{{$tgl}}">
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
<form class="invoice-dompul" action="/penjualan/dompul/verify/{{$datas->nama_canvasser}}/{{$tgl}}/{{$datas->nama_downline}}" method="post">
  @csrf
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
      <tfoot>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Grand Total</b></td>
          <td></td>
          <td>
            @isset($total)
              {{$total}}
            @endisset
          </td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Jumlah Tunai</b></td>
          <td></td>
          <td><input type="text" id="tunai" required="required" name="tunai" class="form-control" value=""></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Bank Transfer 1</b></td>
          <td></td>
          <td>
            <select name="bank1">
              <option value="" selected>-- pilih bank --</option>
              <option value="bca">BCA</option>
              <option value="bri">BRI</option>
              <option value="bni">BNI</option>
              <option value="mandiri">Mandiri</option>
            </select>
          </td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Jumlah Transfer 1</b></td>
          <td></td>
          <td><input type="text" id="trf1" required="required" name="trf1" class="form-control" value=""></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Bank Transfer 2</b></td>
          <td></td>
          <td>
            <select name="bank2">
              <option value="" selected>-- pilih bank --</option>
              <option value="bca">BCA</option>
              <option value="bri">BRI</option>
              <option value="bni">BNI</option>
              <option value="mandiri">Mandiri</option>
            </select>
          </td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Jumlah Transfer 2</b></td>
          <td></td>
          <td><input type="text" id="trf2" required="required" name="trf2" class="form-control" value=""></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Bank Transfer 3</b></td>
          <td></td>
          <td>
            <select name="bank3">
              <option value="" selected>-- pilih bank --</option>
              <option value="bca">BCA</option>
              <option value="bri">BRI</option>
              <option value="bni">BNI</option>
              <option value="mandiri">Mandiri</option>
            </select>
          </td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Jumlah Transfer 3</b></td>
          <td></td>
          <td><input type="text" id="trf3" required="required" name="trf3" class="form-control" value=""></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Catatan</b></td>
          <td></td>
          <td><input type="text" id="catatan" required="required" name="catatan" class="form-control" value=""></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="6">
            <div class="pull-right">
              <input type="submit" class="btn btn-success glyphicon glyphicon-ok" value="Lanjutkan">
            </div>
            
          {{-- <a href="/penjualan/dompul/verify/{{$datas->nama_canvasser}}/{{$tgl}}/{{$datas->nama_downline}}" class="btn btn-info btn-lg pull-right">
              <span class="glyphicon glyphicon-ok"></span> Lanjutkan
            </a> --}}
          </td>
          <td></td>
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

                <form id="editForm" method="POST" data-parsley-validate class="form-horizontal form-label-left" action="/invoice_dompul/update/{{$datas->nama_canvasser}}/{{$tgl}}/{{$datas->nama_downline}}/{{$datas->produk}}">
                  @csrf @method('put')
                  <div class="form-group kode">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Dompul
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select name="tipe" required="required">
                        <option value="selected" selected>-- Pilih Tipe Dompul --</option>
                        <option value="DS">DS</option>
                        <option value="CVS">CVS</option>
                        <option value="HI">HI</option>
                        <option value="SERVER">SERVER</option>
                        <option value="SDE">SDE</option>
                        <option value="CVS1">CVS1</option>
                        <option value="CVS2">CVS2</option>
                        <option value="CVS3">CVS3</option>
                        <option value="SERVER1">SERVER1</option>
                        <option value="SERVER2">SERVER2</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group nama">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Qty Program
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="qty_program" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>


                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="reset">Reset</button>
                      <input type="submit" class="btn btn-success" value="Simpan">
                      {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button> --}}
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
        var tgl = $('#tgl').val();
        var canvaser = $('#canvasser').val();
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
                      {data: 'total_harga'},
                      {data: 'action', orderable: false, searchable: false}
                  ]
              });
    });
</script>
<script>
  $('#editModal').on('show.bs.modal', function (event) {
    var tgl = $('#tgl').val();
    var canvaser = $('#canvasser').val();
    var downline = $('#downline').val();
    var button = $(event.relatedTarget) // Button that triggered the modal
    var produk = button.data('produk') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#editForm').attr('action', `/invoice_dompul/update/${canvaser}/${tgl}/${downline}/${produk}`);
  })
</script>
@stop
