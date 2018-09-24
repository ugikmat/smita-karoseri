<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengembalianProduk extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_pengembalian_sp';
    protected $table = 'pengembalian_sps';
}
