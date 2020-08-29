<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Support\Facades\Auth;
use App\Investment;
use App\PaymentProof;
use App\PendingWithdrawal;
use App\Recommitment;
use App\Withdrawal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $investments  = Withdrawal::where('user_id', Auth::id())->get();
        if (auth()->user()->admin == 1) {
            return view('admin1.index')->with(['proofs' => PaymentProof::all(), 'investments' => Recommitment::where('user_id', Auth::id())->get(), 'withdraw' => Withdrawal::where('user_id', Auth::id())->latest(),]);
        }
        $adminAccount =  Admin::inRandomOrder()->limit(1)->get();
        $recommitment = Recommitment::where('user_id', Auth::id())->orderby('created_at', 'DESC')->paginate(3);
        $investment = Investment::where('user_id', Auth::id())->orderby('created_at', 'DESC')->get();
        $withdrawal = PendingWithdrawal::where('user_id', Auth::id())->orderby('created_at', 'DESC')->paginate(3);
        return view('home')->with(['recommitments' => $recommitment, 'investments' => $investment, 'withdrawals' => $withdrawal, 'adminAccount' => $adminAccount]);
    }
}
