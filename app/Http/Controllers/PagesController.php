<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\ContactRequest;
use Session;
use App\Investment;
use App\Mail\ContactMessage;
use App\Notification;
use App\PaymentProof;
use App\PendingWithdrawal;
use App\Recommitment;
use App\User;
use App\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['sendContactMessage']]);
    }
    public function profile()
    {
        $profile = User::find(Auth::id());
        return view('users.profile')->with('profile', $profile);
    }
    public function donations()
    {
        $investments = Investment::where('user_id', Auth::id())->first();
        $recommitment = Recommitment::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->paginate(5);

        return view('users.investments')->with(['investment' => $investments, 'recommitments' => $recommitment]);
    }
    public function guider()
    {
        $investments = User::find(Auth::id());
        return view('users.guider')->with('investments', $investments);
    }

    public function withdrawals()
    {
        $withdrawal = PendingWithdrawal::where('user_id', Auth::id())->paginate(5);
        return view('users.withdrawals')->with('withdrawals', $withdrawal);
    }
    public function invest()
    {
        $payTo = User::where('receive_payment', 1)->first();
        return view('users.invest')->with('payTo', $payTo);
    }

    public function testimony()
    {
        $investments = User::find(Auth::id());
        return view('users.profile')->with('investments', $investments);
    }
    public function downlines()
    {
        $downlines = User::where('upline', auth()->user()->username)->get();
        return view('users.downlines')->with('dl', $downlines);
    }


    public function verifyPayment(Request $request)
    {
        $this->validate($request, [
            'proof' => "required|mimes:png,jpg,jpeg|image"
        ]);
        if ($request->hasFile('proof')) {
            $image = $request->file('proof')->getClientOriginalName();
            $imageExt = $request->file('proof')->getClientOriginalExtension();
            $imageNameOnly = pathinfo($image, PATHINFO_FILENAME);
            $imgTodb = $imageNameOnly . '_' . time() . '.' . $imageExt;
            $saveImage = $request->file('proof')->storeAs('public/proofs/images', $imgTodb);
        }
        $admin = User::where('username', $request->admin)->first();
        $adminPhone = $admin->phone;
        PaymentProof::create([
            'image' => $imgTodb,
            'user_id' => Auth::id(),
            'name_of_sender' => auth()->user()->name,
            'admin' => $request->admin,
        ]);
        $user = User::find(Auth::id());
        $user->awaiting_approval = 'awaiting';
        $user->lastAdminPaidTo = $request->admin;
        $user->adminToApproveActivation = $adminPhone;
        $user->save();
        return redirect('/dashboard/home')->with('success', 'Your proof of payment has successfully been submitted. Please kindly wait while we review your proof of payment');
    }

    public function notifications()
    {
        $notification = Notification::where('user_id', Auth::id())->update(['read' => 0]);
        $notifications =   Notification::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->paginate(10);

        return view('users.notification')->with('notifications', $notifications);
    }
    public function withdraw()
    {
        if (auth()->user()->invested_on == 5) {
            $adminAccount = User::where('admin', 1)->inRandomOrder()->limit(1)->get();
            return view('users.recommitment')->with('adminAccount', $adminAccount);
        }
        return redirect()->back()->with('error', 'Your withdrawal order was unsuccessful, you can only place your withdrawal order after 5 days.');
    }
    public function admin()
    {
        return view('admin1.index')->with('proofs', PaymentProof::all());
    }
    public function support()
    {
        return view('site.support')->with('support', User::where('admin', 1)->get());
    }
    public function contact()
    {
        return view('site.contact');
    }
    public function about()
    {
        return view('site.about');
    }
    public function sendContactMessage(ContactRequest $request)
    {
        $data = $request->only(['name', 'email', 'subject', 'message']);
        return Mail::to('njokusunnyojo@gmail.com')->send(new ContactMessage($data));
    }
}
