@extends('admin::layout') 
@section('title')User Role @stop
@section('breadcrum')User Role @stop


@section('content')
<div class="card">
    <div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
        <a href="{{ route('role.create') }}" class="btn bg-teal-400"><i class="icon-plus-circle2"></i> Add Role</a>
    </div>
</div>


<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Role</h5>

    </div>

    <div class="table-responsive">
        <table class="table table-bordered bg-teal-600">
            <thead>
                <tr class="bg-info-600">
                    <th>#</th>
                    <th>Role Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               
                @if($role->total() != 0) 
                 @foreach($role as $key => $value)

                <tr>
                    <td>{{$role->firstItem() +$key}}</td>
                    <td>{{ $value->name }}</td>
                    
                    <td class="{{ ($value->status == '1') ? 'text-teal' : 'text-warning' }} "><span data-popup="tooltip" data-original-title="{{ ($value->status == '1') ? 'Active' : 'In-Active' }}"><i class="{{ ($value->status == '1') ? 'icon-check' : 'icon-x' }}"></i> </span></td>
                    <td>
                        
                        
                        <a class="btn bg-info btn-icon rounded-round" href="{{route('role.edit',$value->id)}}" data-popup="tooltip" data-placement="bottom" data-original-title="Edit"><i class="icon-pencil6"></i></a>

                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger btn-icon rounded-round delete_role" link="{{route('role.delete',$value->id)}}" data-popup="tooltip" data-placement="bottom" data-original-title="Delete"><i class="icon-bin"></i></a>
                    </td>
                </tr>
                @endforeach @else
                <tr>
                    <td colspan="4">No Role Found !!!</td>
                </tr>
                @endif
            </tbody>
        </table>
        
        <span style="margin: 5px;float: right;">
            @if($role->total() != 0) 
                {{ $role->links() }}
            @endif
        </span>
        
    </div>
</div>


<!-- Warning modal -->
<div id="modal_theme_warning" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h6 class="modal-title">Are you sure to Delete a Role ?</h6>
            </div>

            <div class="modal-body">
                <a class="btn btn-success get_link" href="">Yes</a> &nbsp; | &nbsp;
                <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- warning modal -->


<script type="text/javascript">
    $('document').ready(function() {
        $('.delete_role').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        }); 
        
        
    });
</script>

@endsection