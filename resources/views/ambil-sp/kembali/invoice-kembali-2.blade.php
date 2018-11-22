@extends('adminlte::page')

@section('title', 'Pengembalian SP')

@section('content_header')
    <h1>Review Pengembalian SP</h1>
@stop

@section('css')
<style>
td{
  background-color: white;
}
</style>
@stop


@section('content')

<!-- sama kayak invoice-ambil-2 -->
<form class="invoice-kembali-sp" action="{{ url('/') }}/kembali-sp/store" method="post">
  @csrf
  <input type="hidden" name="lokasi" value="{{$lokasi}}">
<input type="hidden" name="id" id="id" value="{{$pengembalianSp->id_pengembalian_sp}}">
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
          Nama Canvaser :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-8">
        <input type="text" name="canvasser" id="canvasser" value="{{$sales->nm_sales}}" disabled>
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
          No HP Canvaser :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-8">
        @isset($sales)
           {{$sales->no_hp}}
        @endisset
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        Tanggal Pengembalian :
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <input class="datepicker" data-date-format="dd-mm-yyyy" id="tgl" value="{{Carbon\Carbon::parse($pengembalianSp->tanggal_pengembalian_sp)->format('d/m/Y')}}" readonly>
      </div>
    </div>
  </div>
</div>

<table id="invoice-kembali-sp-table" class="table responsive"  width="100%">
    <thead>
    <tr>
      <th>Nama Barang</th>
      <th>Tipe Harga</th>
      <th>Jumlah</th>
    </tr>
    </thead>
    {{-- <tfoot>
      <tr>
        <td></td>
        <td></td>
        <td>Total Pengembalian</td>
        <!-- totale seng di kembalikan, sum jumlah -->
        <td>totale piro</td>
      </tr>
    </tfoot> --}}
</table>
<br>
<div class="container form-inline">
  <div class="row">
    <a href="{{URL::previous()}}"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</button></a>
    <!-- ngelink ke awal, invoice kembali -->
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Simpan</button>
  </div>
</div>

</form>

@stop

@section('js')
<script>
    // ga ada pembayaran sama sekali
    // nampilin yg dikembalikan aja
    $(document).ready(function () {
        @if(Session::has('bank-sp'))
        repeater.setList([
          @foreach(session('bank-sp') as $item)
          {
                'bank': "{{$item['bank']}}",
                'trf' : "{{$item['trf']}}",
                'catatan' : "{{$item['catatan']}}"
            },
          @endforeach
        ]);
        @endif
    });
</script>
<script>
function goBack() {
    window.history.back()
}
</script>
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $(function () {
        var id = $('#id').val();
        var t = $('#invoice-kembali-sp-table').DataTable({
                  serverSide: true,
                  processing: true,
                  stateSave: true,
                  searching:  false,
                  ajax: `{{ url('/') }}/kembali-sp/data/${id}`,
                  columns: [
                      {data: 'nama_produk'},
                      {data: 'tipe_harga'},
                      {data: 'jumlah'}
                  ]
              });
        console.log('{{session('total_harga_sp')}}');
    });
</script>
@stop
