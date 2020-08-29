@extends('layouts.admin')
@section('content')
    @if (count($proofs) > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="bg-success ">
                    <tr class="text-white">
                        <th>Name Of Sender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proofs as $proof)
                        <tr>
                            <td scope="row">{{ ucfirst($proof->name_of_sender) }}</td>
                            <td scope="row"> <a href="{{ route('showProof', $proof->id) }}"
                                    class="btn btn-primary btn-sm">View proof of Payment </a></td>
                        </tr>
                    @endforeach
        </div>
    @else

        <h2 class="bg-success">No Proof of payment is waiting for approval</h2>
    @endif

@endsection
