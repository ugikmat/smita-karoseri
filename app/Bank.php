<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_bank';
    protected $table = 'master_banks';
}
