@foreach($daily_sales as $key=>$value)
    @php
        $color = hr_randomcolor();
$input = array("bg-warning-400", "bg-green-400", "bg-danger-400", "bg-blue-400", "bg-pink-400", "bg-orange-400", "bg-teal-400", "bg-info-400");
$k = array_rand($input);
$v = $input[$k];
    @endphp
    <div class="col-lg-12 col-xl-6">
        <div class="card bd-card">
            <div class="{{$v}} card-header header-elements-inline">
                <h5 class="card-title text-uppercase font-weight-semibold">{{$key}} </h5>
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
                        <th class="text-center">Date</th>
                        <th class="text-center">Total Income</th>
                        <th class="text-right">Final Cash (After Petty Exp.)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($value as $data)
                        <tr>
                            <td class="text-center">{{$data->date}}</td>
                            <td class="text-center">{{$data->total_collection_before}}</td>
                            <td class="text-center">{{$data->total_collection}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endforeach



