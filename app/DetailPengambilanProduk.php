<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPengambilanProduk extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_detail_pengambilan_sp';
    protected $table = 'detail_pengambilan_sps';
}
