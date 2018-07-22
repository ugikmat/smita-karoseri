<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_satuan';
    protected $table = 'master_satuans';
}
