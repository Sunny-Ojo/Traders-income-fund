@extends('layouts.nav')
@section('content')
@section('ref_link')
    @if (auth()->user()->awaiting_approval === 'verified')
        <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Referral Link</li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ auth()->user()->referral_link() }}</li>
                </ol>
            </nav>
        </div>
    @endif
@endsection
<script>
    $(".alert").alert();

</script>

{{-- if the user has not been verified at all, he'll see the make payment page
--}}
@if (auth()->user()->awaiting_approval === 'not_verified' || auth()->user()->awaiting_approval === 'declined')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Make a 1,000 payment to this bank account to activate your account</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($adminAccount as $admin)
                            <h4>Account Name: {{ $admin->account_name }}</h4>
                            <h4>Account Number: {{ $admin->account_number }}</h4>
                            <h4>Bank Name: {{ $admin->bank_name }}</h4>
                            <h4>Phone Number: <a href="tel://08134883991">08134883991</a></h4>
                        @endforeach
                        <p class="text-danger">After Successful Payment, Take a screenshot of your successful payment
                            and upload it.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Please upload your proof of payment here if you have made the payment</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('verifyUser') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="proof">Upload Proof of Payment</label>
                                <input id="proof" class="form-control" type="file" name="proof">
                                @error('proof')
                                <li class="text-danger">{{ $message }}</li>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Upload Proof of Payment" class="btn btn-primary btn-sm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- if the user has submitted his proof of payment, he'll only see a message telling
    him that his proof of payment is awaiting confirmation --}}
@elseif(auth()->user()->awaiting_approval === 'awaiting')


    {{-- if the user passes the two conditions, it means he has been verified and will
    have access to his dashboard --}}
@else

    <div class="ecommerce-widget">


        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-black">
                    <div class="card-body bg-1">
                        <h5 class="text-white">Investment Order</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1 text-white" style="font-size: 18px">
                                &#8358;{{ number_format(auth()->user()->current_investment) }}
                            </h1>
                        </div>
                        <div class="metric-label d-inline-block float-right text-white font-weight-bold">
                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-black">
                    <div class="card-body bg-1">
                        <h5 class="text-white ">Withdrawable Amount</h5>
                        <div class="metric-value d-inline-block" style="overflow-block: ">
                            {{-- checking if the user investment has been confirmed. if it
                            has, i will check if it is due for withdrawal or not --}}
                            @if (auth()->user()->investment_confirmed == 1)
                                <h1 class="mb-1 text-white text-small">
                                    &#8358;{{ number_format(auth()->user()->withdrawable_amount) }}
                                    @if (auth()->user()->invested_on == 3)
                                        <a href="{{ route('withdraw') }}"
                                            onclick="return confirm('Before Placing a withdrawal order, you will have to make a recommitment. \nProceed to continue..' )"
                                            class="btn btn-primary btn-sm">Withdraw</a>
                                    @else
                                        <button type="disabled" class="btn btn-secondary btn-sm">Not Due</button>
                                    @endif
                                </h1>
                            @else
                                <p class="text-warning bg-primary p-1">Investment has not been confirmed</p>
                            @endif

                        </div>
                        <div class="metric-label d-inline-block float-right text-white font-weight-bold">
                            <!-- <span><i class="fa fa-fw fa-arrow-up"></i></span><span>Time: </span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <!-- Rc and PH btn -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-bottom border-top-main">
                    <a href="#" data-toggle="modal" data-target="#rc">
                        <div class="card-body bg-2 text-center card-body-2">
                            Recommitment
                        </div>
                    </a> </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-bottom border-top-main">
                    <a href="" onclick="return confirm(\'Are you sure you want to activate this user?\')"> </a>

                    <div class="card-body bg-2 text-center card-body-2 pointer">
                        withdrawal placed
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">

            <!-- recent orders  -->
            <!-- ============================================================== -->
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <h5 class="card-header bg-1">Investment Order <a href="{{ route('investments') }}"> All
                            Investments</a></span></h5>
                    <div class="card-body p-2">
                        @foreach ($recommitments as $investment)
                            <div class="col-md-12 col-lg-12">
                                <div class=" bg-2 p-3">
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
                                </div>
                            </div>
                        @endforeach
                        <!-- col -->
                        @if (count($investments) > 0)
                            @foreach ($investments as $investment)


                                <div class="col-md-12 col-lg-12">
                                    <div class=" bg-2 p-3">
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
                                    </div>
                                </div>
                            @endforeach

                        @else
                            <h4 class="text-center text-danger">No Investments</h4>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <h5 class="card-header bg-2">Withdrawal Order <span class="float-right"> </h5>
                    <div class="card-body p-2">

                        @if (count($withdrawals) > 0)
                            @foreach ($withdrawals as $withdrawal)
                                <div class="col-md-12 col-lg-12">
                                    <div class=" bg-1 p-3">
                                        <button class="btn btn-sm bg-2">Status:
                                            @if ($withdrawal->awaiting_payment == 'awaiting')
                                                {{ 'Awaiting Payment' }}
                                            @else
                                                {{ 'Paid' }}
                                            @endif
                                        </button><br />
                                        Date: {{ date('d-m-Y', strtotime($withdrawal->created_at)) }}<br />
                                        Time:
                                        {{ date('h:i:s:a', strtotime($withdrawal->created_at, date_default_timezone_set('Africa/Lagos'))) }}<br />
                                        Amount Invested: &#8358; {{ number_format($withdrawal->amount) }}<br />
                                        Amount Receiveable:
                                        &#8358;{{ number_format($withdrawal->withdrawable_amount) }}<br />
                                        <br />

                                    </div>
                                </div>
                            @endforeach

                        @else
                            <h4 class="text-center text-danger">No Withdrawal Order has been placed</h4>
                        @endif


                    </div>
                </div>
            </div>

        </div>



        <div class="row">
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header bg-1">Transactions</h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="td-font">Total amount invested</td>
                                        <td>&#8358;{{ number_format(auth()->user()->total_amount_invested) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="td-font">Total amount received</td>
                                        <td>&#8358;{{ number_format(auth()->user()->total_amount_withdrawn) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="td-font">Bonus</td>
                                        <td>₦0 &nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end recent orders  -->
        </div>
    </div>

    </div>
    </div>

    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->

    {{-- <div class="modal fade" id="ph">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p></p>
                    <form method="post" class="createDonation" action="execute/create-new">
                        <label>Min Investment. ₦10,000<br />
                            Max Investment. ₦500,000</label><br />
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">₦</span>
                            </div>
                            <input placeholder="Amount" step="1" type="number" name="amount" class="form-control"
                                required />
                        </div>
                        <button type="submit" name="sendRequest" class="mt-1 btn bg-1">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="modal fade" id="wc">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>
                    <h4 class="text-mute text-center">Recommitment update</h4>
                    </p>
                    <p id="show-content" class="text-center"></p><br />
                </div>
            </div>
        </div>
    </div> --}}
@endif


@endsection
