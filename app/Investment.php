<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(App\User::class);
    }
    protected $fillable = [
        'amount', 'user_id', 'name_of_sender', 'screenshot', 'confirmed', 'withdrawable_amount', 'admin'
    ];
}
