<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenjualanProduk extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_penjualan_sp';
    protected $table = 'penjualan_sps';
}
