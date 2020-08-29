@extends('layouts.nav')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    {{ ucfirst($proof->name_of_sender) }} Uploaded a proof of payment
                </div>
                <div class="card-body">

                    <img src="/storage/proofs/images/{{ $proof->image }}" alt="proof of payment" width="100%">

                </div>
                <div class="card-footer">
                    <a href="{{ route('approve', $proof->user_id) }}" class="btn btn-primary float-left">Approve</a>
                    <a href="{{ route('decline', $proof->user_id) }}" class="btn btn-danger ml-3 float-left">Decline</a>
                </div>
            </div>
        </div>
    </div>
@endsection
