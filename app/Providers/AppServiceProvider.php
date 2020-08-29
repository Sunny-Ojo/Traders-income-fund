<?php

namespace App\Providers;

use App\Investment;
use App\PaymentProof;
use App\PendingWithdrawal;
use App\Recommitment;
use App\User;
use App\Withdrawal;
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
        $unconfirmed =  Investment::where('confirmed', 0)->count();
        $recommitment =  Recommitment::where('confirmed', 0)->count();
        $paymentProof =  PaymentProof::all()->count();
        $users = User::all()->count();
        $withdrawals = PendingWithdrawal::all()->count();
        // calculating total number of investment and recommitments
        $allRecommitment = Recommitment::all()->count();
        $investment = Investment::all()->count();
        $allInvestments = $investment + $allRecommitment;
        $userWithdrawals = PendingWithdrawal::where('awaiting_payment', 'awaiting')->count();
        $withdrawalsDone = PendingWithdrawal::where('awaiting_payment', 'paid')->count();
        view()->share(['unconfirmed_investments' => $unconfirmed, 'allInvestments' => $allInvestments, 'withdrawalsDone' => $withdrawalsDone, 'unconfirmedRecommitment' => $recommitment, 'payment_proof' => $paymentProof, 'userWithdrawals' => $userWithdrawals, 'allUsers' => $users]);

        Schema::defaultStringLength(191);
    }
}
