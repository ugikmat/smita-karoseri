<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PBB extends Model
{
    protected $table = 'pbb_tabels';
    protected $primaryKey = 'id_pbb';
    public $timestamps = false;
}
