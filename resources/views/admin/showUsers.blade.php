@extends('layouts.admin')
@section('title', 'User Profile')
@section('content')
    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header bg-1">{{ $user->name }}</h5>
            <div class="card-body p-2 text-center">
                <li class="list-group-item"><b>Name:</b> {{ $user->name }}</li>
                <li class="list-group-item"><b>Email:</b> {{ $user->email }}</li>
                <li class="list-group-item"><b>Username:</b> {{ $user->username }}</li>
                <li class="list-group-item"><b>Referral Link:</b> {{ auth()->user()->referral_link() }}</li>
                <li class="list-group-item"><b>Phone Number</b>:</b> {{ $user->phone }}</li>
                <li class="list-group-item"><b>Account Number:</b> {{ $user->account_number }}</li>
                <li class="list-group-item"><b>Account Name:</b> {{ $user->account_name }}</li>
                <li class="list-group-item"><b>Bank Name:</b> {{ $user->bank_name }}</li>
                <li class="list-group-item"><b>Current Investment:</b> &#8358;{{ $user->current_investment }}</li>
                <li class="list-group-item"><b>Upline:</b> {{ $user->upline }}</li>
                <li class="list-group-item"><b>Date Joined:</b> {{ date('d-m-Y', strtotime($user->created_at)) }}</li>
            </div>
        </div>
    </div>
@endsection
