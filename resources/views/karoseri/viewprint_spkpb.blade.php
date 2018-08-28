{{--  <:DOCTYPE html>
<html>
<head>
    <title>produk PDF </title>
    <link href=" {{ asset ('public bootstrap/css/
bootstrap.min.css') }} "rel="stylesheet">
</head>
<body>
<div class="panel panel - default">
   <div class="panel-heading">
        <h3=align="center">Daftar  Produk </h3>
</div>
<div class="panel-body">
<table class ="table table-striped">
<thead>
   <tr>
   <th>Nama  Produk</th>
   <th>Jumlah</th>
  <tr>
</thead>
</table>

  </div>
</div>
</body>
</html>  --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Latest compiled and minified CSS -->

  <title>SPKPB</title>
  <style>
      body {
        margin: 0px;
        padding: 0px;
      }
    @page {
        size: 'a4';
        margin: 5mm 5mm 5mm 5mm; /* change the margins as you want them to be. */
    }
    pre{
      font-family: 'Times New Roman', Times, serif;
    }

    .center{
        text-align: center;
    }

    #first-table{
      width: 100%;
      height: 100%;
    }

  </style>
</head>
<body onload="window.print()">
  <table id="first-table" border="1"  border="0" cellspacing="0" cellpadding="0" >
    <tr class="center">
      <td rowspan="4" width="25%"><img src="{{'../img/logo.png'}}" style="padding-top:10px;" width="100px"></td>
      <td rowspan="4" width="50%" >
        <P id="line-small">
            <font size="4" color="red"><b>CV WIJAYA BARU</b></font><br>
            WORKSHOP Jl. Raya Kedamean No.168 - Gresik
            <br>
            Phone: +(62) 0812-3322-5000 | Email: wijayabaru_14@yahoo.com | admin@wijayabaru.co.id
        </p>
      </td>
    </tr>

    <tr >
      <td width="10%"><center><font size="6"><b>{{$data['id_spkpb']}}</b></font><br>{{$tglkop}}</td>
    </tr>
    <tr >
    </tr>
    <tr>
    </tr>
    <tr>
    </tr>
    <tr>
    </table>
     <td colspan="12">
       <table style="margin-left:10px; margin-right:10px;">
         <tr>
         </tr>
         <tr>
           <td colspan="10"><center><b>SURAT PERINTAH KERJA</b><br><br></td>
         </tr>
         <tr>
            <td colspan="3" style="padding-left:4px">Kepada yang terhormat:</td>
         </tr>

                 <tr>
                 <td style="padding-left:30px" width="120px" >Nama</td>
                 <td width="10px">:</td>
                 <td width="450px"> {{$data['nm_pb']}}</td>
                 </tr>

                 <tr>
                 <td style="padding-left:30px" width="120px" >Jabatan</td>
                 <td width="10px">:</td>
                 <td width="450px"> {{$data['jenis_pb']}}</td>
                 </tr>

                 <tr>
                    <td colspan="3" style="padding-left:10px"><br>Berdasarkan SPK No. <b>{{$data['id_spkc']}}/SPK/{{$rm}}/{{$thn}}</b><br>Dengan ini kami sampaikan pekerjaan karoseri CV Wijaya Baru untuk dikerjakan dan dapat diselesaikan tepat waktu sesuai spesifikasi sebagai berikut:</td>
                 </tr>

                 <tr>
                 <td style="padding-left:10px" width="120px">Karoseri</td>
                 <td width="10px">:</td>
                 <td width="450px">{{$data['jenis_karoseri']}}</td>
                 <td></td>
                 </tr>

                 <tr>
                 <td style="padding-left:10px" width="50px" >Ukuran (P x L x T)</td>
                 <td width="10px">:</td>
                 <td width="450px">{{$data['ukuran_karoseri']}}<label>mm</label></td>
                 <td></td>
                 </tr>

                 <tr>
                 <td style="padding-left:10px" width="50px" >Jumlah Unit</td>
                 <td width="8px">:</td>
                 <td width="450px">1<label>Unit</label></td>
                 <td></td>
                 </tr>

                 <tr>
                 </table>

                 <table style="margin-left:10px; margin-right:10px;">
                   <tr>
                     <tr>
                     <td style="padding-left:30px" width="600px" ></td>
                     <td width="8px"></td>
                     <td width="450px"><label><strong>Harga Borongan Rp.<strong></label>{{number_format($data['harga_borongan']).""}}</td>
                     </tr>
                     <tr>
                     </table>

                     <table id="first-table" border="1"  border="0" cellspacing="0" cellpadding="0" >
                       <tr class="left">
                         <td rowspan="4" width="50%" >
                           <P id="line-small">
                               <font size="4"><b>Note</b></font><br>
                               {!!$data['keterangan_spkpb']!!}
                           </p>
                         </td>
                       </tr>
                       </table>

                 </td>
                 </tr>

                 <table width="100%">
                   <tr class="center">
                     <td class="col-2">
                       <P>
                           Dibuat,<br>Admin
                           <br><br><br><br><br>
                           <u>Selvi</u>
                       </p>
                     </td>

                     <td class="col-2">
                       <P>
                           Diperiksa,<br>SPV Produksi
                           <br><br><br><br><br>
                           <u>{{$data['nm_spv']}}</u>
                       </p>
                     </td>

                     <td class="col-2">
                       <P>
                           Disetujui,<br>Direktur
                           <br><br><br><br><br>
                           <u>Teddy Tan Wijaya</u>
                       </p>
                     </td>

                     <td class="col-2">
                       <P>
                           Dilaksanakan,<br>Pemborong
                           <br><br><br><br><br>
                           <u>{{$data['nm_pb']}}</u>
                       </p>
                     </td>

                     <td>
                       <P class="tanggal">
                       </p>
                     </td>
                   </tr>
                 </table>
               </td>
             </tr>
           </table>

           <table  id="first-table" border="1"  border="0" cellspacing="0" cellpadding="0" >
             <thead>
           <tr class="center">
             <td>No</td>
             <td>Tanggal</td>
             <td><center>Keterangan</td>
            <td><center>Kasbon</td>
              <td><center>Sisa Borongan</td>
           </tr>
         </thead>
         <tbody>
           <?php $i = 1 ?>
           @foreach($kasbon as $kb)
           @php
           $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
           $tanggal_kasbon = $kb['tgl_kasbon'];
           $tahunkasbon = date('Y', strtotime($tanggal_kasbon));
           $bulankasbon = date('m', strtotime($tanggal_kasbon));
           $tglkasbon = date('d', strtotime($tanggal_kasbon));

           $fixkasbon = $tglkasbon.' '.$blnindo[$bulankasbon-1].' '.$tahunkasbon;
           @endphp
           <tr>
           <td><center>{{$i}}</td>
           <td><center>{{$fixkasbon}}</td>
           <td><center>{{$kb['nm_kasbon']}}</td>
           <td><center><labek>Rp.</label>{{number_format($kb['jumlah_kasbon']).""}}</td>
          <td><center><labek>Rp.</label>{{number_format($kb['sisa_borongan']).""}}</td>
           </tr>
           <?php $i++ ?>
           @endforeach
         </tbody>

           </table>

         </body>
         </html>
