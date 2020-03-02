<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public function covenantsibis()
    {
        return $this->hasMany('App\Covenantsibi');
    }
    protected $fillable = [
        'name', 
    ];
}
