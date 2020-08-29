<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class PaymentProof extends Model
{
    protected $fillable = [
        'image', 'user_id', 'name_of_sender',
    ];
    //
    public function user()
    {
        return $this->belongsTo(App\User::class);
    }
}
