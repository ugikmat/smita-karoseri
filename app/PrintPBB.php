<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintPBB extends Model
{
    protected $table = 'pbb_details';
    protected $primaryKey = 'id_detailpbb';
    public $timestamps = false;
}
