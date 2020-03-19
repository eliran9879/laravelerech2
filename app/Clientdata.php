<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientdata extends Model
{
    protected $fillable = [
        'client_id', 'designation', 'amount','deposit_date','end_date','type_check',
    ];
}
