@extends('layouts.admin')
@section('title', 'User Withdrawal')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
            <div class="card">
                <h5 class="card-header bg-2">User Withdrawals</h5>
                <div class="card-body p-2 text-center">
                    <h4>
                        <li class="list-group-item"><b>Amount Invested:</b> {{ number_format($withdrawal->amount) }}</li>
                    </h4>
                    <h4>
                        <li class="list-group-item"><b>Amount to Withdraw:</b>
                            {{ number_format($withdrawal->withdrawable_amount) }}</li>
                    </h4>
                    <h4>
                        <li class="list-group-item"><b>Account Number:</b> {{ $withdrawal->account_number }}</li>
                    </h4>
                    <h4>
                        <li class="list-group-item"><b>Account Name:</b> {{ $withdrawal->account_name }}</li>
                    </h4>
                    <h4>
                        <li class="list-group-item"><b>Bank Name:</b> {{ $withdrawal->bank_name }}</li>
                    </h4>
                    <h4>
                        <li class="list-group-item"><b>Phone Number</b>:</b> {{ $withdrawal->phone }}</li>
                    </h4>
                </div>

            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header bg-1">Update Users Withdrawal status after paying him</div>
                <div class="card-body">
                    @if ($withdrawal->awaiting_payment == 'awaiting')
                        <h4>Please Update this users withdrawal status after successfully paying him with his account
                            details</h4>
                        <form action="{{ route('updateUsersWithdrawalStatus', $withdrawal->id) }}" method="post">
                            @csrf
                            <input
                                onclick="return confirm('Clicking Ok will update the Users withdrawal status to paid.\nPlease Ensure you have made the payment')"
                                type="submit" class="btn btn-primary mt-5" value="Update Users withdrawals status">
                        </form>
                    @else
                        <button class="btn btn-disabled text-center">User has been Paid already</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
</div>
