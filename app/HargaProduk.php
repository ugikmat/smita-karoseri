<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HargaProduk extends Model
{
    public $timestamps = false;
    protected $table = 'master_harga_sp';
    protected $primaryKey = 'id_harga_sp';
}
