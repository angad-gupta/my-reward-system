<div class="col-lg-12 col-xl-6">
    <div class="card bd-card">
        <div class="bg-slate-600 card-header header-elements-inline">
            <h5 class="card-title text-uppercase font-weight-semibold">Modi Oil (Diesel)</h5>
            <div class="header-elements">
                <a href="" class="btn btn-light btn-sm border-0 mr-2">View All</a>
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap font-size-lg">
                <thead>
                <tr>
                    <th>Date</th>
                    <th class="text-right">Unit (in ltr)</th>
                    <th class="text-right">Rate</th>
                    <th class="text-right">Total</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($diesel_rate_list->count() > 0)
                    @foreach($diesel_rate_list as $diesel_rate_value)
                        <tr>
                            <td>{{$diesel_rate_value->date}}</td>
                            <td class="text-right">1</td>
                            <td class="text-right">{{priceFormat($diesel_rate_value->rate)}}</td>
                            <td class="text-right">
                                <h6 class="font-weight-semibold text-danger mb-0">{{priceFormat($diesel_rate_value->rate)}}</h6>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Date Not Found</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
