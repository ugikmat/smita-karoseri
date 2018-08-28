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

  <title>SPK</title>
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
           <td colspan="50"><center><b>SURAT PENUGASAN</b><br><br></td>
         </tr>
                 <tr>
                 <td style="padding-left:10px" width="120px" >No.WO</td>
                 <td width="10px">:</td>
                 <td width="450px"> {{$data['id_spkc']}}/WO/{{$rm}}/{{$thn}}</td>
                 <td><label>{{$tgl}}<br><br></td>
                 </tr>

                 <tr>
                 <td style="padding-left:10px" width="120px" >Perusahaan</td>
                 <td width="10px">:</td>
                 <td width="450px"> {{$data['nm_perusahaan']}}</td>
                 <td></td>
                 </tr>

                 <tr>
                 <td style="padding-left:10px" width="120px" >Nama Customer</td>
                 <td width="10px">:</td>
                 <td width="450px">{{$data['nm_cust']}}</td>
                 <td></td>
                 </tr>

                 <tr>
                 <td style="padding-left:10px" width="120px" >Jabatan</td>
                 <td width="10px">:</td>
                 <td width="450px">{{$data['jabatan']}}</td>
                 <td></td>
                 </tr>

                 <tr>
                    <td colspan="3" style="padding-left:10px">Memberikan pekerjaan karoseri dengan spesifikasi dibawah ini:<br><br></td>
                 </tr>

                 <tr>
                 <td style="padding-left:10px" width="120px" >Supervisor</td>
                 <td width="10px">:</td>
                 <td width="450px">{{$data['nm_spv']}}</td>
                 <td></td>
                 </tr>

                 <tr>
                 <td style="padding-left:10px" width="120px" >Jenis Karoseri</td>
                 <td width="10px">:</td>
                 <td width="450px">{{$data['jenis_karoseri']}}</td>
                 <td></td>
                 </tr>

                 <tr>
                 <td style="padding-left:10px" width="120px" >Jumlah Unit</td>
                 <td width="10px">:</td>
                 <td width="450px">{{$data['jumlah_unit']}}</td>
                 <td></td>
                 </tr>

                 <tr>
                 <td style="padding-left:10px" valign="top" width="120px" >Detail Spesifikasi</td>
                 <td valign="top" width="10px">:</td>
                 <td width="450px">{!!$data['ket']!!}</td>
                 <td></td>
                 </tr>

                 <tr>
                 </table>
                 </td>
                 </tr>



                 <table width="100%">
                   <br><br>
                   <tr class="center">
                     <td class="col-2">

                       <P>
                           Supervisor,<br>
                           <br><br><br><br><br>
                           <u>{{$data['nm_spv']}}</u>
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
           <script>
               var options = {  year: 'numeric', month: 'long', day: 'numeric' };
               var today  = new Date();
               var tanggal = today.toLocaleDateString("ID", options);
               var x = document.getElementsByClassName("tanggal");
               x[0].innerHTML = "Gresik, "+tanggal+"<br>Mengetahui,<br><br><br><br><br><u>Teddy Tan Wijaya</u>";
           </script>
         </body>
         </html>
