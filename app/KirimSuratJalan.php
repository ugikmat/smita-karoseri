<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KirimSuratJalan extends Model
{
    protected $table = 'surat_jalan_tabels';
    protected $primaryKey = 'id_sj';
    public $timestamps = false;
}
