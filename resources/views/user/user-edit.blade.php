@extends('adminlte::page') @section('title', 'User') @section('content_header')
<h1>Edit User</h1>

@stop @section('css')
<style>
    tfoot input {
        width: 100%;
        box-sizing: border-box;
    }
</style>
@stop @section('content')
<form method="post" data-parsley-validate class="form-horizontal form-label-left" action="/update/user" id="editForm">
    @csrf @method('put')
    <input type="hidden" name="id" id="id" value="{{$data->id_user}}">
    <div id="deleted">

  </div>

  <div class="container-fluid form-inline repeater">
    <div class="row">
      <div class="col-xs-6 col-sm-6">
        Nama&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;:&emsp;
        <input type="text" id="name" name="name" class="form-control" value="{{$data->name}}" autocomplete="off" required>
      </div>
    </div>

  <br>
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      Username&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;:&emsp;
      <input type="text" id="username" name="username" class="form-control" value="{{$data->username}}" autocomplete="off" required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      Password baru&emsp;&emsp;&emsp;&emsp;:&emsp;
      <input type="password" id="password" name="password" class="form-control" value="" autocomplete="off">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      Konfirmasi Password&emsp;&nbsp;:&emsp;
      <input type="password" id="konfirmasi" name="konfirmasi" class="form-control" value="" autocomplete="off">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      Email&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;:&emsp;
      <input type="email" id="email" name="email" class="form-control" value="{{$data->email}}" autocomplete="off" required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      BO&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;:&emsp;
      <select class="" name="bo" id="bo" style="height: calc(3.5rem - 2px); width:177px;" required>
        @isset($bosarray) @foreach ($bosarray as $value)
        <option value="{{$value->id_bo}}">{{$value->nama_bo}}</option>
        @endforeach @endisset
      </select>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      Level User&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;:&emsp;
      <select class="" name="level" id="level" style="height: calc(3.5rem - 2px); width:177px;" required value="{{$data->level_user}}">
        <option value="Canvaser">Canvaser</option>
        <option value="Kasir">Kasir</option>
        <option value="Supervisor">Supervisor</option>
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
              @isset($lokasiarray) @foreach($lokasiarray as $lokasi)
              <option value="{{$lokasi->id_lokasi}}" id="{{$lokasi->nm_lokasi}}">{{$lokasi->nm_lokasi}}</option>
              @endforeach @endisset
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
</section>
@stop @section('js')
<script>
    $(document).ready(function () {
        $('#bo').val({{$data->id_bo}}).change();
        $('#level').val('{{$data->level_user}}').change();
        var indeks =0;
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
                if (confirm('Apakah anda yakin ingin menghapus Lokasi?')) {
                    $(this).slideUp(deleteElement);
                }
                $('#deleted').append(`<input type='hidden' id='delete' name="delete[${indeks++}]" value='${$('#id_users_lokasi', $(this)).val()}'>`);
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

        repeater.setList([
            @foreach($lokasi_data as $value)
              {
                'lokasi': {{$value->id_lokasi}},
                'id_users_lokasi':{{$value->id_users_lokasi}}
              },
            @endforeach
          ]);
    });
</script>
@stop
