<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPembayaranPembelianDompul extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_detail_pembayaran_dompul';
    protected $table = 'detail_pembayaran_pembelian_dompuls';
}
