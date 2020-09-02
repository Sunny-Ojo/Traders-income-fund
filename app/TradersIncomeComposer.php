<?php

namespace App;

use Illuminate\Support\Facades\Auth;

class TradersIncomeComposer
{
    public function compose(\Illuminate\View\View $view)
    {
        if (Auth::check()) {
            $notifications = $notifications = Notification::where(['user_id' => Auth::id(), 'read' => 1])->latest()->count();
            $unconfirmed =  Investment::where(['confirmed' => 0, 'admin' => Auth::user()->username])->count();
            $recommitment =  Recommitment::where(['confirmed' => 0, 'admin' => Auth::user()->username])->count();
            $paymentProof =  PaymentProof::all()->count();
            $userPaymentProof =  PaymentProof::where('admin',  Auth::user()->username)->count();
            $adminAccounts =  Admin::all()->count();
            $users = User::all()->count();
            $withdrawals = PendingWithdrawal::all()->count();
            // calculating total number of investment and recommitments
            $allRecommitment = Recommitment::all()->count();
            $investment = Investment::all()->count();
            $allInvestments = $investment + $allRecommitment;
            $userWithdrawals = PendingWithdrawal::where(['awaiting_payment' => 'awaiting', 'admin' => Auth::user()->username])->count();
            $withdrawalsDone = PendingWithdrawal::where('awaiting_payment', 'paid')->count();
            $view->with(['unconfirmed_investments' => $unconfirmed, 'allInvestments' => $allInvestments, 'withdrawalsDone' => $withdrawalsDone, 'unconfirmedRecommitment' => $recommitment, 'notification' => $notifications, 'userPaymentProof' => $userPaymentProof, 'payment_proof' => $paymentProof, 'adminAccounts' => $adminAccounts, 'userWithdrawals' => $userWithdrawals, 'allUsers' => $users]);
        }
    }
}
