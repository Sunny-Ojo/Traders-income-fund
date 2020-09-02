<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommitment extends Model
{
    //
    protected $fillable  = [
        'amount', 'user_id', 'screenshot', 'confirmed', 'withdrawable_amount', 'name_of_sender', 'admin'
    ];
}
