@extends('layouts.admin')
@section('title', 'All Admin Bank Details')
@section('content')
    <div class="row justify-content-center">
        @if (count($bankDetails) > 0)
            @foreach ($bankDetails as $bankDetail)
                <div class="col-md-4 col-lg-4">
                    <div class="card">
                        <h5 class="card-header bg-2 text-center">Admin Bank Details</h5>
                        <div class="card-body text-center p-2">
                            <b>Account Name</b>: {{ ucfirst($bankDetail->account_name) }}<br />
                            <hr />
                            <b>Account Number</b>
                            {{ $bankDetail->account_number }}<br />
                            <hr />
                            <b>Bank Name</b>: {{ $bankDetail->bank_name }}<br />
                            <hr />
                            <b>Phone Number</b>:
                            {{ $bankDetail->phone }}<br />
                            <hr />
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection
