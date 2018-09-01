<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}" />
	<meta name="csrf_token" content="{{ csrf_token() }}"/>
	<title>LBFESAS</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<!-- Bootstrap core CSS     -->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('css/daterangepicker.css')}}" rel="stylesheet" />
	<!--  Material Dashboard CSS    -->
	<link href="{{asset('css/material-dashboard.css?v=1.2.1')}}" rel="stylesheet" />
	<link href="{{asset('css/style.css')}}" rel="stylesheet" />
	<!--     Fonts and icons     -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons"
	/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{asset('images/sidebar-5.jpg')}}">
			<!--
				Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
				Tip 2: you can also add an image using data-image tag
				Tip 3: you can change the color of the sidebar with data-background-color="white | black"
			-->
			<div class="logo">
				<a href="" class="simple-text logo-mini">
					<i class="material-icons">school</i>
				</a>
				<a href="" class="simple-text logo-normal">
					Unknown
				</a>
			</div>
			<div class="sidebar-wrapper">
				<div class="user">
					<div class="photo">
						<img src="{{Auth::user()->fileName == null ? asset('images/default-avatar.png') : asset('storage/upload/'.Auth::user()->fileName)}}" />
					</div>
					<div class="info">
						<a data-toggle="collapse" href="#collapseExample" class="collapsed">
							<span>
								{{ Auth::user()->fname }} {{ Auth::user()->lname }} 
								<b class="caret"></b>
							</span>
						</a>
						<div class="clearfix"></div>
						<div class="collapse" id="collapseExample">
							<ul class="nav">
								<li>
									<a href="{{ route('teachers.show', Auth::user()->id) }}">
										<i class="material-icons">face</i>
										<span class="sidebar-normal"> My Profile </span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="material-icons">settings</i>
										<span class="sidebar-normal"> Settings </span>
									</a>
								</li>
								<li> <a href="{{ route('logout') }}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
									<i class="material-icons">launch</i>
									<span class="sidebar-normal"> Logout </span>
								</a>
								
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav">
				<li class="{{ Request::path() == '/' ? 'active' : '' }}">
					<a href="/">
						<i class="material-icons">dashboard</i>
						<p> Dashboard </p>
					</a>
				</li>
				<li class="{{ Request::path() == 'teachers' ? 'active' : '' }}">
					<a data-toggle="collapse" href="#teacher">
						<i class="material-icons">face</i>
						<p> Users
							<b class="caret"></b>
						</p>
					</a>
					<div class="collapse {{ Request::path() == 'teachers' || Request::path() == 'teachers/create' || Request::path() == 'admin' ? 'in' : '' }}" id="teacher">
						<ul class="nav">
							<li class="{{ Request::path() == 'teachers' || Request::path() == 'teachers/create'  ? 'active' : '' }}">
								<a href="{{ route('teachers.index') }}">
									<i class="material-icons">school</i>
									<span class="sidebar-normal"> Teacher </span>
								</a>
							</li>
							<li class="{{ Request::path() == 'admin' ? 'active' : '' }}">
								<a href="{{ route('admin.index') }}">
									<i class="material-icons">perm_identity</i>
									<span class="sidebar-normal"> Admin </span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="{{ Request::path() == 'record' ? 'active' : '' }}">
					<a href="{{ route('records.index') }}">
						<i class="material-icons">table</i>
						<p> Record </p>
					</a>
				</li>
				<li class="{{ Request::path() == 'history' ? 'active' : '' }}">
					<a href="{{ route('history.index') }}">
						<i class="material-icons">history</i>
						<p> History </p>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="main-panel">
		<nav class="navbar navbar-transparent navbar-absolute">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-left">
						<li class="separator hidden-lg hidden-md"></li>
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group form-search is-empty">
							<input type="text" class="form-control" placeholder=" Search ">
							<span class="material-input"></span>
						</div>
						<button type="submit" class="btn btn-white btn-round btn-just-icon">
							<i class="material-icons">search</i>
							<div class="ripple-container"></div>
						</button>
					</form>
				</div>
			</div>
		</nav>
		<div class="content">
			<div class="container-fluid">
				@yield('content')
			</div>
		</div>
		@include('layouts.footer')
	</div>
</div>
</body>
<!--   Core JS Files   -->
<script src="{{asset('js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material.min.js')}}" type="text/javascript"></script>
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
<script src="{{asset('js/daterangepicker.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('js/material-dashboard.js?v=1.2.1')}}"></script>
<script src="{{asset('js/demo.js')}}"></script>
@include('sweetalert::alert')
<script type="text/javascript">
	$(document).ready(function () {
		$('#datatables').DataTable({
			"pagingType": "full_numbers",
			"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "All"]
			],
			responsive: true,
			"order": [],
			language: {
				search: "_INPUT_",
				searchPlaceholder: "Search records",
			}
			
		});
		
		var table = $('#datatables').DataTable();
		
		$('#datatables tr[data-route]').click(function(){
			window.location.href = $(this).data('route')
		})
		
		$('.card .material-datatables label').addClass('form-group');
		
		$('.daterange').daterangepicker()
	});
</script>

<script>
	@if(Session::has('success'))
	$.notify({
		icon: 'notifications',
		message: '{{ Session::get("success") }}'
		
	}, {
		type: 'success',
		timer: 2000,
		placement: {
			from: 'top',
			align: 'center'
		}
	}).show();
	@php
	Session::forget('success');
	@endphp
	@elseif(Session::has('error'))
	$.notify({
		icon: 'notifications',
		message: '{{ Session::get("error") }}'
		
	}, {
		type: 'error',
		timer: 2000,
		placement: {
			from: 'top',
			align: 'center'
		}
	}).show();
	@php
	Session::forget('error');
	@endphp
	@endif
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".timepicker").datetimepicker({
			format:"h:mm A",
			icons:{time:"fa fa-clock-o",
			date:"fa fa-calendar",
			up:"fa fa-chevron-up",
			down:"fa fa-chevron-down",
			previous:"fa fa-chevron-left",
			next:"fa fa-chevron-right",
			today:"fa fa-screenshot",
			clear:"fa fa-trash",
			close:"fa fa-remove"
		}})		
		
		demo.initMaterialWizard();
		setTimeout(function() {
			$('.card.wizard-card').addClass('active');
		}, 600);
		
		$('#absentModal').on('show.bs.modal', function (e) {
			let type = $(e.relatedTarget).data('type')
			let day = $(e.relatedTarget).data('day')
			let id = $(e.relatedTarget).data('id')
			let date = $(e.relatedTarget).data('date')
			let month = $(e.relatedTarget).data('month')
			let time = $('#time').val()
			$('#time').change(function() {
				console.log('value changed')
				time = $(this).val()
			})
			$('#submit').click(function (){
				if (day == 'Morning') {
					console.log(day, type)
					$.post("{!! route('records.store') !!}", {'_token':$('meta[name=csrf_token]').attr('content'),type:type,time:time,user_id:id,date:date,month:month}, function(result){
							console.log(result)
							window.location = '/teacher/84-9967/getMonthDTR?month=' + month
					});
				}
				else{
					console.log(day, type, time)
					$.post("{!! route('records.store') !!}", {'_token':$('meta[name=csrf_token]').attr('content'),type:type,time:time,user_id:id,date:date,month:month}, function(result){
							console.log(result)
							window.location = '/teacher/84-9967/getMonthDTR?month=' + month
					});
				}
			})
		});
		
	});
</script>


</html>