<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermintaanPenjualan extends Model
{
    protected $table = 'spkcs';
    protected $primaryKey = 'id_spkc';
    public $timestamps = false;
}
