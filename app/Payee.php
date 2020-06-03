<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payee extends Model
{
    protected $fillable = [
        'client_name', 'adrress', 'occupation','id_account','payeee', 'created_at', 'updated_at'
    ];
}
