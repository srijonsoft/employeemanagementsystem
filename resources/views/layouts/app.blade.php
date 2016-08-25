<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">



<div class="container target" style="margin-top:50px;">
    <div class="row">
        <div class="col-sm-10">
            <h2 class="" style="text-decoration: underline">{{ Session::get('fullname') }}</h2>
			
          <button type="button" class="btn btn-success">Book me!</button>  <button type="button" class="btn btn-info">Leave Application</button>
<br>
        </div>
      <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="{{ url('public/images/upload/emp_img/'.Session::get('emp_image')) }}"></a>

        </div>
    </div>
  <br>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted" contenteditable="false">Action</li>
                <li class="list-group-item text-left"><strong class=""><a href="{{ url('employee/logout')}}">Logout</a></strong></li>
                <li class="list-group-item text-left"><strong class="">Last seen</strong></li>
                <li class="list-group-item text-left"><strong class="">Real name</strong></li>
				<li class="list-group-item text-left"><strong class="">Role: </strong></li>
            </ul>
           <div class="panel panel-default">
             <div class="panel-heading">Insured / Bonded?

                </div>
                <div class="panel-body"><i style="color:green" class="fa fa-check-square"></i> Yes, I am insured and bonded.

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i>

                </div>
                <div class="panel-body"><a href="http://bootply.com" class="">bootply.com</a>

                </div>
            </div>
          
            <ul class="list-group">
                <li class="list-group-item text-muted">Activity<i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-left"><strong class=""><a href="{{ url('/employee/employee-login/' . Session::get('id')) }}">Profile</a></strong></li>
				<li class="list-group-item text-left"><strong class=""><a href="{{ url('/employee/salaryinfo/' . Session::get('emp_code')) }}">Salary Payment</a></strong></li>
				<li class="list-group-item text-left"><strong class=""><a href="{{ url('/employee/increment-info/' . Session::get('emp_code')) }}">Salary Increment</a></strong></li>
				<li class="list-group-item text-left"><strong class="">Followers</strong></li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">Social Media</div>
                <div class="panel-body">	<i class="fa fa-facebook fa-2x"></i>  <i class="fa fa-github fa-2x"></i> 
                    <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i>  <i class="fa fa-google-plus fa-2x"></i>

                </div>
            </div>
        </div>
        <!--/col-3-->
        <div class="col-sm-9" contenteditable="false" style="">
		  @yield('content')
		</div>
		</div>
		</div>
<footer id="footer">
	<div class="row-fluid">
		<div class="span3">
			<span class="pull-right">©Copyright 2013-2014 <a href="/" title="The Bootstrap Playground">Bootply</a> | <a href="/about#privacy">Privacy</a></span>
		</div>
	</div>
</footer>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
