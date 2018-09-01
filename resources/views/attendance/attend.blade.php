<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>LBFESAS</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<!-- Bootstrap core CSS     -->
	<link href="{{asset('css/app.css')}}" rel="stylesheet" />
	<!--  Material Dashboard CSS    -->
	<link href="{{asset('css/material-dashboard.min.css?v=2.0.2')}}" rel="stylesheet" />
	<!--     Fonts and icons     -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons"
	/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="off-canvas-sidebar">
	<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white" id="navigation-example">
		<div class="container">
			<div class="navbar-wrapper">
				<a class="navbar-brand" href="#pablo"></a>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
				<span class="sr-only">Toggle navigation</span>
				<span class="navbar-toggler-icon icon-bar"></span>
				<span class="navbar-toggler-icon icon-bar"></span>
				<span class="navbar-toggler-icon icon-bar"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end">
				<ul class="navbar-nav">
				</ul>
			</div>
		</div>
	</nav>
	<div class="wrapper wrapper-full-page">
		<div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{ asset('images/bg-pricing.jpeg') }}'); background-size: cover; background-position: top center;">			<!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12 ml-auto mr-auto">
					@csrf
					<div class="card card-login card-hidden">
						<div class="card-header card-header-rose text-center">
							<h1 id="time" class="card-title"></h1>
							<h5 id="date" class="card-title"></h5>
						</div>
						<div class="card-body">
							<div class="text-center">
								<button id="timeInButton" class="btn btn-rose" data-toggle="modal" data-target="#timeInModal">
									1 Time-In
								</button>
								<button id="timeOutButton" class="btn btn-rose" data-toggle="modal" data-target="#timeOutModal">
									2 Time-Out
								</button>
							</div>
							<div class="row pt-4">
								<div class="col-md-10 mr-auto ml-auto">
									<div class="text-center">
										<h4>Press 1 or 2 from the numeric pad and enter your ID Number, then press the enter key</h4>
									</div>
								</div>
							</div>
							<hr class="pt-4 pb-4">
							<div class="row pb-5">
								<div class="col-md-8 mr-auto ml-auto">
									<div class="row">
										<div class="col-md-8">
											<h5>Employee ID:
												@if ( !empty($employee->id))
												{{ $employee->id }}  
												@endif
											</h5>
											<h5>Employee Name: 
												@if ( !empty($employee->fullName))
												{{ $employee->fullName }} 
												@endif
											</h5>
											<h5>Transaction:
												@if ( !empty($trans))
												{{ $trans }}
												@endif
											</h5>
											<h5>Status:
												@if ( !empty($status))
												<b class="text-success">{{ $status }}</b>
												@endif
											</h5>
										</div>
										<div class="col-md-4">
											<div class="pull-right">
												<div style="height:200px; width:200px; padding:5px; border:solid 2px gray; border-radius:100px;">
													@if (!empty($employee->fileName))
													<img src="{{ asset('storage/upload/'.$employee->fileName) }}" height="100%" width="100%" alt="User Photo" style="border-radius: 100px">
													@else
													<img src="{{ asset('images/default-avatar.png') }}" height="100%" width="100%" alt="User Photo" style="border-radius: 100px">
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<p class="text-center">Limunsudan Bayug Falls Employee Attendance</p>
			</div>
		</div>
	</div>
	<!-- small time in modal -->
	<div class="modal fade modal-mini modal-primary" tabindex="-1" id="timeInModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-small">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
					<h6 class="modal-title" id="myModalLabel">Enter ID Number<br>Time-In</h6>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{ route('employee.attend') }}">
						@csrf
						<div class="input-group">
							<span class="input-group-addon">
								<i class="material-icons">contacts</i>
							</span>
							<div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
								<label class="md-label-floating">ID Number
									<small class="text-danger">*</small>
								</label>
								<input name="id" id="id" type="text" class="form-control" autofocus> 
								<input type="hidden" name="type" value="In">
								<input type="hidden" name="check" value="attend">
								<span class="material-icons form-control-feedback">clear</span>
								@if ($errors->has('id'))
								<span class="help-block">
									<strong>{{ $errors->first('id') }}</strong>
								</span>
								@endif
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-center">
						<button id="submitButton" type="submit" style="display:none;"></button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--    end small time in modal -->
	<!-- small time out modal -->
	<div class="modal fade modal-mini modal-primary" tabindex="-1" id="timeOutModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-small">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
					<h6 class="modal-title" id="myModalLabel">Enter ID Number<br>Time-Out</h6>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{ route('employee.attend') }}">
						@csrf
						<div class="input-group">
							<span class="input-group-addon">
								<i class="material-icons">contacts</i>
							</span>
							<div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
								<label class="md-label-floating">ID Number
									<small class="text-danger">*</small>
								</label>
								<input name="id" id="id" type="text" class="form-control" autofocus> 
								<input type="hidden" name="type" value="Out">
								<input type="hidden" name="check" value="attend">
								<span class="material-icons form-control-feedback">clear</span>
								@if ($errors->has('id'))
								<span class="help-block">
									<strong>{{ $errors->first('id') }}</strong>
								</span>
								@endif
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-center">
						<button id="submitButton" type="submit" style="display:none;"></button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--    end small time-out modal -->
</body>
<!--   Core JS Files   -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="{{asset('js/arrive.min.js')}}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('js/moment.min.js')}}"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="{{asset('js/chartist.min.js')}}"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('js/jquery.bootstrap-wizard.js')}}"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{asset('js/bootstrap-notify.js')}}"></script>
<!--   Sharrre Library    -->
<script src="{{asset('js/jquery.sharrre.js')}}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{asset('js/jquery-jvectormap.js')}}"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="{{asset('js/nouislider.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1_8C5Xz9RpEeJSaJ3E_DeBv8i7j_p6Aw"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('js/jquery.select-bootstrap.js')}}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{asset('js/jquery.datatables.js')}}"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="{{asset('js/sweetalert2.all.js')}}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('js/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{asset('js/fullcalendar.min.js')}}"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('js/jquery.tagsinput.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('js/material-dashboard.min.js?v=2.0.2')}}"></script>
<script src="{{asset('js/background.js')}}"></script>

@include('sweetalert::alert')
<script type="text/javascript">
	$(document).ready(function () {
		background.checkFullPageBackgroundImage()
		
		setTimeout(function () {
			// after 1000 ms we add the class animated to the login/register card
			$('.card').removeClass('card-hidden');
		}, 500)
		
		function updateTime() {
			$('#time').html(moment().format('H:mm:ss A'));
		}
		setInterval(updateTime, 500);
		
		$('#date').html(moment().format('MMMM DD, YYYY'))
		
		$('#id').keypress(function (event) {
			if (event.which === 13) {
				$('#submitTimeIn').click()
			}
		})
		
		$(window).keypress(function (event) {
			if (event.which === 49 && !$('#timeInModal').hasClass('show') && !$('#timeOutModal').hasClass('show')) {
				console.log($('#timeInModal').hasClass('show'))
				$('#timeInButton').click()
				$('#timeInModal :text').val('')
			}
			else if (event.which === 50 && !$('#timeInModal').hasClass('show') && !$('#timeOutModal').hasClass('show')) {
				console.log($('#timeOutModal').hasClass('show'))
				$('#timeOutButton').click()
				$('#timeOutModal :text').val('')
			}
		})
		
		$('#timeInModal').on('shown.bs.modal', function() {
			$(this).find('[autofocus]').focus();
		})
		
		$('#timeOutModal').on('shown.bs.modal', function() {
			$(this).find('[autofocus]').focus();
		})
	})
</script>

</html>