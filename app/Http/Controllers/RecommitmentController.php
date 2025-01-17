<?php

namespace App\Http\Controllers;

use App\PendingWithdrawal;
use App\Recommitment;
use App\User;
use App\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class RecommitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Auth::user()->invested_on == 5) {
            //creating a pending withdrawal data
            $getUser = User::findOrFail(Auth::id());
            $withdrawal_amount = $getUser->withdrawable_amount;
            $user_id = $getUser->id;
            $newWithdrawal = PendingWithdrawal::create([
                'user_id' => $user_id,
                'name_of_receiver' => $getUser->name,
                'withdrawable_amount' => $withdrawal_amount,
                'amount' => $getUser->current_investment,
                'awaiting_payment' => 'awaiting',
                'account_name' => $getUser->account_name,
                'account_number' => $getUser->account_number,
                'bank_name' => $getUser->bank_name,
                'phone' => $getUser->phone,
                'admin' => $request->admin,

            ]);
            //validating recommitment forms
            $this->validate($request, [
                'amount' => 'required|min:5000|integer',
                'proof' => 'required|mimes:png,jpg,jpeg|image',
            ]);
            $amount = $request->amount;
            $sender = $request->name_of_sender;
            //image manipulation and saving
            if ($request->hasFile('proof')) {
                $image = $request->file('proof')->getClientOriginalName();
                $imageExt = $request->file('proof')->getClientOriginalExtension();
                $imageNameOnly = pathinfo($image, PATHINFO_FILENAME);
                $imgTodb = $imageNameOnly . '_' . time() . '.' . $imageExt;
                $saveImage = $request->file('proof')->storeAs('public/proofs/recommitments', $imgTodb);
            }
            //calculating withdrawable amount for users recommitment
            $withdrawableAmount = $amount / 2 + $amount;
            $user = User::findOrFail(Auth::id());
            $user->update(['investment_confirmed' => 0]);

            //creating the users recommitment
            Recommitment::create([
                'amount' => $amount,
                'screenshot' => $imgTodb,
                'user_id' => Auth::id(),
                'name_of_sender' => auth()->user()->name,
                'admin' => $request->admin,
                'withdrawable_amount' => $withdrawableAmount,
            ]);
            //updating the users investment details
            $getUser->current_investment = $amount;
            $getUser->withdrawable_amount =  0;
            //get$getUsers invested_on data will start counting once admin approves the proof of recommitment
            $getUser->invested_on = null;
            $getUser->save();
            $admin = User::where('username', $request->admin)->firstOrFail();
            return redirect('/dashboard/home')->with('success', 'Your proof of recommitment of ' . number_format($request->amount) . ' was successfully submitted. Please wait for the admin to confirm your recommitment and withdrawal order or you can call ' . $admin->phone . '');
        } else {
            return redirect()->back()->with('error', 'You can not withdraw at the moment');
        }
    }
}
