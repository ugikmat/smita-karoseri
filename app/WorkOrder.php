<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $table = 'spkcs';
    protected $primaryKey = 'id_spkc';
    public $timestamps = false;
}
