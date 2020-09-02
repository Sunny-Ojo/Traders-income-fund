<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingWithdrawal extends Model
{
    //
    protected $fillable =  [
        'user_id', 'name_of_receiver', 'withdrawable_amount', 'amount', 'awaiting_payment', 'admin',
        'account_name', 'account_number', 'bank_name', 'phone', 'paid_to'
    ];
}
