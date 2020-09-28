<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class useradmin extends Model
{
    public $table = 'useradmin';
    public $timestamps = false;
    protected $fillable = [
        'username', 'password' , 'quyen'
    ];
}
