@extends('adminlte::page') @section('title', 'Produk') @section('content_header')
<h1>Daftar Produk</h1>

@stop @section('css')
<style>
  tfoot input {
    width: 100%;
    box-sizing: border-box;
  }
</style>
@stop @section('content')

<!-- data tabel -->
<table id="produk-table" class="table responsive" width="100%">
  <thead>
    <tr>
      <th>Id</th>
      <th>Kode Produk</th>
      <th>Nama Produk</th>
      <th>Kategori Produk</th>
      <th>Satuan</th>
      <th>Jenis</th>
      <th>BOM</th>
      <th>Harga Jual</th>
      <th>Tarif Pajak</th>
      <th>Diskon</th>
      <th>Komisi</th>
      <th>Status Produk</th>
      @if(Auth::user()->level_user!='Kasir')
      <th>action</th>
      @endif
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Id</th>
      <th>Kode Produk</th>
      <th>Nama Produk</th>
      <th>Kategori Produk</th>
      <th>Satuan</th>
      <th>Jenis</th>
      <th>BOM</th>
      <th>Harga Jual</th>
      <th>Tarif Pajak</th>
      <th>Diskon</th>
      <th>Komisi</th>
    </tr>
  </tfoot>
</table>

<!-- tambah data -->
<section class="content-header">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah</button>

  <div class="modal fade bs-example-modal-lg" id='modalTambah' tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Tambah Produk</h4>
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

                  <form id="tambahForm" method="POST" data-parsley-validate class="form-horizontal form-label-left" action="/operasional/smita/master/produk">
                    @csrf
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Produk
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="kode" required="required" name="kode" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Produk
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nama" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Produk
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="radio-inline">
                          <input type="radio" name="kategori" id="Dompul" value="Dompul">Dompul
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="kategori" id="SP" value="SP">SP
                        </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Satuan
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="satuan" required="required" name="satuan" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="jenis" required="required" name="jenis" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">BOM
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="bom" required="required" name="bom" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Jual
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="jual" required="required" name="jual" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tarif Pajak
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="pajak" required="required" name="pajak" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Diskon
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="diskon" required="required" name="diskon" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Komisi
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="komisi" required="required" name="komisi" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <input type="submit" class="btn btn-success" value="Submit">
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


<!--Modal Edit-->
<div class="modal fade bs-example-modal-lg" id='editModal' tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Produk</h4>
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Produk
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="kode" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group nama">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Produk
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="nama" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Produk
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12 kategori">
                        <label class="radio-inline">
                          <input type="radio" name="kategori" id="Dompul" value="Dompul">Dompul
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="kategori" id="SP" value="SP">SP
                        </label>
                    </div>
                  </div>

                  <div class="form-group satuan">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Satuan
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="satuan" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group jenis">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="jenis" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group bom">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">BOM
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="bom" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group jual">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Jual
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="jual" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group pajak">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tarif Pajak
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="pajak" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group diskon">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Diskon
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="diskon" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>

                  <div class="form-group komisi">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Komisi
                      <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="komisi" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <input type="submit" class="btn btn-success" value="Submit">
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

<!--Modal Hapus-->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" id="deleteForm" method="POST">
        @csrf @method('delete')
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Apakah Anda Yakin ingin menghapus?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-danger" value="Hapus">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop @section('js')
<script>
  $(function () {
    $('#produk-table').DataTable({
      serverSide: true,
      stateSave: true,
      processing: true,
      lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      ajax: '/operasional/smita/produk-data',
      columns: [{
          data: 'id_produk'
        },
        {
          data: 'kode_produk'
        },
        {
          data: 'nama_produk'
        },
        {
          data: 'kategori_produk'
        },
        {
          data: 'satuan'
        },
        {
          data: 'jenis'
        },
        {
          data: 'BOM'
        },
        {
          data: 'harga_jual'
        },
        {
          data: 'tarif_pajak'
        },
        {
          data: 'diskon'
        },
        {
          data: 'komisi'
        },
        {
          data: 'status_produk'
        },
        @if(Auth::user()->level_user!='Kasir')
        {
          data: 'action',
          orderable: false,
          searchable: false
        }
        @endif
      ],
      initComplete: function () {
        this.api().columns().every(function () {
          var column = this;
          var input = document.createElement("input");
          $(input).appendTo($(column.footer()).empty())
            .on('change', function () {
              column.search($(this).val(), false, false, true).draw();
            });
        });
      }
    });
  });
</script>
<script>
  $('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name') // Extract info from data-* attributes
    var id = button.data('id')
    var kode = button.data('kode')
    var kategori = button.data('kategori')
    var satuan = button.data('satuan')
    var jenis = button.data('jenis')
    var bom = button.data('bom')
    var jual = button.data('jual')
    var pajak = button.data('pajak')
    var diskon = button.data('diskon')
    var komisi = button.data('komisi')
    var status = button.data('status')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    $('#editForm').attr('action', `/operasional/smita/master/produk/${id}`);
    modal.find('.modal-body .nama input').val(name)
    modal.find('.modal-body .id input').val(id)
    modal.find('.modal-body .kode input').val(kode)
    modal.find(`.modal-body .kategori #${kategori}`).attr('checked', 'checked');
    modal.find('.modal-body .satuan input').val(satuan)
    modal.find('.modal-body .jenis input').val(jenis)
    modal.find('.modal-body .bom input').val(bom)
    modal.find('.modal-body .jual input').val(jual)
    modal.find('.modal-body .pajak input').val(pajak)
    modal.find('.modal-body .diskon input').val(diskon)
    modal.find('.modal-body .komisi input').val(komisi)
    modal.find('.modal-body .status input').val(status)
  })
</script>
<script>
  $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#deleteForm').attr('action', `/operasional/smita/master/produk/${id}`);
  })
</script>
@stop
