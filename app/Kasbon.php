<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kasbon extends Model
{
    protected $table = 'kasbon_tabels';
    protected $primaryKey = 'id_kasbon';
    public $timestamps = false;
}
