@extends('adminlte::page') @section('title', 'User') @section('content_header')
<h1>Change Password</h1>

@stop

@section('css')

@stop

@section('content')
<form method="post" data-parsley-validate class="form-horizontal form-label-left" action="/operasional/smita/user/reset" id="editForm">
    @csrf @method('put')
  <div class="container-fluid form-inline">
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      Password lama&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;:&emsp;
      <input type="password" id="oldpassword" name="oldpassword" class="form-control" value="" autocomplete="off" required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      Password baru&emsp;&emsp;&emsp;&emsp;:&emsp;
      <input type="password" id="password" name="password" class="form-control" value="" autocomplete="off" required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xs-6 col-sm-6">
      Konfirmasi Password baru&emsp;&nbsp;:&emsp;
      <input type="password" id="konfirmasi" name="konfirmasi" class="form-control" value="" autocomplete="off" required>
    </div>
  </div>
  <br>
  </div>

    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </div>
</form>
</section>
@stop

@section('js')

@stop
