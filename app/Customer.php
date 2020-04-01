<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'client_name', 'adrress', 'occupation','id_account','payeee',
    ];
}
