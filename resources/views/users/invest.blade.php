@extends('layouts.nav')
@section('title', 'Make an investment')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="text-center">Investment Guides</h4>
                    </div>
                    <div class="card-body">
                        <h4>Please take note of this <ins class="text-danger ">Instructions</ins> before making an
                            investment</h4>
                        <ol>
                            <h5>
                                <li>Investments Must not be less than <b>5,000</b>.</li>
                            </h5>
                            <h5>
                                <li>After making an investment, Upload a proof of payment for the admin to confirm it.</b>.
                                </li>
                            </h5>
                            <h5>
                                <li>Wait after 5 days to be able to place a withdrawal order on the investment. </li>
                            </h5>
                            <h5>
                                <li>Your Investment duration starts counting after the admin has confirmed your investment.
                                </li>
                            </h5>
                        </ol>

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Pay To:</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($adminAccount as $admin)
                            <h4>Account Name: {{ $admin->account_name }}</h4>
                            <h4>Account Number: {{ $admin->account_number }}</h4>
                            <h4>Bank Name: {{ $admin->bank_name }}</h4>
                            <h4>Phone Number: <a href="tel://{{ $admin->phone }}">{{ $admin->phone }}</a></h4>
                            <hr>
                            <form action="{{ route('investment.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="proof">Screenshot of Payment</label>
                                    <input id="proof" class="form-control" type="file" name="proof">
                                    @error('proof')
                                    <li class="text-danger">{{ $message }}</li>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input value="{{ old('amount') }}" type="number" name="amount" id="amount"
                                        class="form-control" placeholder="Amount Sent">
                                    @error('amount')
                                    <li class="text-danger">{{ $message }}</li>
                                    @enderror
                                </div>
                                <input type="hidden" name="admin" value="{{ $admin->username }}">

                                <div class="form-group">
                                    <input type="submit" value="Upload Proof of Payment" class="btn btn-primary btn-sm">
                                </div>
                            </form>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
