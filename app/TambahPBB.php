<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TambahPBB extends Model
{
    protected $table = 'pbb_details';
    protected $primaryKey = 'id_detailpbb';
    public $fillable = ['ukuran','jumlah','catatan'];
    public $timestamps = false;
}
