@extends('layouts.admin')
@section('content')
@section('title', 'Users Recommitments ')

    <h1 class="h3 mb-2 text-gray-800">All Recommitments of Users </h1>
    @if (count($proofs) > 0)
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Investments of Users</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                        <thead>
                            <tr>
                                <th>Name of User</th>
                                {{-- <th>Amount Sent</th> --}}
                                {{-- <th>{{ Status }}</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name of Sender</th>
                                {{-- <th>Amount Sent</th> --}}
                                {{-- <th>Status</th> --}}
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($proofs as $proof)
                                <tr>

                                    <td>{{ $proof->name_of_sender }}</td>
                                    {{-- <td>
                                        {{ $usersRecommitment->amount }}
                                    </td> --}}
                                    {{-- @if ($usersRecommitment->confirmed == 0)
                                        <td>{{ 'Not Confirmed' }}</td>
                                        @else
                                        <td>{{ 'Confirmed' }}</td>

                                    @endif --}}


                                    <td><a href="{{ route('showProof', $proof->id) }}" class="btn btn-primary">View
                                        </a></td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="jumbotron text-center">
            <h4>No recommitment is available. </h4>
        </div>
    @endif
@endsection
