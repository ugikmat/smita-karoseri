<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
  protected $table = 'master_supervisors';
  protected $primaryKey = 'id_spv';
}
