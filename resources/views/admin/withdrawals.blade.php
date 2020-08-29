@extends('layouts.admin')
@section('content')
@section('title', 'Users Withdrawals ')

    <h1 class="h3 mb-2 text-gray-800">All Withdrawals of Users waiting for Payment</h1>
    @if (count($withdrawals) > 0)
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
                                <th>Amount to receive</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name of User</th>
                                <th>Amount to receive</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($withdrawals as $withdrawal)
                                <tr>

                                    <td>{{ $withdrawal->name_of_receiver }}</td>
                                    <td>
                                        {{ number_format($withdrawal->withdrawable_amount) }}
                                    </td>
                                    @if ($withdrawal->awaiting_payment == 'awaiting')
                                        <td>{{ 'Not Paid' }}</td>
                                    @else
                                        <td>{{ 'Paid' }}</td>

                                    @endif
                                    <td><a href="{{ route('showUserWithdrawals', $withdrawal->id) }}"
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
            <h4>No Withdrawal is available. </h4>
        </div>
    @endif
@endsection
