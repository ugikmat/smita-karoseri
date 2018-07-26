<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PenjualanDompul extends Model
{
    public $timestamps=false;
    protected $table='penjualan_dompuls';
    protected $primaryKey='id_penjualan_dompul';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'id_penjualan_dompul','hp_kios', 'tanggal_penjualan_dompul', 'tanggal_input','grand_total','bayar_tunai','catatan'
    // ];
}
