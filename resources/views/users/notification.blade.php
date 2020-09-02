@extends('layouts.nav')
@section('title', 'Notifications')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header text-center">My Notifications</div>
                <div class="card-body">
                    <div class="list-group">
                        @if (count($notifications) > 0)
                            @foreach ($notifications as $item)
                                <div class="list-group-item"> {{ $item->message }}.
                                    <span class="float-right text-danger">
                                        {{ $item->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            @endforeach
                            {{ $notifications->links() }}
                        @else
                            <div class="jumbotron text-center">
                                <h4>No Notifications</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
