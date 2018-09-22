<?php

namespace App\View;

use Illuminate\Database\Eloquent\Model;

class ViewKasbon extends Model
{
    protected $table = 'view_kasbon';
    protected $primaryKey = 'id_kasbon';
    public $timestamps = false;
}
