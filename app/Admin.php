<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $fillable  = [
        'account_name', 'bank_name', 'account_number', 'phone', 'created_by'
    ];
}
