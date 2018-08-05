@extends('adminlte::page')

@section('title', 'Penjualan SP')

@section('content_header')
    <h1>Detail Penjualan SP</h1>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.min.css') }}">

@stop

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        No. Penjualan
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        :
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama Kios
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        :
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <span class="pull-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLink">Input Data</button></span>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama Kasir
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        :
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama Logistik
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        :
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama PIC
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        :
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        ID Canvaser
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        :
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Nama Canvaser
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        :
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
        Tanggal Penjualan
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
        :
      </div>
    </div>
  </div>
</div>

<form class="repeater">
    <!--
        The value given to the data-repeater-list attribute will be used as the
        base of rewritten name attributes.  In this example, the first
        data-repeater-item's name attribute would become group-a[0][text-input],
        and the second data-repeater-item would become group-a[1][text-input]
    -->
    <div data-repeater-list="group-a">
      <div data-repeater-item>
        <input type="text" name="text-input" value="A"/>
        <input data-repeater-delete type="button" value="Delete"/>
      </div>
      <div data-repeater-item>
        <input type="text" name="text-input" value="B"/>
        <input data-repeater-delete type="button" value="Delete"/>
      </div>
    </div>
    <button data-repeater-create type="button" class="btn btn-success"> <span class="glyphicon glyphicon-plus"></span> Add</button>
</form>

<!-- <table id="invoice-sp-table" class="table responsive" width="100%">
    <thead>
    <tr>
        <th>No.</th>
        <th>Nama RO</th>
        <th>Qty Penjualan</th>
    </tr>
    </thead>
</table> -->

<!--Modal Link-->
<div class="modal fade bs-example-modal-lg" id='modalLink' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Input Penjualan SP</h4>
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

              <form id="editForm" method="POST" data-parsley-validate class="form-horizontal form-label-left" action="/penjualan/dompul/invoice-sp">
                  @csrf
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Canvasser
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control col-md-7 col-xs-12" name="id">
                        <option value="1">pras</option>
                        <option value="3">ugik</option>
                        <option value="2">jovi</option>
                      </select>
                    </div>
                  </div>

                  <!-- ini dinamis mengikuti id canvaser yg dipilih di atas-->
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Kios
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control col-md-7 col-xs-12" name="id">
                        <option value="1">pras</option>
                        <option value="3">ugik</option>
                        <option value="2">jovi</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Penjualan
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="Auto Generate"  disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl Penjualan
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input class="datepicker col-md-7 col-xs-12" required="required" name="tgl" data-date-format="dd-mm-yyyy">
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="reset"> <i class="fa fa-repeat"></i> Kosongkan</button>
                      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Rekap Penjualan</button>
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
    $(document).ready(function () {
        $('.repeater').repeater({
            // (Optional)
            // start with an empty list of repeaters. Set your first (and only)
            // "data-repeater-item" with style="display:none;" and pass the
            // following configuration flag
            initEmpty: true,
            // (Optional)
            // "defaultValues" sets the values of added items.  The keys of
            // defaultValues refer to the value of the input's name attribute.
            // If a default value is not specified for an input, then it will
            // have its value cleared.
            defaultValues: {
                'text-input': 'foo'
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
                if(confirm('Apakah anda yakin ingin menghapus pesanan SP ini?')) {
                    $(this).slideUp(deleteElement);
                }
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
            isFirstItemUndeletable: true
        })
    });
</script>

<!-- <script>
    $(function () {
        if ($('#tgl').val()==undefined) {
          var tgl = null;
        } else {
          var tgl = $('#tgl').val();
        }
        if ($('#canvaser').val()==undefined) {
          var canvaser = null;
        } else {
          var canvaser = $('#canvaser').val();
        }
        var t = $('#invoice-sp-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: `/invoice_dompul/${canvaser}/${tgl}`,
            "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
                } ],
            "order": [[ 1, 'asc' ]],
            columnDefs: [
                {
                    targets:1,
                    render: function ( data, type, row, meta ) {
                        if(type === 'display'){
                            data = `<a class="link-post" href="/penjualan/dompul/${canvaser}/${tgl}/${data}">` + data + '</a>';
                        }
                        return data;
                    }
                }
            ],
            columns: [
                {data: 'indeks'},
                {data: 'nama_downline'},
                {data: 'qty'}
            ]
        });
        t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
          } );
        } ).draw();
    });
</script> -->
<script src="{{ asset('/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
$('.datepicker').datepicker({
});
</script>
@stop
