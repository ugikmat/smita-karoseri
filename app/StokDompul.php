<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokDompul extends Model
{
    protected $table = 'kartu_stok_dompuls';
    protected $primaryKey = 'id_stok_dompul';
    public $timestamps = false;
}
