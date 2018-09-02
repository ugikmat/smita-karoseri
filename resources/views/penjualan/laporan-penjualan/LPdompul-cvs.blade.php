@extends('adminlte::page')

@section('title', 'Laporan Dompul')

@section('content_header')
    <h1>Laporan Penjualan CVS Dompul</h1>

@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">
<style>
  td{
    text-align: center;
    white-space: nowrap;
  }
  th{
    text-align: center;
  }
  .form-control{
    text-align: center;
    width: auto;
  }
  input{
    width: auto;
  }
</style>
@stop

@section('content')

<div class="cotainer-fluid form-inline">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInput" pull-right>Input Tanggal Laporan Penjualan</button>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      Tanggal Cetak Laporan
        : {{\Carbon\Carbon::now('Asia/Jakarta')->format('d-m-Y')}}
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      Nama Canvasser :
        <input type="text" name="canvasser" id="canvasser" value="" disabled>
    </div>
  </div>
</div>
<br><br>

<table id="lp-dompul-table" class="table responsive table-bordered" width="100%">
    <thead>
    <tr>
        <th>Nama Dompul</th>
        <th>Qty</th>
        <th>Harga Satuan</th>
        <th>Harga Total</th>
        <th>Tunai</th>
        <th>BCA Pusat</th>
        <th>BCA Cabang</th>
        <th>Mandiri</th>
        <th>BRI</th>
        <th>BNI</th>
        <th>Kekurangan</th>
    </tr>
    </thead>
    <tfoot>
      <tr>
        <td><b>Grand Total</b></td>
        <td></td>
        <td><input type="text" name="qty" id="qty" class="form-control" value="" readonly></td>
        <td><input type="text" name="total" id="total" class="form-control" value="" readonly></td>
        <td><input type="text" name="cash" id="cash" class="form-control" value="" readonly></td>
        <td><input type="text" name="bca_pusat" id="bca_pusat" class="form-control" value="" readonly></td>
        <td><input type="text" name="bca_cabang" id="bca_cabang" class="form-control" value="" readonly></td>
        <td><input type="text" name="mandiri" id="mandiri" class="form-control" value="" readonly></td>
        <td><input type="text" name="bri" id="bri" class="form-control" value="" readonly></td>
        <td><input type="text" name="bni" id="bni" class="form-control" value="" readonly></td>
        <td><input type="text" name="piutang" id="piutang" class="form-control" value="" readonly></td>
      </tr>
    </tfoot>
</table>

<!--Modal input-->
<div class="modal fade bs-example-modal-lg" id='modalInput' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Input Penjualan CVS Dompul</h4>
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
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pilih Tanggal
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      @if(Session::has('tgl_laporan_dompul'))
                      <input class="datepicker col-md-7 col-xs-12" id="tgl" data-date-format="dd-mm-yyyy" value="{{session('tgl_laporan_dompul')}}">
                    @else
                      <input class="datepicker col-md-7 col-xs-12" id="tgl" data-date-format="dd-mm-yyyy" value="{{Carbon\Carbon::now()->format('d-m-Y')}}">
                    @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pilih Nama Canvasser
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="sales" required="required" name="sales" class="form-control col-md-7 col-xs-12 chosen-select">
                            <option value="" selected disabled>Pilih Nama Canvaser</option>
                            @isset($saless)
                                @foreach ($saless as $data)
                                <option value="{{ $data->id_sales }}">{{ $data->nm_sales }}</option>
                                @endforeach
                            @endisset
                      </select>
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="reset"> <i class="fa fa-repeat"></i> Kosongkan</button>
                      <button type="button" id="save" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-ok"></i>Tampilkan Laporan Penjualan Dompul</button>
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
<script src="{{ asset('/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
  $(function () {
    $(".chosen-select").chosen({width:"59%"});
    $('.datepicker').datepicker({
    });
    @if(Session::has('id_sales'))
    $("#sales").val("{{session('id_sales')}}");
    $("#sales").trigger("chosen:updated");
    @endif
  })
</script>
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    $(function () {
        $tgl = $('#tgl').val();
        $sales = $('#sales').val();
        if($tgl==""){
          $tgl='null';
        }else{
          console.log('No');
        }
        console.log($sales);
        if($sales==""){
          $sales='null';
        }else{
          console.log($sales);
        }
        var t = $('#lp-dompul-table').DataTable({
            serverSide: true,
            processing: true,
            scrollX: true,
            ajax: `/laporan-penjualan/dompul-cvs/${$tgl}/${$sales}`,
            // columnDefs: [
            //     {
            //         targets:0,
            //         render: function ( data, type, row, meta ) {
            //             if(type === 'display'){
            //                 data = `<a class="link-post" href="/penjualan/laporan-penjualan/LPdompul-piutang/${data}">` + data + '</a>';
            //             }
            //             return data;
            //         }
            //     }
            // ],
            columns: [
                // {data: 'index'},
                {data: 'produk'},
                {data: 'jumlah_dompul'},
                {data: 'harga_satuan'},
                {data: 'harga_total'},
                {data: 'index'},
                {data: 'index'},
                {data: 'index'},
                {data: 'index'},
                {data: 'index'},
                {data: 'index'},
                {data: 'index'},
            ],
            dom: 'lBrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        });
        $.post(`/get_laporan_dompul_cvs/${$tgl}/${$sales}`, function(response){
            if(response.success)
            {
              console.log('Success..');
              // $('#qty').val(response.qty.toLocaleString('id-ID'));
              $('#total').val(response.total.toLocaleString('id-ID'));
              $('#cash').val(response.cash.toLocaleString('id-ID'));
              $('#bca_pusat').val(response.bca_pusat.toLocaleString('id-ID'));
              $('#bca_cabang').val(response.bca_cabang.toLocaleString('id-ID'));
              $('#mandiri').val(response.mandiri.toLocaleString('id-ID'));
              $('#bni').val(response.bni.toLocaleString('id-ID'));
              $('#bri').val(response.bri.toLocaleString('id-ID'));
              $('#piutang').val(response.piutang.toLocaleString('id-ID'));
              $('#canvasser').val(response.sales);
              console.log('Loaded');
              console.log(response.data);
            }
        }, 'json');
        $('#save').on('click',function(event) {
          $tgl = $('#tgl').val();
          $sales = $('#sales').val();
          t.ajax.url(`/laporan-penjualan/dompul-cvs/${$tgl}/${$sales}`).load();
          $.post(`/get_laporan_dompul_cvs/${$tgl}/${$sales}`, function(response){
            if(response.success)
            {
              console.log('Success..');
              // $('#qty').val(response.qty.toLocaleString('id-ID'));
              $('#total').val(response.total.toLocaleString('id-ID'));
              $('#cash').val(response.cash.toLocaleString('id-ID'));
              $('#bca_pusat').val(response.bca_pusat.toLocaleString('id-ID'));
              $('#bca_cabang').val(response.bca_cabang.toLocaleString('id-ID'));
              $('#mandiri').val(response.mandiri.toLocaleString('id-ID'));
              $('#bni').val(response.bni.toLocaleString('id-ID'));
              $('#bri').val(response.bri.toLocaleString('id-ID'));
              $('#piutang').val(response.piutang.toLocaleString('id-ID'));
              $('#canvasser').val(response.sales);
              console.log('Loaded');
              console.log(response.data);
            }
        }, 'json');
        });
    });
</script>
@stop
