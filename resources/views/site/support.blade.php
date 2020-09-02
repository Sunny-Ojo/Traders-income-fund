@extends('layouts.nav')
@section('title', 'Admin Support Teams')
@section('content')
    <div class="row justify-content-center">
        @if (count($support) > 0)
            @foreach ($support as $admin)
                <div class="col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-header bg-2 text-center">
                            <h4 class="text-white">Admin Support</h4>
                        </div>
                        <div class="card-body">

                            <h5> Name: <b>{{ $admin->name }}</b></h5>
                            <h5> Phone Number: <b> <a href="tel://{{ $admin->phone }}">{{ $admin->phone }}</a></b></h5>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
