<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengambilanProduk extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_pengambilan_sp';
    protected $table = 'pengambilan_sps';
}
