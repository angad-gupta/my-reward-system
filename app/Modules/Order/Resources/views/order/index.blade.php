@extends('admin::layout')
@section('title')Order @stop
@section('breadcrum')Order @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 


 <div class="card">
        <div class="card-header bg-teal-400 header-elements-inline">
            <a href="{{ route('order.create') }}" class="btn bg-warning-600 btn-labeled btn-labeled-left" style="float: left"><b><i class="icon-add-to-list"></i></b> Add Order</a>
        </div>
    </div>

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Order</h5>

    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Order Name</th>
                    <th>Currency</th>
                    <th>Sales Amount</th>
                    <th>Customer Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($order_info->total() != 0) 
                @foreach($order_info as $key => $value)

                <tr>
                    <td>{{$value->id}}</td>
                     <td>{{ $value->name }}</td>
                     <td>{{ $value->CurrencyInfo->name}}</td>
                     <td>{{ $value->sale_amount}}</td>
                     <td>{{ $value->CustomerInfo->name}}</td>
                
                     <td class="{{ ($value->status == 'completed') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">{{ ($value->status == 'completed') ? 'Completed' :'Pending' }} &nbsp;
                       @if($value->status != 'completed')
                        <a class="btn bg-teal-400 btn-icon rounded-round" href="{{route('order.complete',$value->id)}}" data-popup="tooltip" data-original-title="Mark Complete" data-placement="bottom"><i class="icon-pencil6"></i></a>
                        @endif
                    </td>
                  
                    <td>

                        {{-- <a class="btn bg-teal-400 btn-icon rounded-round" href="{{route('order.edit',$value->id)}}" data-popup="tooltip" data-original-title="Edit" data-placement="bottom"><i class="icon-pencil6"></i></a> --}}

                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger-400 btn-icon rounded-round delete_order" link="{{route('order.delete',$value->id)}}" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No Order Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            @if($order_info->total() != 0)
                {{ $order_info->links() }}
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
        $('.delete_order').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });
    });

</script>

@endsection