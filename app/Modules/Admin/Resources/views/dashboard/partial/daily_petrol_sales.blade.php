<div class="col-lg-12 col-xl-6">
    <div class="card bd-card">
        <div class="bg-warning-400 card-header header-elements-inline">
            <h5 class="card-title text-uppercase font-weight-semibold">Daily Petrol Sales </h5>
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
                    <th>Nozzle</th>
                    <th class="text-right">Unit Sales</th>
                    <th class="text-right">Rate</th>
                    <th class="text-right">Total</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @php
                $total_unit=0;
                $total_price=0;
                    @endphp
                @foreach($daily_petrol_sales['nozzel'] as $key=>$nozzel)
                    <tr>
                        @php
                            $date="-";
                            $rate="-";
                            $sales_unit="-";
                            $total_sales_price="-";
                            if($daily_petrol_sales['dailysales'][$key] != null){
                            $date=date("Y-m-d", strtotime($daily_petrol_sales['dailysales'][$key]->created_at));
                            $rate=priceFormat($daily_petrol_sales['dailysales'][$key]->rate);
                            $sales_unit=$daily_petrol_sales['dailysales'][$key]->sales_unit;
                            $total_sales_price=priceFormat($daily_petrol_sales['dailysales'][$key]->total_sales_price);
                            $total_unit=$total_unit+$sales_unit;
                            $total_price=$total_price+$daily_petrol_sales['dailysales'][$key]->total_sales_price;



                            }
                        @endphp
                        <td>{{$date}}</td>
                        <td>{{$nozzel->nozzle_name}}</td>
                        <td class="text-right">{{round($sales_unit,3)}}</td>
                        <td class="text-right">NPR. {{$rate}}</td>
                        <td class="text-right">
                            <h6 class="font-weight-semibold text-danger mb-0">NPR. {{$total_sales_price}}</h6>
                        </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot style="border-top: 2px solid #ccc;">
                    <tr>
                        <th colspan="2" class="text-left">Total Unit</th>
                        <th class="text-right">{{round($total_unit,3)}}</th>
                        <th>Total Selling price </th>
                        <th>NPR. {{priceFormat($total_price)}}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
