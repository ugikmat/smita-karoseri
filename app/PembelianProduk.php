<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembelianProduk extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_pembelian_sp';
    protected $table = 'pembelian_sps';
}
