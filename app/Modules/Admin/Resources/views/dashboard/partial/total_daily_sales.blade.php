@php
    $total_unit_1=0;
    $total_price_1=0;
    $total_unit=0;
    $total_price=0;

foreach($daily_diesel_sales['nozzel'] as $key=>$nozzel){


            $date="-";
            $rate="-";
            $sales_unit="-";
            $total_sales_price="-";
            if($daily_diesel_sales['dailysales'][$key] != null){
            $date=date("Y-m-d", strtotime($daily_diesel_sales['dailysales'][$key]->created_at));
            $rate=priceFormat($daily_diesel_sales['dailysales'][$key]->rate);
            $sales_unit=$daily_diesel_sales['dailysales'][$key]->sales_unit;
            $total_sales_price=priceFormat($daily_diesel_sales['dailysales'][$key]->total_sales_price);

             $total_unit_1=$total_unit_1+$sales_unit;
            $total_price_1=$total_price_1+$daily_diesel_sales['dailysales'][$key]->total_sales_price;
            }
}

foreach($daily_petrol_sales['nozzel'] as $key=>$nozzel){
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
}


@endphp

<div class="col-lg-12 col-xl-12">
    <div class="card bd-card">
        <div class="bg-blue-400 card-header header-elements-inline">
            <h5 class="card-title text-uppercase font-weight-semibold">Total Daily Sales</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap font-size-lg">
                <thead>
                <tr>
                    <th class="text-center">Fuel</th>
                    <th class="text-center">Unit</th>
                    <th class="text-right">Total Sales</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center">Petrol</td>
                    <td class="text-center">{{round($total_unit,3)}}</td>
                    <td class="text-right">{{priceFormat($total_price)}}</td>
                </tr>
                <tr>
                    <td class="text-center">Diesel</td>
                    <td class="text-center">{{round($total_unit_1,3)}}</td>
                    <td class="text-right">{{priceFormat($total_price_1)}}</td>
                </tr>
                </tbody>
                <tfoot>
                    <tr style="border-top: 2px solid #ccc;">
                        <th class="text-center">Total Sales</th>
                        <th class="text-center">{{round($total_unit + $total_unit_1,3)}}</th>
                        <th class="text-right">{{priceFormat($total_price+$total_price_1)}}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
