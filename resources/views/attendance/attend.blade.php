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
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
	<!--  Material Dashboard CSS    -->
	<link href="{{asset('css/material-dashboard.css?v=1.2.1')}}" rel="stylesheet" />
	<!--     Fonts and icons     -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons"
	/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="off-canvas-sidebar">
	<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{url('/')}}">{{ config('app.name', 'Laravel') }}</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
				</ul>
			</div>
		</div>
	</nav>
	<div class="wrapper wrapper-full-page">
		<div class="full-page login-page" filter-color="black" data-image="{{asset('images/bg-pricing.jpeg')}}">
			<!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
                            @csrf
                            <div class="card card-login card-hidden">
                                <div class="card-header text-center" data-background-color="rose">
                                    <h1 id="time" class="card-title"></h1>
                                    <h5 id="date" class="card-title"></h5>
                                </div>
                                <div class="card-content">
                                    <div class="text-center">
                                        <button id="timeInButton" class="btn btn-rose" data-toggle="modal" data-target="#timeInModal">
                                            1 Time-In
                                        </button>
                                        <button id="timeOutButton" class="btn btn-rose" data-toggle="modal" data-target="#timeOutModal">
                                            2 Time-Out
                                        </button>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="text-center">
                                                        <h4>Press 1 or 2 fromt the numeric pad and enter your ID Number, then press the enter key</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="margin:0">
                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-4">
                                            <br>
                                            <table class="table">
                                                <tr>
                                                    <th>Employee ID:</th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>Employee Name:</th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>Transaction Type:</th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>Status:</th>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
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
                    <form method="POST" action="">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">contacts</i>
                            </span>
                            <div class="form-group label-floating{{ $errors->has('id') ? ' has-error' : '' }}">
                                <label class="control-label">ID Number
                                    <small class="text-danger">*</small>
                                </label>
                                <input name="id" id="id" type="text" class="form-control" autofocus> 
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
                    <form method="POST" action="">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">contacts</i>
                            </span>
                            <div class="form-group label-floating{{ $errors->has('id') ? ' has-error' : '' }}">
                                <label class="control-label">ID Number
                                    <small class="text-danger">*</small>
                                </label>
                                <input name="id" id="id" type="text" class="form-control" autofocus> 
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
<script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
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
<script src="{{asset('js/sweetalert2.js')}}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('js/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{asset('js/fullcalendar.min.js')}}"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('js/jquery.tagsinput.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('js/material-dashboard.js?v=1.2.1')}}"></script>
<script src="{{asset('js/background.js')}}"></script>
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
            if (event.which === 49) {
                $('#timeInButton').click()
            }
        })

        $(window).keypress(function (event) {
            if (event.which === 50) {
                $('#timeOutButton').click()
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