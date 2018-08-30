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

  <title>BAP</title>
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
  <table id="first-table" border="0"  border="0" cellspacing="0" cellpadding="0" >
    <tr class="center">
      <td rowspan="4" width="25%"><img src="{{'../img/logo.png'}}" style="padding-top:10px;" width="100px"></td>
      <td rowspan="4" width="75%" >
        <P id="line-small">
            <font size="5" color="red"><b>CV WIJAYA BARU</b></font><br>
            WORKSHOP Jl. Raya Kedamean No.168 (Sebelah Makam Pahlawan) - Gresik
            <br>
            Phone: +(62) 0812-3322-5000 | Email: wijayabaru_14@yahoo.com | admin@wijayabaru.co.id
        </p>
      </td>
    </tr>
    <tr >
    </tr>
    <tr>
    </tr>
    <tr>
    </tr>
    <tr>
     <td colspan="12">
       <table style="margin-left:10px; margin-right:10px;">
         <tr>
         </tr>
         <tr>
           <td colspan="10"><center><b>BERITA ACARA PENYELESAIAN PEKERJAAN</b><br><br></td>
         </tr>

                 <tr>
                    <td colspan="8" style="padding-left:10px">Pada hari ini, {{$fix}}, kami yang bertanda tangan di bawah ini :<br></td>
                 </tr>

                 <tr>
                 <td style="padding-left:10px" width="50px" >Nama</td>
                 <td width="1px">:</td>
                 <td width="450px">{{$data['nm_spv']}}</td>
                 <td></td>
                 </tr>

                 <tr>
                 <td style="padding-left:10px" width="120px" >Jabatan</td>
                 <td width="8px">:</td>
                 <td width="450px"><label>SPV</label></td>
                 <td></td>
                 </tr>

                 <tr>
                    <td colspan="8" style="padding-left:10px">Bertindak untuk dan atas nama SPV penanggung jawab penyelesaian pesanan karoseri di CV WIjaya Baru selanjutnya disebut sebagai <b>PIHAK PERTAMA</b>.<br><br></td>
                 </tr>

                 <tr>
                 <td style="padding-left:10px" width="120px" >Nama</td>
                 <td width="10px">:</td>
                 <td width="450px">{{$data['nm_pb']}}</td>
                 <td></td>
                 </tr>

                 <tr>
                 <td style="padding-left:10px" width="120px" >Jabatan</td>
                 <td width="10px">:</td>
                 <td width="450px">{{$data['jenis_pb']}}</td>
                 <td></td>
                 </tr>

                 <tr>
                    <td colspan="8" style="padding-left:10px">Bertindak untuk dan atas nama SPV CV Wijaya Baru selanjutnya disebut sebagai <b>PIHAK KEDUA</b>.<br><br></td>
                 </tr>

                 <tr>
                 </table>

                 <table style="margin-left:10px; margin-right:10px;">
                   <tr>
                   </tr>

                           <tr>
                              <td colspan="8" style="padding-left:10px">Dalam kedudukannya masing-masing, kedua belah pihak sepakat untuk melakukan pemeriksaan pekerjaan dengan ketentuan sebagai berikut :</td>
                           </tr>

                           <tr>
                           <td colspan="8" style="padding-left:30px">1.	<b>PIHAK PERTAMA</b> dan <b>PIHAK KEDUA</b> secara bersama - sama telah melaksanakan  pemeriksaan pekerjaan sebagaimana dimaksud pada Surat Perintah Kerja nomor 12/SPKB/VII/2018<br></td>
                           </tr>

                           <tr>
                           <td colspan="8" style="padding-left:30px">2.	Pada pemeriksaan pekerjaan saat ini, <b>PIHAK KEDUA</b> telah menyelesaikan pekerjaan dengan tingkat prestasi 100% yang dibuktikan dengan Berita Acara Serah Terima Pekerjaan.</td>
                           </tr>

                           <tr>
                           <td colspan="8" style="padding-left:30px">3.	<b>PIHAK PERTAMA</b> menyatakan dengan baik Serah Terima yang dilakukan oleh <b>PIHAK KEDUA</b>.</td>
                           </tr>

                           <tr>
                           </table>

                 </td>
                 </tr>

                 <table width="100%">
                   <tr class="center">
                     <td class="col-2">
                       <P>
                           PIHAK PERTAMA,<br>SPV
                           <br><br><br><br><br>
                           <u>{{$data['nm_spv']}}</u>
                       </p>
                     </td>

                     <td class="col-2">
                       <P>
                           PIHAK KEDUA,<br>Pemborong
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
         </html>
