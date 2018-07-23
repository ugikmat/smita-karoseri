<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HargaDompul extends Model
{
    public $timestamps = false;
    protected $table = 'master_harga_dompuls';
    protected $primaryKey = 'id_harga_dompul';
}
