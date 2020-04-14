<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public function covenantsibis()
    {
        return $this->hasMany('App\Covenantsibi');
    }
    public function covenantshapoalim()
    {
        return $this->hasMany('App\Covenantshapoalim');
    }
    public function covenantsmizrahi()
    {
        return $this->hasMany('App\Covenantsmizrahi');
    }
    public function clientdata()
    {
        return $this->hasMany('App\Clientdata');
    }
    protected $fillable = [
        'name', 
    ];
}
