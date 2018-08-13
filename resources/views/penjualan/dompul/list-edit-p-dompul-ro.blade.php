@extends('adminlte::page')

@section('title', 'List Invoice')

@section('content_header')
    <h1>Edit Penjualan Dompul RO</h1>
@stop

@section('content')
<input type="hidden" name="tgl" id="tgl" value="{{$datas->tanggal_transfer}}">
<input type="hidden" name="customer" id="customer" value="{{$datas->nama_downline}}">
<input type="hidden" name="sales" id="sales" value="{{$datas->nama_canvasser}}">
<input type="hidden" name="status_pembayaran" id="status_pembayaran" value="{{$penjualanDompul->status_pembayaran}}">
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
        No Penjualan
      </div>
      <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
        <strong>
        : {{$datas->id_penjualan_dompul}}
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
        : {{$datas->nama_canvasser}}
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
        : {{$datas->no_hp_canvasser}}
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
        : {{$datas->no_hp_downline}}
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
        : {{$datas->nama_downline}}
        </strong>
      </div>
    </div>
  </div>
</div>
<form action="/list_invoice_dompul/update" method="post">
  @csrf
  <input type="hidden" name="id" id="id" value="{{$datas->id_penjualan_dompul}}">
<table id="list-edit-invoice-table" class="table responsive"  width="100%">
    <thead>
    <tr>
      @if($penjualanDompul->status_pembayaran==0)
      {{-- <th>No</th> --}}
        <th>Uraian</th>
        <th>Tipe</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Jumlah Program</th>
        <th>Harga Total</th>
        <th>Action</th>
      @else
              {{-- <th>No</th> --}}
        <th>Uraian</th>
        <th>Tipe</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Jumlah Program</th>
        <th>Harga Total</th>
      @endif
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
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Jumlah Tunai</b></td>
          <td></td>
          <td>
            @if($penjualanDompul->status_pembayaran==0)
              <input type="text" id="tunai" name="tunai" class="form-control" value="{{number_format($penjualanDompul->bayar_tunai,0,",",".")}}" required="required">
            @else
              <input type="text" id="tunai" name="tunai" class="form-control" value="{{number_format($penjualanDompul->bayar_tunai,0,",",".")}}" readonly >
            @endif
          </td>
          
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Bank Transfer 1</b></td>
          <td></td>
          <td>
            <select name="bank1">
              <option value="">-- pilih bank --</option>
              <option value="BCA Pusat">BCA Pusat</option>
              <option value="BCA Cabang">BCA Cabang</option>
              <option value="BRI">BRI</option>
              <option value="BNI">BNI</option>
              <option value="Mandiri">Mandiri</option>
            </select>
          </td>
          
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Jumlah Transfer 1</b></td>
          <td></td>
          @if($penjualanDompul->status_pembayaran==0)
              <td><input type="text" id="trf1" name="trf1" class="form-control" value=""></td>
            @else
              <td><input type="text" id="trf1" name="trf1" class="form-control" readonly></td>
            @endif
          
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Bank Transfer 2</b></td>
          <td></td>
          <td>
            <select name="bank2">
              <option value="">-- pilih bank --</option>
              <option value="BCA Pusat">BCA Pusat</option>
              <option value="BCA Cabang">BCA Cabang</option>
              <option value="BRI">BRI</option>
              <option value="BNI">BNI</option>
              <option value="Mandiri">Mandiri</option>
            </select>
          </td>
          
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Jumlah Transfer 2</b></td>
          <td></td>
          @if($penjualanDompul->status_pembayaran==0)
              <td><input type="text" id="trf2" name="trf2" class="form-control" value=""></td>
            @else
              <td><input type="text" id="trf2" name="trf2" class="form-control" value="" readonly></td>
            @endif
          
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Bank Transfer 3</b></td>
          <td></td>
          <td>
            <select name="bank3">
              <option value="">-- pilih bank --</option>
              <option value="BCA Pusat">BCA Pusat</option>
              <option value="BCA Cabang">BCA Cabang</option>
              <option value="BRI">BRI</option>
              <option value="BNI">BNI</option>
              <option value="Mandiri">Mandiri</option>
            </select>
          </td>
          
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Jumlah Transfer 3</b></td>
          <td></td>
          @if($penjualanDompul->status_pembayaran==0)
              <td><input type="text" id="trf3" name="trf3" class="form-control" value=""></td>
            @else
              <td><input type="text" id="trf3" name="trf3" class="form-control" value="" readonly></td>
            @endif
          
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2"><b>Catatan</b></td>
          <td></td>
          @if($penjualanDompul->status_pembayaran==0)
              <td><input type="text" id="catatan" required="required" name="catatan" class="form-control" value="{{$penjualanDompul->catatan}}"></td>
            @else
              <td><input type="text" id="catatan" readonly name="catatan" class="form-control" value="{{$penjualanDompul->catatan}}"></td>
            @endif
          
        </tr>
        <tr>
          <td colspan="6">
            <div class="pull-right">
              @if($penjualanDompul->status_pembayaran==0)
              <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Selesai</button>
            @else
              {{-- <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span><a href="{{url()->previous()}}">Kembali</a></button> --}}
            @endif
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

                  <input type="hidden" name="link" id="link" value="/invoice_dompul/update/{{$datas->nama_canvasser}}/{{$datas->tanggal_transfer}}/{{$datas->nama_downline}}/{{$datas->produk}}">
                  <div class="form-group kode">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Dompul
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select name="tipe" required="required" id="tipe">

                      </select>
                    </div>
                  </div>

                  <div class="form-group nama">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Qty Program
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" required="required" id="qty_program" name="qty_program" class="form-control col-md-7 col-xs-12" value="">
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
    $(function () {
        var tgl = $('#tgl').val();
        var sales = $('#sales').val();
        var customer = $('#customer').val();
        if($('#status_pembayaran').val()==0){
          var t = $('#list-edit-invoice-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: `/edit_list_invoice_dompul/${sales}/${tgl}/${customer}`,
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
        $(`#save`).on('click',function (event) {
      //ajax call
        $.post(`${$('#link').val()}`, { tipe: $('#tipe').val(), qty_program: $('#qty_program').val() })
        .done(function(response){
          if(response.success)
          {
            console.log('success')
            console.log(response.total);
            t.ajax.url(`/edit_list_invoice_dompul/${sales}/${tgl}/${customer}`).load();
            $('#total').val(response.total.toLocaleString('id-ID'));
          }
          }, 'json');
        });
        }else{
          $('#list-edit-invoice-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: `/edit_list_invoice_dompul/${sales}/${tgl}/${customer}`,
            columns: [
              {data: 'produk'},
              {data: 'tipe_dompul'},
              {data: 'harga_dompul'},
              {data: 'qty'},
              {data: 'qty_program'},
              {data: 'total_harga'}
            ]
        });
        }
        
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
    console.log(produk);
    $('#link').val(`/invoice_dompul/update/${canvaser}/${tgl}/${downline}/${produk}/${no_faktur}/1`);
  })
</script>
@stop
