<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPKC extends Model
{
  protected $table = 'spkcs';
  protected $primaryKey = 'id_spkc';
  public $timestamps = false;
}
