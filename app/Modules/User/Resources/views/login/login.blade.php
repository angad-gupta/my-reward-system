<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Rara Ads CMS</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/global/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('admin/global/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('admin/global/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('admin/global/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>

	<script src="{{asset('admin/js/app.js')}}"></script>
	<script src="{{asset('admin/global/js/demo_pages/login.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
                    {!! Form::open(['route'=>'login-post','method'=>'POST','class'=>'login-form wmin-sm-400','role'=>'form','files' => true]) !!} 
					<div class="card mb-0 border-top-success" style="border-radius: 40px;background-color: gainsboro;">

						<div class="card-body">
							
							<div>
								<div class="text-center mb-3">
										 @if(isset($setting))
							            <img src="{{ asset('uploads/setting/'.$setting->company_logo)}}" alt="" width="50%" height="50%">
							            @else
							            {{-- <img src="{{ asset('admin/global/images/sharma_logo.png')}}" alt="" width="50%" height="50%"> --}}
							            @endif 
							        {{-- <img src="{{asset('home/images/logo.png')}}" alt="" width="50%" height="50%"> --}}
									<h5 class="mb-0 mt-2">Login to <b class="text-pink">Reward System</b></h5>
									<!-- <span class="d-block text-muted">Your credentials</span> -->
									<h6>Username : admin@gmail.com</h4>
									<h6>Password : admin@gmail.com</h4>
								</div>
                                @include('flash::message')

								<div class="form-group form-group-feedback form-group-feedback-left">
									{!! Form::text('username', $value = null, ['id'=>'username','placeholder'=>'Enter Username','class'=>'form-control']) !!}
									<div class="form-control-feedback">
										<i class="icon-user text-success"></i>
									</div>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									{!! Form::password('password', ['id'=>'password', 'placeholder'=> 'Enter Password','class'=>'form-control']) !!}
									<div class="form-control-feedback">
										<i class="icon-lock2 text-success"></i>
									</div>
								</div> 


								<div class="form-group">
									<button type="submit" class="btn btn-warning btn-block"><b>Proceed</b></button>
								</div>
								
                               
							</div>
						</div>
					</div>
				 {!! Form::close() !!}
				<!-- /login form -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
