<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PPN extends Model
{
    protected $table = 'master_ppns';
    protected $primaryKey = 'id_ppn';
    public $timestamps = false;
}
