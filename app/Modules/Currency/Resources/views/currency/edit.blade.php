@extends('admin::layout')
@section('title')Brand @stop 
@section('breadcrum')Update Brand @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/brand.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Brand</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::model($brand_info,['method'=>'PUT','route'=>['brand.update',$brand_info->id],'class'=>'form-horizontal','id'=>'brand_submit','role'=>'form','files'=>true]) !!} 
        	
        	@include('brand::brand.partial.action',['btnType'=>'Update']) 
        
        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop