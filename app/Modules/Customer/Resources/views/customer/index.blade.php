@extends('admin::layout')
@section('title')Customer @stop
@section('breadcrum')Customer @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 


 <div class="card">
        <div class="card-header bg-teal-400 header-elements-inline">
            <a href="{{ route('customer.create') }}" class="btn bg-warning-600 btn-labeled btn-labeled-left" style="float: left"><b><i class="icon-add-to-list"></i></b> Add Customer</a>
        </div>
    </div>

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Customer</h5>

    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Total Sales</th>
                    <th>Total Credit Earned</th>
                    <th>Current Credit</th>
                    <th> Worth</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($customer_info->total() != 0) 
                @foreach($customer_info as $key => $value)

                <tr>
                    <td>{{$customer_info->firstItem() +$key}}</td>
                     <td>{{ $value->name }}</td>
                     <td>{{ $value->CurrencyInfo->name }} {{ $value->orders->where('status','completed')->sum('sale_amount') }}</td>
                     <td>{{ $value->rewards->sum('reward_amount') }} pts.</td>
                     <td>{{ $value->reward_credit}} pts. </td>
                     <td> {{$value->CurrencyInfo->name}} {{$value->credit_worth}} </td>
                    <td>

                        {{-- <a class="btn bg-teal-400 btn-icon rounded-round" href="{{route('customer.edit',$value->id)}}" data-popup="tooltip" data-original-title="Edit" data-placement="bottom"><i class="icon-pencil6"></i></a> --}}
                        <a href="{{route('reward.index',$value->id)}}" class="btn btn-warning"><i class=" icon-trophy4"></i> Reward</a>
                        {{-- <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger-400 btn-icon rounded-round delete_customer" link="{{route('customer.delete',$value->id)}}" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a> --}}
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No Customer Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            @if($customer_info->total() != 0)
                {{ $customer_info->links() }}
            @endif
            </span>
    </div>
</div>

 <!-- Warning modal -->
    <div id="modal_theme_warning" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-body">
                    <center>
                        <i class="icon-alert text-danger icon-3x"></i>
                    </center>
                    <br>
                    <center>
                        <h2>Are You Sure Want To Delete ?</h2>
                        <a class="btn btn-success get_link" href="">Yes, Delete It!</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->

<!-- /warning modal -->

    
<script type="text/javascript">
    $('document').ready(function() {
        $('.delete_customer').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });
    });

</script>

@endsection