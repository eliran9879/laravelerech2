<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Covenantsmizrahi extends Model
{
    public function banks()
    {
        return $this->belongsTo('App\Bank', 'bank_id');
    }
    protected $fillable = [
        'bank_id', 'designation', 'total_month','max_approval','approval','type_check','id','created_at', 'updated_at'
    ];
}
