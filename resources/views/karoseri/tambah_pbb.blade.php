@extends('adminlte::page')

@section('title', 'Tambah PBB')

@section('content_header')
    <h1>Material PBB</h1>

@stop

@section('content')

<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-truck"></i> Karoseri</a></li>
  <li class="active">Tambah Material PBB</li>
</ol>

<!-- Identitas -->
<section class="invoice">
  <form name="add_name" id="add_name">
  <div class="row invoice-info">
    <div class="form-group mb-1 col-sm-3 col-md-2">
      <select id="wo" name="wo" class="form-control" required>
          <option selected disabled value="">Pilih SPK</option>
          @foreach ($spkcarray as $data)
          <?php
          $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
          $tanggal = $data->tanggal;
          $tahun = date('Y', strtotime($tanggal));
          $bulan = date('m', strtotime($tanggal));
          $tgl = date('d', strtotime($tanggal));

          $rom = $blnromawi[$bulan-1]; ?>
            <option value="{{$data->id_spkc}}" name="{{$data->id_spkc}}">{{$data->id_spkc}}/SPK/{{$rom}}/{{$tahun}}</option>
          @endforeach

      </select>
    </div>
    <div class="col-sm-4 invoice-col">
      <address id="address">
        <label id="namacust">Nama Customer</label><br>
        <label id="namaperusahaan">Nama Perusahaan</label><br>
        <label id="jeniskaroseri">Jenis Karoseri</label><br>
        <label id="jumlahunit">Jumlah Unit</label>
      </address>
    </div><!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b><label>Pemohon:</label></b><br><b>{{ Auth::user()->name }}</b>
    </div><!-- /.col -->
    <!--<div class="form-group mb-1 col-sm-3 col-md-2">
      <select id="gudang" name="gudang" class="form-control" required>
          <option selected disabled value="">Pilih Gudang</option>
          @foreach ($gudangarray as $data)
           <option value="{{$data->id_gudang}}">Gudang: {{$data->alamat_gudang}} | Lokasi: {{$data->nm_lokasi}}</option>
          @endforeach
      </select>
    </div>-->
  </div><!-- /.row -->


<!-- Repeater
<div class="container">
 <div class="starter-template">
  <div class="controls">
   <input class="form-control" name="idmyproject" type="hidden" value="">
   <div class="form-group">
    <div class="entry input-group">
      <div class="box-body">
      <div class="row">
                  <div class="form-group mb-1 col-sm-3 col-md-2">
                    <select id="material" name="material" class="form-control" required>
                        <option selected disabled value="">Pilih Material</option>
                        @foreach ($produkarray as $data)
                          <option value="{{$data->id_produk}}">{{$data->nama_produk}}</option>
                        @endforeach
                    </select>
                  </div>
                    <div class="form-group mb-1 col-sm-3 col-md-2">
                        <input type="text" id="satuan" placeholder="Satuan" class="form-control" readonly>
                    </div>
                    <div class="form-group mb-1 col-sm-3 col-md-2">
                        <input type="text" id="" placeholder="Ukuran" class="form-control" required>
                    </div>
                    <div class="form-group mb-1 col-sm-3 col-md-2">
                      <input type="text" id="" placeholder="Jumlah" class="form-control" required>
                    </div>
                    <div class="form-group mb-1 col-sm-3 col-md-2">
                      <input type="text" id="" placeholder="Catatan" class="form-control" required>
                    </div>
     <span class="input-group-btn">
      <button class="btn btn-success btn-add" type="button">
       <span class="glyphicon glyphicon-plus"></span>
      </button>
     </span>
    </div>
   </div>
  </div>
 </div>
</div>
</div>
</div>-->

<div class="container">
    <div class="form-group">



            <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
            </div>


            <div class="alert alert-success print-success-msg" style="display:none">
            <ul></ul>
            </div>


            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td>
                          <select id="material" name="material[]" class="form-control" required>
                            <option selected disabled value="">Pilih Material</option>
                            @foreach ($produkarray as $data)
                              <option value="{{$data->nama_produk}}" name="{{$data->nama_produk}}">{{$data->nama_produk}}</option>
                            @endforeach
                          </select>
                        </td>
                        <td><input type="text" name="ukuran[]" placeholder="Ukuran" class="form-control name_list" /></td>
                        <td><input type="text" name="jumlah[]" placeholder="Jumlah" class="form-control name_list numonly" /></td>
                        <td><input type="text" name="catatan[]" placeholder="Catatan" class="form-control name_list" /></td>
                        <td><input type="hidden" name="pemohon[]" placeholder="Pemohon" class="form-control name_list" value="{{Auth::user()->name}}"/></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button></td>
                    </tr>
                </table>
                <div align="right">
                <input type="button" name="submit" id="submit" class="btn btn-primary btn-md" value="Submit" />
              </div>
            </div>


         </form>
    </div>
</div>

<!-- Catatan+submit
<div class="col-md-9 col-sm-8">
        <div id="with-header-no-border" class="card">
            <div class="card-header">
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                   <div class="row">
							<div class="table-responsive" id="view">
							  <div class="form-group mb-6 col-sm-6 col-md-6">
								<label for="bio" class="cursor-pointer">Catatan Tambahan</label>
								<br>
								<textarea class="form-control" id="keterangan" name="keterangan" rows="2"></textarea>
							</div>
							</div>
							<div align="right">
								<button type="submit" href="" class="btn btn-primary btn-md" id="btn-simpan">Simpan</button>
							</div>
						</div>
          </div>
        </div>
      </div>
    </div>
 Catatan+submit -->
</section>

@stop

@section('js')

<!--Script Repeater
<script>
 $(function()
  {
   $(document).on('click', '.btn-add', function(e)
   {
    e.preventDefault();

    var controlForm = $('.controls:first'),
     currentEntry = $(this).parents('.entry:first'),
     newEntry = $(currentEntry.clone()).appendTo(controlForm);

    newEntry.find('input').val('');
    controlForm.find('.entry:not(:last) .btn-add')
     .removeClass('btn-add').addClass('btn-remove')
     .removeClass('btn-success').addClass('btn-danger')
     .html('<span class="glyphicon glyphicon-minus"></span>');
   }).on('click', '.btn-remove', function(e)
   {
    $(this).parents('.entry:first').remove();

    e.preventDefault();
    return false;
   });
  }
 );
</script>
Script Repeater -->


<script>
$(document).ready(function(){
  $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
                $("#material").change(function(){
                 id = $(this).val()
                  $.ajax({

                                url: '/getMaterial',
                                data: 'id=' + id,
                                type: 'POST',
                                success: function(response){
                                    $('#satuan').val(response['satuan'])

                                }
                            })
                  });

                  $("#wo").change(function(){
                   id = $(this).val()
                    $.ajax({

                                  url: '/getAddress',
                                  data: 'id=' + id,
                                  type: 'POST',
                                  success: function(response){
                                      $('#namacust').text(response['nm_cust'])
                                      $('#namaperusahaan').text(response['nm_perusahaan'])
                                      $('#jeniskaroseri').text(response['jenis_karoseri'])
                                      $('#jumlahunit').text(response['jumlah_unit'])
                                  }
                              })
                    });

                  $(".numonly").keydown(function (e) {
                    // Allow: backspace, delete, tab, escape, enter and .
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                         // Allow: Ctrl/cmd+A
                        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                         // Allow: Ctrl/cmd+C
                        (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                         // Allow: Ctrl/cmd+X
                        (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                         // Allow: home, end, left, right
                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                             // let it happen, don't do anything
                             return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
});

$(document).ready(function(){
      var postURL = "<?php echo url('tambah_pbb'); ?>";
      var redir = "<?php echo url('pbb'); ?>";
      var i=1;


      $('#add').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><select id="material" name="material[]" class="form-control" required><option selected disabled value="">Pilih Material</option>@foreach ($produkarray as $data)<option value="{{$data->nama_produk}}" name="{{$data->nama_produk}}">{{$data->nama_produk}}</option>@endforeach</select></td><td><input type="text" name="ukuran[]" placeholder="Ukuran" class="form-control name_list" /></td><td><input type="text" name="jumlah[]" placeholder="Jumlah" class="form-control name_list numonly" /></td><td><input type="text" name="catatan[]" placeholder="Catatan" class="form-control name_list" /></td><td><input type="hidden" name="pemohon[]" placeholder="Pemohon" class="form-control name_list" value="{{Auth::user()->name}}"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><span class="glyphicon glyphicon-remove"></span></button></td></tr>');
      });


      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){
           $.ajax({
                url:postURL,
                method:"POST",
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Data Berhasil Diinput</li>');
                        window.location = redir;
                    }
                }
           });
      });
      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });

</script>


@stop
