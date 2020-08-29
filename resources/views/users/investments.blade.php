@extends('layouts.nav')
@section('title', 'Investments')

@section('content')
    <h5 class="card-header bg-1">Investment Order</h5>

    <div class="row">

        <div class="col-md-4 col-lg-4">
            <div class="card">
                <div class="card-body p-2">
                    <div class=" bg-2 p-3">
                        <p class="">
                            <button class="btn btn-sm bg-1">Status: @if ($investment->confirmed == 0)
                                    {{ 'Not Confirmed' }}
                                @else
                                    {{ 'Confirmed' }}
                                @endif</button><br />
                            Date: {{ date('d-m-Y', strtotime($investment->created_at)) }}
                            <br />
                            Time:
                            {{ date('h:i:s:a', strtotime($investment->created_at, date_default_timezone_set('Africa/Lagos'))) }}
                            <br />
                            Amount: &#8358;{{ number_format($investment->amount) }}<br />
                            Withdrawable Amount:
                            &#8358;{{ number_format($investment->withdrawable_amount) }}<br />
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @if (count($recommitments) > 0)
            @foreach ($recommitments as $investment)
                <div class="col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-body p-2">
                            <div class=" bg-2 p-3">
                                <p class="">
                                    <button class="btn btn-sm bg-1">Status: @if ($investment->confirmed == 0)
                                            {{ 'Not Confirmed' }}
                                        @else
                                            {{ 'Confirmed' }}
                                        @endif</button><br />
                                    Date: {{ date('d-m-Y', strtotime($investment->created_at)) }}
                                    <br />
                                    Time:
                                    {{ date('h:i:s:a', strtotime($investment->created_at, date_default_timezone_set('Africa/Lagos'))) }}
                                    <br />
                                    Amount: &#8358;{{ number_format($investment->amount) }}<br />
                                    Withdrawable Amount:
                                    &#8358;{{ number_format($investment->withdrawable_amount) }}<br />
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="container"> {{ $recommitments->links() }}</div>
        @else
            <h4 class="text-center text-danger">No Investments</h4>
        @endif
    </div>
    </div>
    </div>
    </div>
@endsection
