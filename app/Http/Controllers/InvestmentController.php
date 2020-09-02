<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Contracts\Session\Session as SessionSession;

use Session;
use App\Investment;
use App\Recommitment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verifiedUsers']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if (session()->has('amount')) {
            dd($request->session()->get('amount'));
        }
        echo "text";
        // return /?$request->session()->get('amount');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $adminAccount =  User::where('admin', 1)->inRandomOrder()->limit(1)->get();
        if (auth()->user()->times_invested == 0) {
            return view('users.invest')->with('adminAccount', $adminAccount);
        } else {
            return redirect()->back()->with('error', "sorry, you can not make another investment, rather you can make a recommitment when you want to withdraw your current investment which will be due after 5 days.");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'amount' => 'required|min:5000|integer',
            'proof' => 'required|mimes:png,jpg,jpeg|image',

        ]);

        $amount = $request->amount;
        $sender = $request->name_of_sender;
        if ($request->hasFile('proof')) {
            $image = $request->file('proof')->getClientOriginalName();
            $imageExt = $request->file('proof')->getClientOriginalExtension();
            $imageNameOnly = pathinfo($image, PATHINFO_FILENAME);
            $imgTodb = $imageNameOnly . '_' . time() . '.' . $imageExt;
            $saveImage = $request->file('proof')->storeAs('public/proofs/investments', $imgTodb);
        }
        $withdrawableAmount = $amount / 2 + $amount;
        $user = User::find(Auth::id());
        $user->update(['investment_confirmed' => 0]);
        Investment::create([
            'amount' => $amount,
            'screenshot' => $imgTodb,
            'name_of_sender' => auth()->user()->name,
            'user_id' => Auth::id(),
            'withdrawable_amount' => $withdrawableAmount,
            'admin' => $request->admin

        ]);
        $admin = User::where('username', $request->admin)->first();

        return redirect('/dashboard/home')->with('success', 'Your proof of Investment of ' . number_format($request->amount) . ' was successfully submitted. Please wait for the admin to confirm your investment or call ' . $admin->phone . '.');
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
        dd($request->all());
        // Note that your withdrawal will be available after three days . Thank you!
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
