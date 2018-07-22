<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $table = 'master_customers';
  protected $primaryKey = 'id_cust';
  //protected $fillable = ['status'];
}
