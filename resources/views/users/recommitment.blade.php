@extends('layouts.nav')
@section('title', 'Make an investment')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="text-center">Recommitment Guides</h4>
                    </div>
                    <div class="card-body">
                        <h4>Please take note of this <ins class="text-danger ">Instructions</ins> before making a
                            Recommitments</h4>
                        <ol>
                            <h5>
                                <li>Recommitments Must not be less than <b>5,000</b>.</li>
                            </h5>
                            <h5>
                                <li>After making a Recommitment, Upload a proof of payment for the admin to confirm it.</b>.
                                </li>
                            </h5>
                            <h5>
                                <li>Wait after 3 days to be able to place a withdrawal order on the Recommitment. </li>
                            </h5>
                            <h5>
                                <li>Your Recommitment duration starts counting after the admin has confirmed your
                                    investment.
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
                            <h4>Phone Number: <a href="tel://08134883991">08134883991</a></h4>
                        @endforeach
                        <hr>
                        <form action="{{ route('recommitments.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="proof">Screenshot of Payment</label>
                                <input id="proof" class="form-control" type="file" name="proof">
                                @error('proof')
                                <li class="text-danger">{{ $message }}</li>
                                @enderror
                            </div>
                            @csrf
                            <div class="form-group">
                                <input value="{{ old('amount') }}" type="number" name="amount" id="amount"
                                    class="form-control" placeholder="Amount Sent">
                                @error('amount')
                                <li class="text-danger">{{ $message }}</li>
                                @enderror
                            </div>
                            <input type="hidden" name="usyer_id" value="{{ Auth::id() }}">
                            <div class="form-group">
                                <input value="{{ old('name_of_sender') }}" type="text" name="name_of_sender" id=""
                                    class="form-control" placeholder="Your Name on the account">
                                @error('name_of_sender')
                                <li class="text-danger">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Upload Proof of Payment" class="btn btn-primary btn-sm">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
