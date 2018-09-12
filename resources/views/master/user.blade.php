@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
<h1>Daftar User</h1>

@stop

@section('css')
<style>
  tfoot input {
    width: 100%;
    box-sizing: border-box;
  }
</style>
@stop

@section('content')
@if(Session::has('error'))
  <input type="text"  value="{{session('error')}}">
@endif
<table id="user-table" class="table responsive" width="100%">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nama</th>
      <th>Level User</th>
      <th>Email</th>
      <th>Lokasi</th>
      <th>action</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Id</th>
      <th>Nama</th>
      <th>Level User</th>
      <th>Email</th>
      <th>Lokasi</th>
    </tr>
  </tfoot>
</table>

<!-- Modal Tambah -->
<section class="content-header">

  <div class="modal fade bs-example-modal-lg" id='editModal' tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
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

                  <form method="post" data-parsley-validate class="form-horizontal form-label-left" action="/update/user" id="editForm">
                    @csrf @method('put')
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="name" class="form-control col-md-7 col-xs-12" required="required" value="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="username" name="username" class="form-control col-md-7 col-xs-12" required="required" value="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password Lama
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="oldpassword" name="oldpassword" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password Baru
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Konfirmasi Password
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="konfirmasi" name="konfirmasi" class="form-control col-md-7 col-xs-12" value="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12" required="required" value="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">BO
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="bo" required="required" name="bo" placeholder="Pilih Level User" class="form-control col-md-7 col-xs-12">
                          @isset($bosarray)
                            @foreach ($bosarray as $value)
                              <option value="{{$value->id_bo}}">{{$value->nama_bo}}</option>
                            @endforeach
                          @endisset
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Level User
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="level" required="required" name="level" placeholder="Pilih Level User" class="form-control col-md-7 col-xs-12">
                          <option value="Canvaser">Canvaser</option>
                          <option value="Kasir">Kasir</option>
                          <option value="Supervisor">Supervisor</option>
                          <option value="Kepala Cabang">Kepala Cabang</option>
                          <option value="Keuangan">Keuangan</option>
                          <option value="Super Admin">Super Admin</option>
                        </select>
                      </div>
                    </div>

                    <br>
                    <div class='repeater'>
                      <div data-repeater-list="lokasi-user" id="lokasi-user">
                      <div data-repeater-item>
                        <div class="row">
                          <div class="col-xs-6 col-sm-6">
                            Lokasi&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;:&emsp;
                            <select name="lokasi" required class="form-control" id="lokasi" style="height: calc(3.5rem - 2px); width:177px;">
                              @isset($lokasiarray)
                                @foreach($lokasiarray as $lokasi)
                                  <option value="{{$lokasi->id_lokasi}}" id="{{$lokasi->nm_lokasi}}">{{$lokasi->nm_lokasi}}</option>
                                @endforeach
                              @endisset
                            </select>
                            <button data-repeater-delete type="button" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Delete</button>
                          </div>
                        </div>
                        <br>
                      </div>
                    </div>
                  <button data-repeater-create type="button" class="btn btn-warning"> <span class="glyphicon glyphicon-plus"></span> Tambah Lokasi</button>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
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


<!--Modal Hapus-->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" method="POST" id="deleteForm">
        @csrf @method('put')
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
  $(document).ready(function () {
        var repeater = $('.repeater').repeater({
            // (Optional)
            // start with an empty list of repeaters. Set your first (and only)
            // "data-repeater-item" with style="display:none;" and pass the
            // following configuration flag
            // initEmpty: true,
            // (Optional)
            // "defaultValues" sets the values of added items.  The keys of
            // defaultValues refer to the value of the input's name attribute.
            // If a default value is not specified for an input, then it will
            // have its value cleared.
            defaultValues: {
                'lokasi': 1
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
                if(confirm('Apakah anda yakin ingin menghapus Lokasi?')) {
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
            isFirstItemUndeletable: false
        });
        $('#editModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var id = button.data('id')
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          // $('#editForm').attr('action', `/update/user`);
          console.log(button.data('user'));
          console.log(button.data('lokasi'));
          // console.log(modal.find('#editModal .modal-body #nama'));
          // console.log(modal.find('#editModal'));
          // console.log(modal.find('.modal-body input#name').val());
          // console.log(modal.find('.modal-body select'));
          // console.log(modal.find('.modal-body input'));
          // console.log(modal.find('.modal-body'));
          // console.log(modal.find('#nama'));
          modal.find('.modal-body input#name').val(button.data('user').name);
          modal.find('.modal-body input#username').val(button.data('user').username);
          modal.find('.modal-body input#id').val(button.data('user').id_user);
          // modal.find('.modal-body .lokasi input').val(lokasi);
          modal.find('.modal-body select#bo').val(button.data('user').id_bo).change();
          modal.find('.modal-body select#level').val(button.data('user').level_user).change();
          modal.find('.modal-body input#email').val(button.data('user').email);
          // repeater.setList([
          //   button.data('lokasi').forEach(element => {
          //     {
          //       'lokasi': element.id_lokasi,
          //     },
          //   });
          // ]);
        });
    });
</script>
<script>
  $(function () {
    $('#user-table').DataTable({
      serverSide: true,
      processing: true,
      stateSave: true,
      ajax: '/user-data',
      columns: [{
          data: 'id_user'
        },
        {
          data: 'name'
        },
        {
          data: 'level_user'
        },
        {
          data: 'email'
        },
        {
          data: 'nm_lokasi'
        },
        {
          data: 'action',
          orderable: false,
          searchable: false
        }
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
          
</script>
<script>
  $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var id = button.data('id'); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#deleteForm').attr('action', `/delete/user/${id}`);
  })
</script>
@stop
