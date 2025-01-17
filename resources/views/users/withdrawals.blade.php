 @extends('layouts.nav')
 @section('title', 'Withdrawals')
 @section('content')
     <h5 class="card-header bg-1">Withdrawal Order</h5>
     <div class="row">
         @if (count($withdrawals) > 0)
             @foreach ($withdrawals as $withdrawal)
                 <div class="col-md-4 col-lg-4">
                     <div class="card">
                         <div class="card-body p-2">
                             <div class=" bg-2 p-3">
                                 <p class="">
                                     <button class="btn btn-sm bg-1">Status: @if ($withdrawal->awaiting_payment == 'awaiting')
                                             {{ 'Awaiting Payment' }}
                                         @else
                                             {{ 'Paid' }}
                                         @endif</button><br />
                                     Date: {{ date('d-m-Y', strtotime($withdrawal->created_at)) }}
                                     <br />
                                     Time:
                                     {{ date('h:i:s:a', strtotime($withdrawal->created_at, date_default_timezone_set('Africa/Lagos'))) }}
                                     <br />
                                     Amount: &#8358;{{ number_format($withdrawal->amount) }}<br />
                                     Withdrawable Amount:
                                     &#8358;{{ number_format($withdrawal->withdrawable_amount) }}<br />
                                 </p>
                             </div>
                         </div>
                     </div>
                 </div>
             @endforeach
             <div class="container"> {{ $withdrawals->links() }}</div>
         @else
             <div class="jumbotron text-center ml-3">
                 <h4 class="text-center ">No Withdrawal History <i class="fa fa-history" aria-hidden="true"></i></h4>
             </div>
         @endif
     </div>
     </div>
     </div>
     </div>
     </div>
 @endsection
