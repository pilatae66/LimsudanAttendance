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
                    <li class=" active ">
                        <a href="{{route('register')}}">
                            <i class="material-icons">person_add</i> Register
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('login')}}">
                            <i class="material-icons">fingerprint</i> Login
                        </a>
                    </li>
                    <li class="">
                        <a href="#">
                            <i class="material-icons">lock_open</i> Lock
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page register-page" filter-color="black" data-image="{{asset('images/bg-pricing.jpeg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <form class="form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="card card-signup">
                                <div class="card-header text-center" data-background-color="rose">
                                    <h4 class="card-title">Register</h4>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                                <div class="form-group label-floating{{ $errors->has('fname') ? ' has-error' : '' }}">
                                                    <label class="control-label">First Name
                                                        <small>(required)</small>
                                                    </label>
                                                    <input name="fname" type="text" class="form-control"> 
                                                    <span class="material-icons form-control-feedback">clear</span>
                                                    @if ($errors->has('fname'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('fname') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                                <div class="form-group label-floating{{ $errors->has('mname') ? ' has-error' : '' }}">
                                                    <label class="control-label">Middle Name
                                                        <small>(required)</small>
                                                    </label>
                                                    <input name="mname" type="text" class="form-control"> 
                                                    <span class="material-icons form-control-feedback">clear</span>
                                                    @if ($errors->has('mname'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('mname') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                                <div class="form-group label-floating{{ $errors->has('lname') ? ' has-error' : '' }}">
                                                    <label class="control-label">Last Name
                                                        <small>(required)</small>
                                                    </label>
                                                    <input name="lname" type="text" class="form-control">
                                                    <span class="material-icons form-control-feedback">clear</span>
                                                    @if ($errors->has('lname'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('lname') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  End of row  --}}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">contacts</i>
                                                </span>
                                                <div class="form-group label-floating{{ $errors->has('id') ? ' has-error' : '' }}">
                                                    <label class="control-label">ID Number
                                                        <small>(required)</small>
                                                    </label>
                                                    <input name="id" type="text" class="form-control">
                                                    <span class="material-icons form-control-feedback">clear</span>
                                                    @if ($errors->has('id'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('id') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        {{--  End of col  --}}
                                        <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">lock_outline</i>
                                                    </span>
                                                    <div class="form-group label-floating{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <label class="control-label">Password
                                                            <small>(required)</small>
                                                        </label>
                                                        <input name="password" type="password" class="form-control">
                                                        <span class="material-icons form-control-feedback">clear</span>
                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            {{--  End of col  --}}
                                    </div>
                                    {{--  End of row  --}}
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-primary btn-round">Get Started</button>
                                </div>
                            </div>
                        </form>
                        </div>
                </div>
                    </div>
                </div>
            </div>
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
    $().ready(function () {
        background.checkFullPageBackgroundImage();

        setTimeout(function () {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 500)
    });
</script>