
<div class="col-lg-12 col-xl-6">
    <div class="card bd-card bd-equal-height">
        <div class="bg-info-600 card-header header-elements-inline">
            <h5 class="card-title text-uppercase font-weight-semibold">Upcoming Credit Limit Expiry Date</h5>
            <div class="header-elements">
{{--                <a href="" class="btn btn-light btn-sm border-0 mr-2">View All</a>--}}
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped text-nowrap font-size-lg">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Credit Limit</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($client_expired_credit_limit->count() > 0)
                    @foreach($client_expired_credit_limit as $value)
                        @php
                            $date=date('Y-m-d');
                            $expDate=date('Y-m-d',strtotime($value->credit_time_limit));
                            $to = Carbon\Carbon::createFromFormat('Y-m-d', $date);
                            $from = Carbon::createFromFormat('Y-m-d',$expDate);
                            $diff_in_days = $to->diffInDays($from);
                        @endphp
                        <tr>
                            <td >{{$value->credit_time_limit}}</td>
                            <td width="20px">{{$diff_in_days}} Days Remaining To Expire of {{$value->getClient->customer_org_name}}</td>
                            <td>{{$value->credit_amount_limit}}</td>
                            <td><a href="{{route('clientCreditLog.index',['client_id'=>$value->clients_id,'credit_code'=>$value->credit_code])}}" title="View"><i class="icon-eye"></i></a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No Credit Expired</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
