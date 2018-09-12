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
<br>
<a href="/tambah_user/add-user">
  <button type="button" name="button"> <i class="fa fa-user-plus"></i> Tambah User</button>
</a>


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
