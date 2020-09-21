<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WithdrawalsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verifiedUsers']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        if (auth()->user()->invested_on == 3) {
            dd($id);
        }
        return redirect()->back()->with('error', 'Your withdrawal order was unsuccessful, you can only place your withdrawal order after 3 days of investment.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
