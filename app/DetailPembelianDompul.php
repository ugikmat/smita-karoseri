<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPembelianDompul extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_detail_pembelian_dompul';
    protected $table = 'detail_pembelian_dompuls';
}
