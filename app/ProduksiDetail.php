<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProduksiDetail extends Model
{
  protected $table = 'produksi_details';
  protected $primaryKey = 'id_detailproduksi';
  public $timestamps = false;
}
