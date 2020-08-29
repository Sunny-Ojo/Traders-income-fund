<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommitment extends Model
{
    //
    protected $fillable  = [
        'amount', 'user_id', 'name_of_sender', 'screenshot', 'confirmed', 'withdrawable_amount',
    ];
}
