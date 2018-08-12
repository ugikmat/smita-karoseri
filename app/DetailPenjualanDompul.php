<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualanDompul extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_detail_penjualan';
    protected $table = 'detail_penjualan_dompuls';
}
