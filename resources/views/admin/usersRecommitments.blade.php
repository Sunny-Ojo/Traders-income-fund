@extends('layouts.admin')
@section('content')
@section('title', 'Users Recommitments ')

    <h3 class="h3 mb-2 text-gray-800">All Recommitments of Users </h3>
    @if (count($recommitment) > 0)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Recommitments of Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name of User</th>
                                <th>Amount Sent</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name of User</th>
                                <th>Amount Sent</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($recommitment as $usersRecommitment)
                                <tr>

                                    <td>{{ $usersRecommitment->name_of_sender }}</td>
                                    <td>
                                        {{ number_format($usersRecommitment->amount) }}
                                    </td>
                                    @if ($usersRecommitment->confirmed == 0)
                                        <td>{{ 'Not Confirmed' }}</td>
                                    @else
                                        <td>{{ 'Confirmed' }}</td>

                                    @endif
                                    <td><a href="{{ route('usersRecommitment.show', $usersRecommitment->id) }}"
                                            class="btn btn-primary">View
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
            <div class="row justify-content-start">
                <div class="col-md-6">
                    <marquee behavior="" direction="left">If you can't view the users when there are pending recommitments,
                        it
                        means you
                        are not the one to approve them</marquee>
                </div>
            </div>
        </div>

    @endif
    </div>
@endsection
