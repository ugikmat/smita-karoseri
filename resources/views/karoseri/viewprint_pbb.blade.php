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
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

  <!-- Latest compiled and minified CSS -->

  <title>PBB</title>
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
           <td colspan="10"><center><b>PERMINTAAN BAHAN BAKU</b><br><br></td>
         </tr>
         <tr>
                 <tr>
                    <td colspan="3" style="padding-left:10px"><br>Berdasarkan SPK No {{$data['id_spkc']}}/SPK/{{$rm}}/{{$thn}}<br><br>Dengan ini kami sampaikan permintaan bahan baku untuk ditindaklanjuti tepat waktu sesuai spesifikasi sebagai berikut:</td>
                    <td><label>{{$tglpbb}}<br><br></td>
                 </tr>

                 <tr>
                 <td style="padding-left:10px" width="120px" >Jenis Karoseri</td>
                 <td width="10px">:</td>
                 <td width="450px">{{$data['jenis_karoseri']}}</td>
                 </tr>
                 </table>
                 <br><br>
                       <table class="table table-responsive table-bordered table-striped">
                         <thead>
                       <tr class="center">
                         <td>Material</td>
                        <td>Ukuran</td>
                          <td>Jumlah</td>
                         <td>Catatan</td>
                       </tr>
                     </thead>
                     <tbody>
                       @foreach($detail as $dt)
                       <tr class="center">
                         <td>{{$dt->material}}</td>
                         <td>{{$dt->ukuran}}</td>
                         <td>{{$dt->jumlah_setuju}}</td>
                         <td>{{$dt->catatan}}</td>
                      </tr>
                       @endforeach
                     </tbody>
                       </table>
                       <table width="100%">
                         <br><br>
                   <tr class="center">
                     <td class="col-2">
                       <P>
                           Mengetahui,<br>
                           Gudang
                           <br><br><br><br><br>
                           <u>Kabag Gudang?</u>
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
           </table>

           <script>

               var options = {  year: 'numeric', month: 'long', day: 'numeric' };
               var today  = new Date();
               var tanggal = today.toLocaleDateString("ID", options);
               var x = document.getElementsByClassName("tanggal");
               x[0].innerHTML = "Gresik, "+tanggal+"<br>Mengetahui,<br>Supervisor<br><br><br><br><u>{{$data['nm_spv']}}</u>";


           </script>
         </body>
         </html>
