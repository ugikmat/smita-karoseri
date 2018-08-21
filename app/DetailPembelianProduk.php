<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPembelianProduk extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_detail_pembelian_sp';
    protected $table = 'detail_pembelian_sps';
}
