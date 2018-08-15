<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BO extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_bo';
    protected $table = 'bos';
}
