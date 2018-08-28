<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $table = 'produksi_tabels';
    protected $primaryKey = 'id_produksi';
    protected $fillable = ['kode_produksi', 'id_spkc'];
    public $timestamps = false;
}
