@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    {{ ucfirst($investment->name_of_sender) }} Uploaded a proof of payment for an investment
                </div>
                <div class="card-body">

                    <img src="/storage/proofs/investments/{{ $investment->screenshot }}" alt="investment of payment"
                        width="100%">

                </div>
                <div class="card-footer">
                    @if ($investment->confirmed == 0)
                        <a href="{{ route('approveInvestment', [$investment->id, $investment->user_id]) }}"
                            class="btn btn-primary float-left">Approve</a>
                        <a href="{{ route('declineInvestment', [$investment->id, $investment->user_id]) }}"
                            class="btn btn-danger ml-3 float-left">Decline</a>
                    @else
                        <button class="disabled btn btn-primary">It has been approved already</button>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
