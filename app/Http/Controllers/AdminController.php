<?php

namespace App\Http\Controllers;

use App\Mail\MadeAdmin;
use App\Admin;
use App\Investment;
use App\Notification;
use App\PaymentProof;
use App\PendingWithdrawal;
use App\Recommitment;
use App\User;
use App\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    public function showProof($id)
    {
        return view('proof.show')->with('proof', PaymentProof::findOrFail($id));
    }
    public function approveProof($id)
    {

        $user = User::findOrFail($id);
        $user->awaiting_approval = 'verified';
        $user->save();
        $removePaymentProof = PaymentProof::where('user_id', $id);
        $removePaymentProof->delete();
        Notification::create([
            'user_id' => $id,
            'read' => 1,
            'message' => 'Your proof of activation payment has been approved'
        ]);
        return redirect('/admin')->with('success', 'You have approved a proof of payment. The user will now have full access to his dashboard');
    }
    public function makeAdmin($id)
    {
        $user = User::where('id', $id)->first();
        $user->update(['isAdmin' => 1]);
        Mail::to('njokusunnyojo@gmail.com')->send(new MadeAdmin($user));
        return redirect('/admin')->with('success', 'You have made "' . $user->name . '" an Admin of Traders Fund');
    }

    public function declineProof($id)
    {
        $user = User::findOrFail($id);
        $user->awaiting_approval = 'declined';
        $user->save();
        $removePaymentProof = PaymentProof::where('user_id', $id);
        $removePaymentProof->delete();
        Notification::create([
            'user_id' => $id,
            'read' => 1,
            'message' => 'Your proof of payment has been declined, please upload another one or You can call ' . auth()->user()->phone . ' to verify the issue '
        ]);
        return redirect('/admin')->with('error', 'You have declined a proof of payment.The user will not have full access to his dashboard.');
    }
    public function createBankDetails()
    {
        return view('admin.createBankDetails');
    }
    public function storeBankDetails(Request $request)
    {
        $data =  $request->validate([
            'account_name' => 'required|string|min:5',
            'account_number' => 'required|string|min:10',
            'bank_name' => 'required|string',
            'phone' => 'required|string|min:10',
        ]);
        $data['created_by'] = auth()->user()->name;
        Admin::create($data);
        return redirect('/admin')->with('success', 'A new Admin Bank Details has been added');
    }
    public function showBankDetails()
    {
        return view('admin.bankDetails')->with('bankDetails', User::where('admin', 1)->paginate(6));
    }
    public function changePassword()
    {
        return view('admin.changePassword');
    }
    public function storePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
        $password = Hash::make($request->password);
        $user = User::findOrFail(Auth::id());
        $user->update(['password' => $password]);
        Auth::logout();
        return redirect(route('login'));
    }
    public function downlines()
    {

        $downlines = User::where('upline', auth()->user()->username)->get();
        return view('admin.downlines')->with('dl', $downlines);
    }
    //
    public function userInvestments()
    {
        return view('admin.usersInvestments')->with(['investments' => Investment::where('admin', auth()->user()->username)->get()]);
    }
    public function userActivations()
    {
        return view('admin1.userActivations')->with('proofs',  PaymentProof::where('admin', auth()->user()->username)->get());
    }
    public function userRecommitments()
    {
        return view('admin.usersRecommitments')->with(['recommitment' => Recommitment::where('admin', auth()->user()->username)->get()]);
    }
    public function withdrawals()
    {
        return view('admin.withdrawals')->with('withdrawals', PendingWithdrawal::where('admin', auth()->user()->username)->get());
    }
    public function users()
    {
        return view('admin.users')->with('users', User::orderBy('created_at', 'DESC')->get());
    }
    public function showUsers($id)
    {
        return view('admin.showUsers')->with(['user' => User::where('id', $id)->first()]);
    }
    public function showWithdrawals($id)
    {
        return view('admin.showWithdrawals')->with(['withdrawal' => PendingWithdrawal::where('id', $id)->first()]);
    }
    public function updateUsersWithdrawalStatus($id)
    {
        $getWithdrawal = PendingWithdrawal::where('id', $id)->first();
        $getWithdrawal->awaiting_payment = 'paid';
        $findUser = User::findOrFail($getWithdrawal->user_id);
        //getting the user id in order to update his number of withdrawn amount
        $user_id = $getWithdrawal->user_id;
        $getUser = User::where('id', $user_id)->first();
        $getUser->total_amount_withdrawn += $getWithdrawal->withdrawable_amount;
        $getWithdrawal->save();
        $getUser->save();
        Notification::create([
            'user_id' => $findUser->id,
            'read' => 1,
            'message' => 'An Admin has just paid out your withdrawal order. Thank you for trading with us. You can call ' . auth()->user()->phone . ' to confirm '
        ]);
        return redirect()->route('userWithdrawals')->with('success', 'User has been paid and his data has been updated');
    }

    public function showInvestment($id)
    {
        $findInvestment  = Investment::where('id', $id)->first();
        return view('admin.showUserInvestments')->with('investment', $findInvestment);
    }
    public function showRecommitment($id)
    {
        $findInvestment  = Recommitment::where('id', $id)->firstOrFail();
        return view('admin.showUserRecommitments')->with('recommitments', $findInvestment);
    }

    public function approveInvestment(Request $request, $id, $user)
    {

        //finding the datas
        $findInvestment  = Investment::where('id', $id)->latest()->first();
        $findUser  =  User::where('id', $user)->first();
        //updating the datas with creating a withdrawal order for
        $findInvestment->confirmed = 1;
        $findUser->invested_on = now()->diffInDays();
        $findUser->times_invested += 1;
        $findUser->current_investment = $findInvestment->amount;
        $findUser->investment_confirmed = 1;
        $findUser->lastAdminPaidTo = auth()->user()->username;
        $findUser->total_amount_invested += $findInvestment->amount;
        $findUser->withdrawable_amount = $findInvestment->withdrawable_amount;
        $findUser->save();
        $findInvestment->save();
        Session::put('investment_user_id', $findUser->id);
        Session::put('investment_amount', $findUser->withdrawable_amount);
        Notification::create([
            'user_id' => $findUser->id,
            'read' => 1,
            'message' => 'An Admin has approved your Investment'
        ]);
        return redirect('/admin')->with('success', 'you have successfully Confirmed a proof of investment');
    }

    public function declineInvestment($id, $user)
    {
        $findInvestment  = Investment::where('id', $id)->delete();

        Notification::create([
            'user_id' => $user,
            'read' => 1,
            'message' => 'An Admin has declined your Investment due to some errors. Kindly Upload a proof of investment again or You can call ' . auth()->user()->phone . ' to verify the issue '
        ]);
        // Investment::FindOrFail($id)->delete();

        return redirect(route('userInvestments'))->with('success', 'You have declined a proof of payment');
    }
    public function approveRecommitment(Request $request, $id, $user)
    {

        //finding the datas
        $findInvestment  = Recommitment::where('id', $id)->latest()->first();
        $findUser  =  User::where('id', $user)->first();
        //updating the datas with creating a withdrawal order for
        $findInvestment->confirmed = 1;
        $findUser->invested_on = now()->diffInDays();
        $findUser->times_invested += 1;
        $findUser->current_investment = $findInvestment->amount;
        $findUser->investment_confirmed = 1;
        $findUser->lastAdminPaidTo = auth()->user()->username;
        $findUser->total_amount_invested += $findInvestment->amount;
        $findUser->withdrawable_amount = $findInvestment->withdrawable_amount;
        $findUser->save();
        $findInvestment->save();
        Notification::create([
            'user_id' => $user,
            'read' => 1,
            'message' => 'An Admin has approved your recommitment'
        ]);
        return redirect('/admin/users/recommitments')->with('success', 'you have successfully Confirmed a proof of recommitment');
    }
    public function declineRecommitment($id, $user)
    {
        $findInvestment  = Recommitment::where('id', $id)->delete();
        Notification::create([
            'user_id' => $user,
            'read' => 1,
            'message' => 'An Admin has declined your recommitment due to some errors. Kindly Upload a proof of recommitment again or You can call ' . auth()->user()->phone . ' to verify the issue '
        ]);


        return redirect('/admin/users/recommitments')->with('success', 'You have declined a proof of payment');
    }
    public function admin()
    {
        return view('admin1.index')->with('proofs', PaymentProof::all());
    }

    public function verifyUser($id)
    {
        $user  = User::where('id', $id)->first();
        if ($user->awaiting_approval == 'awaiting' || $user->awaiting_approval == 'declined') {
            $user->awaiting_approval = 'verified';
            $user->save();
            Notification::create([
                'user_id' => $id,
                'message' => 'Dear ' . $user->name . ', we are happy to inform you that your account has been verified. Happy future trading with us.',
                'read' => 1
            ]);

            return redirect()->back()->with('success', 'User has been verified.');
        } else {
            return redirect()->back()->with('error', 'User has been verified already.');
        }
    }
}
