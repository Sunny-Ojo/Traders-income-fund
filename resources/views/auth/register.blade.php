@extends('layouts.app')
@section('content')
@section('title', 'Register with us')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">{{ __('Register With Us') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group ">
                                <label for="name" class="">{{ __('Full Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label for="username" class="">{{ __('Username') }}</label>
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label for="email" class="">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="phone" class="">{{ __('Phone Number') }}</label>

                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label for="referral_id" class="">{{ __('Referral ID') }} <b>(OPTIONAL)</b></label>

                                <input id="referral_id" type="text"
                                    class="form-control @error('referral_id') is-invalid @enderror" name="referral_id"
                                    value="{{ $ref_name ?? ' ' }}" autocomplete="referral_id">

                                @error('referral_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="account_name" class="">{{ __('Account Name') }}</label>

                                <input id="account_name" type="text"
                                    class="form-control @error('account_name') is-invalid @enderror" name="account_name"
                                    value="{{ old('account_name') }}" required autocomplete="account_name">

                                @error('account_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="account_number" class="">{{ __('Account Number') }}</label>

                                <input id="account_number" type="number"
                                    class="form-control @error('account_number') is-invalid @enderror" name="account_number"
                                    value="{{ old('account_number') }}" required autocomplete="account_number">

                                @error('account_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="bank_name" class="">{{ __('Bank Name') }} <b>(Correct Name of Bank)</b></label>

                                <input id="bank_name" type="text"
                                    class="form-control @error('bank_name') is-invalid @enderror" name="bank_name"
                                    value="{{ old('bank_name') }}" required autocomplete="bank_name">

                                @error('bank_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label for="password" class="">{{ __('Password') }}</label>

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="form-group  mb-0">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
