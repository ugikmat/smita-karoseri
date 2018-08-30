<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembelianDompul extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_pembelian_dompul';
    protected $table = 'pembelian_dompuls';
}
