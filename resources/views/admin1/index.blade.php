@extends('layouts.admin')
@section('ref_link')
    <div class=" container page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Referral</li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ auth()->user()->referral_link() }}</li>

            </ol>
        </nav>
        <hr>
    </div>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1"> <a
                                    href="{{ route('userActivations') }}" class="text-success"> Pending User Activations</a>

                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $payment_proof }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                <a href="{{ route('userWithdrawals') }}" class="text-warning"> Pending User
                                    Withdrawals</a>

                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userWithdrawals }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1"><a
                                    href="{{ route('userInvestments') }}"> Pending User
                                    Trades</a>

                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $unconfirmed_investments }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1"><a
                                    href="{{ route('userRecommitments') }}"> Pending User
                                    Recommitments</a>

                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $unconfirmedRecommitment }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Number Of
                                Withdrawals Done</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($withdrawalsDone) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-12 col-lg-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a
                                    href="{{ route('users') }}" class="text-danger">Total Number Of Admin Accounts</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($adminAccounts) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a
                                    href="{{ route('users') }}" class="text-danger">Total Number Of Users</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($allUsers) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Number Of Trades

                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        {{ number_format($allInvestments) }}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: {{ $allInvestments }}%" aria-valuenow="{{ $allInvestments }}"
                                            aria-valuemin="0" aria-valuemax="1000"></div>
                                    </div>
                                </div>
                            </div>
                            <br>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->

    </div>

    </div>


@endsection
