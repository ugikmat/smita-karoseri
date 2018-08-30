@extends('adminlte::page')

@section('title', 'Edit PBB')

@section('content_header')
    <h1>Material PBB</h1>

@stop

@section('content')

<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-truck"></i> Karoseri</a></li>
  <li class="active">Edit Material PBB</li>

</ol>


<!-- Identitas -->
<section class="invoice">
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      <address>{{$data['id_pbb']}}/PBB/{{$rmpbb}}/{{$thnpbb}}<br>
        {{$data['nm_cust']}}<br>
        {{$data['nm_perusahaan']}}<br>
        {{$data['jenis_karoseri']}}<br>
        {{$data['jumlah']}}
      </address>
    </div><!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b><label>Pemohon:</label></b><br><b>{{$data['pemohon']}}</b>
    </div><!-- /.col -->
  <!--  <div class="form-group mb-1 col-sm-3 col-md-4">
        <input type="text" id="gudang" name="gudang" required="required" class="form-control col-md-7 col-xs-12" value="Gudang: {{$data['alamat_gudang']}} | Lokasi: {{$data['nm_lokasi']}}" readonly>
    </div>-->
  </div><!-- /.row -->

  <!-- DataTable -->

    <div class="box-body">
      <table id="editpbb-table" class="table table-bordered table-striped">
        <thead>
      <tr>
          <th>Material</th>
          <th>Jumlah Yang Diminta</th>
          <th>Jumlah Yang Disetujui</th>
          <th>Catatan</th>
          <th>Action</th>
      </tr>
      </thead>
  </table>
  </div>
  <div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-2">
      <a id="dec" name="dec" class="btn btn-danger pull-right" type="submit" data-toggle="modal" data-target="#decModal"><i class="fa fa-times-circle"></i>Tolak</a>
    </div>
    <div class="col-md-1">
      <a id="acc" name="acc" class="btn btn-success pull-right" type="submit" data-toggle="modal" data-target="#accModal"><i class="glyphicon glyphicon-ok"></i>Setuju</a>
    </div>
  </div>


  <!-- DataTable -->

  <!--edit -->
  <!--Modal Edit-->
  <!-- modals -->
  <section class="content-header">
    <div class="modal fade bs-example-modal-lg" id="editModal"  tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Edit Permintaan</h4>
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

          <form id="editForm" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">
            @csrf
            @method('put')
            <div class="form-group material">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Material<span class="required"></span>
                </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="material" name="material" required="required" class="form-control col-md-7 col-xs-12" onKeyPress="return kodeScript(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" readonly>
                  </div>
              </div>

              <div class="form-group jumlah">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Yang Diminta<span class="required"></span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="jumlah" name="jumlah" required="required" class="form-control col-md-7 col-xs-12" onKeyPress="return kodeScript(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" readonly>
                    </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Yang Disetujui<span class="required"></span>
                    </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="jumlahsetuju" name="jumlahsetuju" required="required" class="form-control col-md-7 col-xs-12" onKeyPress="return kodeScript(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)">
                      </div>
                  </div>

            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button class="btn btn-primary" type="reset">Reset</button>
                <input type="submit" class="btn btn-success" Value="Simpan">
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
        </section>
              <!-- modals-edit -->

  <!--Modal Hapus-->
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="deleteForm" action="" method="POST">
        @csrf
        @method('delete')
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Hapus Material Ini?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <input type="submit" class="btn btn-danger delete-user" value="Hapus">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="accModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="accForm" action="" method="POST">
        @csrf
        @method('put')
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Setujui permintaan {{$data['id_pbb']}}/PBB/{{$rmpbb}}/{{$thnpbb}}?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <input type="submit" class="btn btn-success" value="Ya">
            <input type="hidden" id="accid" name="accid" value="{{$data['id_pbb']}}">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="decModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="decForm" action="" method="POST">
        @csrf
        @method('put')
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tolak permintaan {{$data['id_pbb']}}/PBB/{{$rmpbb}}/{{$thnpbb}}?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <input type="submit" class="btn btn-danger" value="Ya">
            <input type="hidden" id="decid" name="decid" value="{{$data['id_pbb']}}">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</section>

@stop

@section('js')


<script>
    $(function () {
        $('#editpbb-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '{{route("tab",$data["id_pbb"])}}',
            columns: [
                {data: 'material'},
                {data: 'jumlah'},
                {data: 'jumlah_setuju'},
                {data: 'catatan'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });

    $('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')// Extract info from data-* attributes
    var material = button.data('material')
    var idpbb = button.data('idpbb')
    var wo = button.data('wo')
    var ukuran = button.data('ukuran')
    var jumlah = button.data('jumlah')
    var catatan = button.data('catatan')

    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    //$('#setuju').attr('href', `/permintaan/${id}`);

    $('#editForm').attr('action', `/edit_pbb/${id}`);
    modal.find('.modal-body .material input').val(material)
    modal.find('.modal-body .jumlah input').val(jumlah)
    })

    $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')// Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#deleteForm').attr('action', `/edit_pbb/${id}`);
    })

    $('#accModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = $('#accid').val()// Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#accForm').attr('action', `/accPBB/${id}`);
    })

    $('#decModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = $('#decid').val()// Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#decForm').attr('action', `/decPBB/${id}`);
    })
</script>
@stop
