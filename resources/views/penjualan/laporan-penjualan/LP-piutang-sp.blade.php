@extends('adminlte::page')

@section('title', 'Laporan SP')

@section('content_header')
    <h1>Laporan Piutang Penjualan SP</h1>

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
    white-space: nowrap;
  }
  .form-control{
    text-align: center;
    width: auto;
  }
</style>
@stop

@section('content')

<div class="cotainer-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInput" pull-right>Input Tanggal Laporan Penjualan</button>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <strong>Tanggal Cetak Laporan</strong>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        : {{\Carbon\Carbon::now()->format('d-m-Y')}}
      </div>
    </div>
  </div>
</div>
<br><br>

<table id="lp-sp-table" class="table responsive table-bordered" width="100%">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Canvaser</th>
        <th>Kekurangan</th>
    </tr>
    </thead>
</table>

<!--Modal input-->
<div class="modal fade bs-example-modal-lg" id='modalInput' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Input Tanggal</h4>
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
                  <div class="form-group kode">
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
  $('.datepicker').datepicker({
  });
</script>
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $(function () {
        $tgl = $('#tgl').val();
        if($tgl==""){
          $tgl='null';
        }else{
          console.log('No');
        }
        var t = $('#lp-sp-table').DataTable({
            serverSide: true,
            processing: true,
            lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
            scrollX: true,
            stateSave: true,
            ajax: `/operasional/smita/laporan-piutang/sp/${$tgl}`,
            "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
                } ],
            "order": [[ 1, 'asc' ]],
            // columnDefs: [
            //     {
            //         targets:1,
            //         render: function ( data, type, row, meta ) {
            //             if(type === 'display'){
            //                 data = `<a class="link-post" href="/penjualan/laporan-penjualan/LPsp-piutang/${data}">` + data + '</a>';
            //             }
            //             return data;
            //         }
            //     }
            // ],
            columns: [
                {data: 'index'},
                {data: 'nm_sales'},
                {data: 'piutang'},
            ],
            dom: 'lBrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        });
        t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
          } );
        } ).draw();
        // $.post(`/get_laporan_sp/${$tgl}`, function(response){
        //     if(response.success)
        //     {
        //       console.log('Success..');
        //       $('.qty').val(response.qty.toLocaleString('id-ID'));
        //       $('.total').val(response.total.toLocaleString('id-ID'));
        //       $('.cash').val(response.cash.toLocaleString('id-ID'));
        //       $('.bca_pusat').val(response.bca_pusat.toLocaleString('id-ID'));
        //       $('.bca_cabang').val(response.bca_cabang.toLocaleString('id-ID'));
        //       $('.mandiri').val(response.mandiri.toLocaleString('id-ID'));
        //       $('.bni').val(response.bni.toLocaleString('id-ID'));
        //       $('.bri').val(response.bri.toLocaleString('id-ID'));
        //       $('.piutang').val(response.piutang.toLocaleString('id-ID'));
        //       console.log('Loaded');
        //       console.log(response.data);
        //     }
        // }, 'json');
        $('#save').on('click',function(event) {
          $tgl = $('#tgl').val();
          t.ajax.url(`/operasional/smita/laporan-piutang/sp/${$tgl}`).load();
        //   $.post(`/get_laporan_sp/${$tgl}`, function(response){
        //     if(response.success)
        //     {
        //       console.log('Success..');
        //       $('.qty').val(response.qty.toLocaleString('id-ID'));
        //       $('.total').val(response.total.toLocaleString('id-ID'));
        //       $('.cash').val(response.cash.toLocaleString('id-ID'));
        //       $('.bca_pusat').val(response.bca_pusat.toLocaleString('id-ID'));
        //       $('.bca_cabang').val(response.bca_cabang.toLocaleString('id-ID'));
        //       $('.mandiri').val(response.mandiri.toLocaleString('id-ID'));
        //       $('.bni').val(response.bni.toLocaleString('id-ID'));
        //       $('.bri').val(response.bri.toLocaleString('id-ID'));
        //       $('.piutang').val(response.piutang.toLocaleString('id-ID'));
        //       console.log('Loaded');
        //       console.log(response.data);
        //     }
        // }, 'json');
        });
    });
</script>
@stop
