@extends('adminlte::page')

@section('title', 'Laporan SP')

@section('content_header')
    <h1>Laporan Penjualan CVS SP</h1>

@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">
<style>
  td{
    white-space: nowrap;
  }
  th{
    text-align: center;
    white-space: nowrap;
  }
  .form-control{
    text-align: center;
    width: auto;
  }
  #lp-sp-table{
    overflow-x: scroll;
  }
  input{
    width: auto;
  }
  .kiri{
    text-align: center;
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
      <strong>Tanggal Cetak Laporan</strong>
        : {{\Carbon\Carbon::now('Asia/Jakarta')->format('d-m-Y')}}
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <strong>Nama Canvasser :</strong>
        <input type="text" name="canvasser" id="canvasser" value="" disabled>
    </div>
  </div>
</div>
<br><br>

<table id="lp-sp-table" class="table responsive table-bordered" width="100%">
    <thead>
    <tr>
        <th>Nama SP</th>
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
        {{-- <td></td> --}}
        <td><b>Grand Total</b></td>
        <td></td>
        <td></td>
        <td><input type="text" name="total" id="total" class="form-control total" value="" readonly></td>
        <td><input type="text" name="cash" id="cash" class="form-control cash" value="" readonly></td>
        <td><input type="text" name="bca_pusat" id="bca_pusat" class="form-control bca_pusat" value="" readonly></td>
        <td><input type="text" name="bca_cabang" id="bca_cabang" class="form-control bca_cabang" value="" readonly></td>
        <td><input type="text" name="mandiri" id="mandiri" class="form-control mandiri" value="" readonly></td>
        <td><input type="text" name="bri" id="bri" class="form-control bri" value="" readonly></td>
        <td><input type="text" name="bni" id="bni" class="form-control bni" value="" readonly></td>
        <td><input type="text" name="piutang" id="piutang" class="form-control piutang" value="" readonly></td>
      </tr>
    </tfoot>
</table>

<!--Modal input-->
<div class="modal fade bs-example-modal-lg" id='modalInput' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">?</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Input Penjualan CVS SP</h4>
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
                      @if(Session::has('tgl_laporan_sp'))
                      <input class="datepicker col-md-7 col-xs-12" id="tgl" data-date-format="dd-mm-yyyy" value="{{session('tgl_laporan_sp')}}">
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
                      <button type="button" id="save" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-ok"></i>Tampilkan Laporan Penjualan SP</button>
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
          console.log($tgl);
        }
        if($sales==""){
          $sales='null';
        }else{
          console.log($sales);
        }
        var t = $('#lp-sp-table').DataTable({
            serverSide: true,
            processing: true,
            lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
            stateSave: true,
            scrollX: true,
            ajax: `{{ url('/') }}/laporan-penjualan/sp-cvs/${$tgl}/${$sales}`,
            columnDefs: [
                {
                    targets:[1,2,3,4,5,6,7,8,9,10],
                    render: function ( data, type, row, meta ) {
                        if(type === 'display'){
                            data = `<p class="kiri">` + data + '</p>';
                        }
                        return data;
                    }
                }
            ],
            columns: [
                // {data: 'index'},
                {data: 'nama_produk'},
                {data: 'jumlah_sp'},
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
        $.post(`{{ url('/') }}/get_laporan_sp_cvs/${$tgl}/${$sales}`, function(response){
            if(response.success)
            {
              console.log('Success..data');
              //  $('.qty').val(response.qty.toLocaleString('id-ID'));
              $('.total').val(response.total.toLocaleString('id-ID'));
              $('.cash').val(response.cash.toLocaleString('id-ID'));
              $('.bca_pusat').val(response.bca_pusat.toLocaleString('id-ID'));
              $('.bca_cabang').val(response.bca_cabang.toLocaleString('id-ID'));
              $('.mandiri').val(response.mandiri.toLocaleString('id-ID'));
              $('.bni').val(response.bni.toLocaleString('id-ID'));
              $('.bri').val(response.bri.toLocaleString('id-ID'));
              $('.piutang').val(response.piutang.toLocaleString('id-ID'));
              $('#canvasser').val(response.sales);
              console.log('Loaded');
              console.log(response.data);
              console.log(response.piutang);
              console.log($('#piutang').val());
            }
        }, 'json');
        $('#save').on('click',function(event) {
          $tgl = $('#tgl').val();
          $sales = $('#sales').val();
          t.ajax.url(`{{ url('/') }}/laporan-penjualan/sp-cvs/${$tgl}/${$sales}`).load();
          $.post(`{{ url('/') }}/get_laporan_sp_cvs/${$tgl}/${$sales}`, function(response){
            if(response.success)
            {
              console.log('Success..data');
              //  $('.qty').val(response.qty.toLocaleString('id-ID'));
              $('.total').val(response.total.toLocaleString('id-ID'));
              $('.cash').val(response.cash.toLocaleString('id-ID'));
              $('.bca_pusat').val(response.bca_pusat.toLocaleString('id-ID'));
              $('.bca_cabang').val(response.bca_cabang.toLocaleString('id-ID'));
              $('.mandiri').val(response.mandiri.toLocaleString('id-ID'));
              $('.bni').val(response.bni.toLocaleString('id-ID'));
              $('.bri').val(response.bri.toLocaleString('id-ID'));
              $('.piutang').val(response.piutang.toLocaleString('id-ID'));
              $('#canvasser').val(response.sales);
              console.log('Loaded');
              console.log(response.data);
              console.log(response.piutang);
              console.log($('#piutang').val());
            }
        }, 'json');
        });
    });
</script>
@stop
