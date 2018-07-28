<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadDompul extends Model
{
    protected $primaryKey = 'id_upload';
    protected $table = 'upload_dompuls';
    public $timestamps = false;
    protected $dateFormat = 'd/m/Y';
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'tanggal_transfer',
    ];
    
    
//     /**
//      * Transfer Date in format d/m/Y
//      *
//      * @return string
//      */
//     public function getTanggalTransferAttribute()
//     {
//         return "{$this->tanggal_transfer->format('d.m.Y')}";
//     }
}
