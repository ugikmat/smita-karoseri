@extends('adminlte::page')

@section('title', 'Tambah User')

@section('content_header')
<h1>Tambah User</h1>

@stop

@section('css')
<style>

</style>
@stop

@section('content')
<!-- <table id="user-table" class="table responsive" width="100%">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Lokasi</th>
      <th>action</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Id</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Lokasi</th>
    </tr>
  </tfoot>
</table> -->

<form class="repeater" action="/new/user" method="post">
@csrf
<div class="container-fluid form-inline">
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      Nama&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;:&emsp;
      <input type="text" id="name" name="name" class="form-control" value="" autocomplete="off" required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      Username&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;:&emsp;
      <input type="text" id="username" name="username" class="form-control" value="" autocomplete="off" required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      Password&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:&emsp;
      <input type="password" id="password" name="password" class="form-control" value="" autocomplete="off" required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      Konfirmasi Password&emsp;&nbsp;:&emsp;
      <input type="password" id="konfirmasi" name="konfirmasi" class="form-control" value="" autocomplete="off" required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      Email&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;:&emsp;
      <input type="email" id="email" name="email" class="form-control" value="" autocomplete="off" required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      BO&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;:&emsp;
      <select class="" name="bo" id="bo" style="height: calc(3.5rem - 2px); width:177px;" required>
        @isset($bosarray)
              @foreach($bosarray as $bo)
                <option value="{{$bo->id_bo}}" id="{{$bo->nama_bo}}">{{$bo->nama_bo}}</option>
              @endforeach
            @endisset
      </select>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      Level User&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;:&emsp;
      <select class="" name="level" id="level" style="height: calc(3.5rem - 2px); width:177px;" required>
        <option value="Canvaser">Canvaser</option>
        <option value="Kasir">Kasir</option>
        <option value="Supervisor">Supervisor</option>
        <option value="Kepala Cabang">Kepala Cabang</option>
        <option value="Keuangan">Super Admin</option>
      </select>
      
    </div>
  </div>
  <br>
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
<br>
  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Tambah User</button>
<br><br>
</form>


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
                if(confirm('Apakah anda yakin ingin menghapus?')) {
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
{{-- <script>
  $(function () {
    $('#user-table').DataTable({
      serverSide: true,
      processing: true,
      ajax: '/user-data',
      columns: [{
          data: 'id_user'
        },
        {
          data: 'name'
        },
        {
          data: 'email'
        },
        {
          data: 'id_lokasi'
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
</script> --}}
<script>
  $('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name') // Extract info from data-* attributes
    var id = button.data('id')
    var lokasi = button.data('lokasi')
    var email = button.data('email')

    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    $('#editForm').attr('action', `/master/supplier/${id}`);
    modal.find('.modal-body .nama input').val(name)
    modal.find('.modal-body .id input').val(id)
    modal.find('.modal-body .lokasi input').val(lokasi)
    modal.find('.modal-body .email input').val(email)

  })
</script>
<script>
  $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var id = button.data('id'); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#deleteForm').attr('action', `/master/user/${id}`);
  })
</script>
@stop
