@extends('admin::layout')
@section('title')Reward @stop
@section('breadcrum')Reward @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 


<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Reward :: {{$customer->name}} </h5> <a class="btn btn-danger" href="{{route('customer.index')}}">Back</a>

    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Order Name</th>
                    <th>Sale Amount</th>
                    <th>Reward Points</th>
                    <th>Status</th>
                    <th>Expiry Date</th>
                </tr>
            </thead>
            <tbody>
                @if($reward_info->total() != 0) 
                @foreach($reward_info as $key => $value)

                <tr>
                    <td>{{$reward_info->firstItem() +$key}}</td>
                     <td>{{ $value->order->name }}</td>
                     <td>{{$value->order->CurrencyInfo->name}}: {{$value->order->sale_amount}}</td>
                     <td>{{ $value->reward_amount }} pts. </td>
                     <td> {{ $value->expiry_status}} </td>
                     <td>{!! date('M d, Y', strtotime($value->expiry_date)) !!}</td>
            
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No Reward Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            @if($reward_info->total() != 0)
                {{ $reward_info->links() }}
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