@extends('admin::layout')
@section('title')User Log @stop
@section('breadcrum')User Log  @stop

@section('content') 

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">User Log</h5>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered bg-teal-600">
            <thead>
                <tr class="bg-info-600">
                    <th>#</th>
                    <th>Action</th>
                    <th>Date</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @if($data->total() != 0)
                @foreach($data as $key => $value)

                <tr>
                    <td>{{$data->firstItem() +$key}}</td>
                    <td>{{ $value->action }}</td>
                    <td>{{ $value->created_at }}</td>
                   
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4">No User Log Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>
        <span style="margin: 5px;float: right;">
            @if($data->total() != 0)
                {{ $data->links() }}
            @endif
            </span>
    </div>
</div>





@endsection