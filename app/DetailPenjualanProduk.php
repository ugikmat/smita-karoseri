<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualanProduk extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_detail_penjualan_sp';
    protected $table = 'detail_penjualan_sps';
}
