@extends('layouts.nav')
@section('title', 'My Profile')
@section('content')
    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header bg-1">Profile</h5>
            <div class="card-body p-2 text-center">

                <li class="list-group-item"><b>Name:</b> {{ $profile->name }}</li>
                <li class="list-group-item"><b>Email:</b> {{ $profile->email }}</li>
                <li class="list-group-item"><b>Username:</b> {{ $profile->username }}</li>
                <li class="list-group-item"><b>Referral Link:</b> {{ auth()->user()->referral_link() }}</li>
                <li class="list-group-item"><b>Phone Number</b>:</b> {{ $profile->phone }}</li>
                <li class="list-group-item"><b>Account Number:</b> {{ $profile->account_number }}</li>
                <li class="list-group-item"><b>Account Name:</b> {{ $profile->account_name }}</li>
                <li class="list-group-item"><b>Bank Name:</b> {{ $profile->bank_name }}</li>
                <li class="list-group-item"><b>Current Investment:</b> &#8358;{{ $profile->current_investment }}</li>
                <li class="list-group-item"><b>Upline:</b> {{ $profile->upline }}</li>
                <li class="list-group-item"><b>Date Joined:</b> {{ date('d-m-Y', strtotime($profile->created_at)) }}</li>
            </div>
        @endsection
