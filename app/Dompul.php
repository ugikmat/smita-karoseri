<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dompul extends Model
{
    protected $primaryKey = 'id_dompul';
    public $timestamps = false;
    protected $table = 'master_dompuls';
}
