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

  <title>Surat Jalan</title>
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
           <td colspan="10" style="padding-left:300px"><center><b>SURAT JALAN KENDARAAN</b><br><br></td>
         </tr>
         <tr>

           <tr>
                <td style="padding-left:100px" width="120px" >Kepada Yth.<br><b>{{$data['nm_cust']}}</b><br></b>{{$data['nm_perusahaan']}}</b><br>di {{$data['alamat_cust']}}<br><br></td>
                <td width="10px"></td>
                <td width="450px"></td>
                <!--<td>12 Juli 2018<br><br></td>-->
                </tr>

                 <tr>
                 <td colspan="8" style="padding-left:50px" >Bersama dengan ini kami kirimkan unit karoseri sebagai berikut:</td>
                 </tr>
                 <tr>
                 <td style="padding-left:70px" width="120px" >Jenis Karoseri</td>
                 <td width="10px">:</td>
                 <td width="450px">{{$data['jenis_karoseri']}}</td>
                 <td></td>
                 </tr>

                 <tr>
                 <td style="padding-left:70px" width="120px" >Ukuran</td>
                 <td width="10px">:</td>
                 <td width="450px">{{$data['ukuran_karoseri']}}<label>mm</label></td>
                 <td></td>
                 </tr>

                 <tr>
                 <td style="padding-left:70px" valign="top" width="120px" >Detail Spesifikasi</td>
                 <td width="10px">:</td>
                 <td width="450px">{!!$data['ket']!!}</td>
                 <td></td>
                 </tr>

                <tr>
                 <td colspan="8" style="padding-left:50px" >Mohon untuk di cek dan di terima</td>
                  </tr>

                 </table>
                       <table width="100%">
                   <tr class="center">
                     <td colspan="5" style="padding-left:20px" class="col-2">
                       <P>
                           Pengiriman,
                           <br><br><br><br><br>
                           <u>{{$data['nm_sopir']}}</u>
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
               </td>
             </tr>
             <td>_________________________________________________________________________________________________________________________________</td>

             <table width="100%">
               <br><br>
         <tr class="center">
           <td class="col-2">
             <P>
               Diterima tanggal ...........<br>
                 Customer,
                 <br><br><br><br><br>
                 <u>{{$data['nm_cust']}}</u>
             </p>
           </td>
         </tr>
       </table>

           </table>
           <script>
               var options = {  year: 'numeric', month: 'long', day: 'numeric' };
               var today  = new Date();
               var tanggal = today.toLocaleDateString("ID", options);
               var x = document.getElementsByClassName("tanggal");
               x[0].innerHTML = "Gresik, "+tanggal+"<br>Marketing<br><br><br><br><u>Dwizta Nugraha</u>";
           </script>
         </body>
         </html>
