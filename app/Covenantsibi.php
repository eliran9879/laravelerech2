<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Covenantsibi extends Model
{
    public function banks()
    {
        return $this->belongsTo('App\Bank', 'bank_id');
    }
    protected $fillable = [
        'bank_id', 'designation', 'total_month','total_amount','approval','max_percentage_general','min_percentage_general',
    ];
}
