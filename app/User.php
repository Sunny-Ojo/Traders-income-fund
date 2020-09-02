<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'upline', 'phone', 'account_name', 'account_number', 'bank_name', 'current_investment', 'total_amount_invested', 'total_amount_withdrawn', 'bonus',  'password',
    ];
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function referral_link()
    {
        return route('register', ['ref' => $this->username]);
    }
    public function isAdmin()
    {
        if ($this->admin === 1) {
            return true;
        }
        return false;
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function referral()
    {
        return $this->hasMany(App\Referral::class);
    }
    public function investment()
    {
        return $this->hasMany(App\Investment::class);
    }
    public function paymentProof()
    {
        return $this->hasOne(App\PaymentProof::class);
    }
    public function withdrawals()
    {
        return $this->hasMany(App\Withdrawal::class);
    }
}
