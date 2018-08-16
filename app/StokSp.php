<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokSp extends Model
{
    protected $table = 'kartu_stok_sps';
    protected $primaryKey = 'id_stok_sp';
    public $timestamps = false;
}
