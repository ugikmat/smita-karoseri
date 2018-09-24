<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPengembalianProduk extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_detail_pengembalian_sp';
    protected $table = 'detail_pengembalian_sps';
}
