<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showRegistrationForm(Request $request)
    {
        if ($request->has('ref')) {
            $ref = session(['referrer' => $request->query('ref')]);
            $ref_name = $request->query('ref');
            return view('auth.register')->with('ref_name', $ref_name);
        } else {
            return view('auth.register');
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required'],
            'referral_id' => ['nullable'],
            'account_name' => ['required'],
            'account_number' => ['required', 'string'],
            'bank_name' => ['required',],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //checking if session has a session called referrer when the register page was showed
        if (!empty(session('referrer'))) {
            $referrer = session()->pull('referrer');
            $getReferrer = User::where('username', $referrer)->first();
            if ($getReferrer) {
                $upline  =  $getReferrer->username;
            }
        } else {
            $upline = 'N\A';
        }

        return  User::create([
            'name' => $data['name'],
            'username' => str_replace(' ', '', $data['username']),
            'email' => $data['email'],
            'phone' => $data['phone'],
            'upline' => $upline ?? $data['referral_id'] ?? 'N/A',
            'account_name' => $data['account_name'],
            'account_number' => $data['account_number'],
            'bank_name' => $data['bank_name'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
