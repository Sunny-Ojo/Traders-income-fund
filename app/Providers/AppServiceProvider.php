<?php

namespace App\Providers;

use App\Admin;
use App\Investment;
use App\Notification;
use App\PaymentProof;
use App\PendingWithdrawal;
use App\Recommitment;
use App\User;
use App\Withdrawal;
use Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \view()->composer('*', 'App\TradersIncomeComposer');

        Schema::defaultStringLength(191);
    }
}
