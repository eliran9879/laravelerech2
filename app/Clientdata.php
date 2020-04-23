<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientdata extends Model
{
    public function banks()
    {
        return $this->belongsTo('App\Bank', 'bank_id');
    }
    protected $fillable = [
        'client_id', 'designation', 'amount','deposit_date','end_date','type_check','bank_id','status'
    ];
}
