<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLokasi extends Model
{
    protected $table = 'users_lokasi';
    protected $primaryKey = 'id_users_lokasi';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_lokasi','id_user'
    ];
}
