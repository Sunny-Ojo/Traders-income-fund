@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    {{ ucfirst($recommitments->name_of_sender) }} Uploaded a proof of payment for an recommitment
                </div>
                <div class="card-body">

                    <img src="/storage/proofs/recommitments/{{ $recommitments->screenshot }}" alt="recommitment of payment"
                        width="100%">

                </div>
                <div class="card-footer">
                    @if ($recommitments->confirmed == 0)
                        <a href="{{ route('approveRecommitment', [$recommitments->id, $recommitments->user_id]) }}"
                            class="btn btn-primary float-left">Approve</a>
                        <a href="{{ route('declineRecommitment', [$recommitments->id, $recommitments->user_id]) }}"
                            class="btn btn-danger ml-3 float-left">Decline</a>
                    @else
                        <button class="disabled btn btn-primary">It has been approved already</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
