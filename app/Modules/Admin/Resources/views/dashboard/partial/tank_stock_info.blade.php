<div class="col-lg-12 col-xl-6">
    <div class="card bd-card">
        <div class="bg-blue-400 card-header header-elements-inline">
            <h5 class="card-title text-uppercase font-weight-semibold">Fuel Stock Info</h5>
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
                    <th class="text-center">Tank Name</th>
                    <th class="text-center">Fuel Type</th>
                    <th class="text-right">Total Capacity</th>
                    <th class="text-right">Remaining Stock</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tank_stock as $value)
                    <tr>
                        <td class="text-center">{{$value['tank_name']}}</td>
                        <td class="text-center">{{ucfirst($value['type'])}}</td>
                        <td class="text-center">{{$value['total_capacity']}}</td>
                        <td class="text-center">{{$value['tank_remaining_stock']}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
