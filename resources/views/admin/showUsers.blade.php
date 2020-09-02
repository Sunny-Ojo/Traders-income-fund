@extends('layouts.admin')
@section('title', 'User Profile')
@section('content')
    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header bg-1">{{ $user->name }}</h5>
            <div class="card-body p-2 text-center">
                <li class="list-group-item"><b>Name:</b> {{ $user->name }}</li>
                <li class="list-group-item"><b>Email:</b> {{ $user->email }}</li>
                <li class="list-group-item"><b>Username:</b> {{ $user->username }}</li>

                <li class="list-group-item"><b>Phone Number</b>:</b> {{ $user->phone }}</li>
                <li class="list-group-item"><b>Account Number:</b> {{ $user->account_number }}</li>
                <li class="list-group-item"><b>Account Name:</b> {{ $user->account_name }}</li>
                <li class="list-group-item"><b>Bank Name:</b> {{ $user->bank_name }}</li>
                <li class="list-group-item"><b>Current Investment:</b> &#8358;{{ number_format($user->current_investment) }}
                </li>
                <li class="list-group-item"><b>Upline:</b> {{ $user->upline }}</li>
                <li class="list-group-item"><b>Date Joined:</b> {{ date('d-m-Y', strtotime($user->created_at)) }}</li>
            </div>
            <!-- Button trigger modal -->
            @if ($user->lastAdminPaidTo == auth()->user()->username)
                @if (!$user->awaiting_approval == 'verified')
                    <div class="row justify-content-start">
                        <div class="col-md-12 col-lg-6">
                            <button type="button" class=" ml-2 btn btn-success btn-sm " data-toggle="modal"
                                data-target="#modelId">
                                Activate User
                            </button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Activate User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <h4>Activating this user should only be when his proof of payment was declined and
                                            he
                                            called
                                            the admin he paid to. <br>If the admin finally verifies that the user paid for
                                            activation, you can verify the user</h4>
                                        <form id="form" action="{{ route('verifyUser', $user->id) }}" method="post">
                                            @csrf

                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Activate this user" id="submit" class="btn btn-primary"
                                        onclick="document.getElementById('form').submit()"> <button type="button"
                                        class="btn btn-secondary" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>


                @endif
            @endif

            <script>
                $('#exampleModal').on('show.bs.modal', event => {
                    var button = $(event.relatedTarget);
                    var modal = $(this);
                    // Use above variables to manipulate the DOM

                });

            </script>

            @if ($user->admin == 0)


                <!-- Modal -->
                <div class="modal fade" id="makeAdminModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Activate User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <h4>You are about to make this user an Admin of Traders Income Fund Global</h4>
                                    <form id="makeAdmin" action="{{ route('makeAdmin', $user->id) }}" method="post">
                                        @csrf

                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Make Admin" id="submit" class="btn btn-primary"
                                    onclick="document.getElementById('makeAdmin').submit()"> <button type="button"
                                    class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <button type="button" class=" btn btn-success " data-toggle="modal" data-target="#makeAdminModal">
                        Make Admin of Traders Income Fund
                    </button>
                </div>
            @else
                <a class="btn btn-primary active btn-disabled" role="button">
                    User is an Admin
                </a>
            @endif
        </div>
    </div>
    </div>
@endsection
