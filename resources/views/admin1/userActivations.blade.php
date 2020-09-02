@extends('layouts.admin')
@section('content')
@section('title', 'Pending Users')

    <h3 class="h3 mb-2 text-gray-800"> Pending Users</h3>
    @if (count($proofs) > 0)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All waiting for approval</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name of User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name of User</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($proofs as $proof)
                                <tr>

                                    <td>{{ $proof->name_of_sender }}</td>
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
            <h4>No User is Pending for activation. </h4>
            <div class="row justify-content-start">
                <div class="col-md-6">
                    <marquee behavior="" direction="left">If you can't view the users when there are pending Users, it
                        means you
                        are not the one to activate them</marquee>
                </div>
            </div>
        </div>
    @endif
    </div>
@endsection
