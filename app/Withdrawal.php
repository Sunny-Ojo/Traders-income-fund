<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Withdrawal extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(App\User::class);
    }
    protected $fillable = [
        'user_id', 'name_of_receiver', 'withdrawable_amount', 'awaiting_payment',
        'account_name', 'account_number', 'bank_name', 'phone'
    ];
}
