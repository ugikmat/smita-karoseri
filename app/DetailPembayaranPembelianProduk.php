<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPembayaranPembelianProduk extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_detail_pembayaran_psp';
    protected $table = 'detail_pembayaran_pembelian_sps';
}
