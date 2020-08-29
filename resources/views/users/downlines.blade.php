@extends('layouts.nav')
@section('title', 'My Referrals')
@section('content')
    @if (count($dl) > 0)
        @foreach ($dl as $referral)
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header bg-2">My Referrals</h5>
                        <div class="card-body p-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <p class="text-center">
                                                <hr />
                                                <b>Username</b>: {{ ucfirst($referral->name) }}<br />
                                                <hr />
                                                <b>Joined Date:</b>
                                                {{ date('d:m:Y', strtotime($referral->created_at)) }}<br />
                                                <hr />
                                                <b>Investment</b>: &#8358; {{ $referral->current_investment }}<br />
                                                <hr />
                                                <b>Total Investment</b>: &#8358;{{ $referral->total_amount_invested }}<br />
                                                <hr />
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        @endforeach

    @else
        <div class="jumbotron text-center">
            <h1>No Referral Yet!</h1>
            <h4>Copy your referral link and share with your friends and then get paid after they signed up and start
                investing <br> <span class="text-primary">
                    {{ auth()->user()->referral_link() }}
                </span></h4>
        </div>
    @endif
@endsection
