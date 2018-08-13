<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPembayaranSp extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_detail_pembayaran_sp';
    protected $table = 'detail_pembayaran_sps';
}
