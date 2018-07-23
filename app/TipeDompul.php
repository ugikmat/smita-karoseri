<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeDompul extends Model
{
    public $timestamps =false;
    protected $primaryKey = 'id_tipe_dompul';
    protected $table = 'master_tipe_dompul';
}
