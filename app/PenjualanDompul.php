<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PenjualanDompul extends Model
{
    public $timestamps=false;
    protected $table='penjualan_dompuls';
    protected $primaryKey='id_penjualan_dompul';
    protected $dateFormat = 'd/m/Y';
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'tanggal_penjualan_dompul',
        'tanggal_input'
    ];
     /**
     * Set the Tanggal Penjualan.
     *
     * @param  string  $value
     * @return void
     */
    public function setTanggalPenjualanDompulAttribute($value)
    {
        $tgl = Carbon::parse($value);
        $tgl = $tgl->format('Y-m-d');
        $this->attributes['tanggal_penjualan_dompul'] = $tgl;
    }
    /**
     * Set the Tanggal Input.
     *
     * @param  string  $value
     * @return void
     */
    public function setTanggalInputAttribute($value)
    {
        $tgl = Carbon::parse($value);
        $tgl = $tgl->format('Y-m-d');
        $this->attributes['tanggal_input'] = $tgl;
    }
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'id_penjualan_dompul','hp_kios', 'tanggal_penjualan_dompul', 'tanggal_input','grand_total','bayar_tunai','catatan'
    // ];
}
