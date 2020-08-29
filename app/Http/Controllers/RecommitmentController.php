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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (auth()->user()->invested_on == 3) {
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
                'phone' => $getUser->phone
            ]);
            //saving it in a session;
            // $store  = Session::put('pendingWithdrawal', $newWithdrawal);
            // if ($store) {
            //     return 'hi';
            // } else {
            //     return 'no';
            // }

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
            //creating the users recommitment
            Recommitment::create([
                'amount' => $amount,
                'screenshot' => $imgTodb,
                'user_id' => Auth::id(),
                'withdrawable_amount' => $withdrawableAmount,
            ]);
            //updating the users investment details
            $getUser->current_investment = $amount;
            $getUser->withdrawable_amount =  0;
            //get$getUsers invested_on data will start counting once admin approves the proof of recommitment
            $getUser->invested_on = null;
            $getUser->save();

            return redirect('/dashboard/home')->with('success', 'Your proof of recommitment of ' . $request->amount . ' was successfully submitted. Please wait for the admin to confirm your recommitment and withdrawal order.');
        } else {
            return redirect()->back()->with('error', 'You can not withdraw at the moment');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
