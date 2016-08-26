<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
            /* =====Login=====*/
			body[role="login"] {
				font-family: 'Roboto', sans-serif;
				background: #045404;
				background-size: cover;
				color: #EFEFEF
			}
			[role="login"] .container {
				margin-top: 100px
			}
			[role="login"] .btn-success {
				background: #76B831;
				border: 1px solid #679F2C;
				float: right
			}
			[role="login"] label {
				font-weight: normal;
				color: #FFF
			}
			.panel-heading {
				padding: 5px 15px;
			}
			.form-inline {
				margin: 5px
			}
			.panel-footer {
				padding: 1px 15px;
				color: #A0A0A0;
			}
			hr {
				border: 0;
				height: 1px;
				background-image: linear-gradient(to right, rgba(0, 0, 0, 0), #FFF, rgba(0, 0, 0, 0));
				margin: 5px
			}
			.profile-img {
				margin: 0 auto 10px;
				display: block;
			}
			.panel-default {
				opacity: .9;
				-webkit-box-shadow: 0px 7px 24px 1px rgba(0,0,0,0.45);
				-moz-box-shadow: 0px 7px 24px 1px rgba(0,0,0,0.45);
				box-shadow: 0px 7px 24px 1px rgba(0,0,0,0.45);
				background: transparent url('http://3rwebtech.com/bg-white.png') repeat scroll 0% 0%;
			}
        </style>
</head>

<body role="login">
<div class="container" style="margin-top:200px">
<div class="row">
  <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
    <div class="panel panel-default">
    
      <div class="panel-body">
        
		{!! Form::open(['url' => '/employee-login', 'class' => 'form-horizontal']) !!}
			  
          <fieldset>
            <div class="row">
              <div class="center-block"> <img class="profile-img" src="http://3rwebtech.com/logo2.png" class="img-responsive" alt=""> </div>
            <div class="message" style="text-align:center;color:#000000">
			@if(Session::has('flash_message'))
				{{Session::get('flash_message')}}
			@endif
			</div>
			  <hr>
            </div>
            <div class="row">
              <div class="col-sm-12 col-md-10  col-md-offset-1 ">
			  
                <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
                {!! Form::label('username', 'Username') !!}
                  <div class="input-group"> <span class="input-group-addon"> <i class="glyphicon glyphicon-user"></i> </span>
					{!! Form::text('username', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Username', 'autofocus']) !!}
					{!! $errors->first('username', '<p class="help-block">:message</p>') !!}
				  </div>
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                 {!! Form::label('password', 'Password') !!}
                  <div class="input-group"> <span class="input-group-addon"> <i class="glyphicon glyphicon-lock"></i> </span>
					{!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Password']) !!}
					{!! $errors->first('password', '<p class="help-block">:message</p>') !!}

				 </div>
                </div>
               
                <div class="form-group">
                 <label>
                  <input type="checkbox">
                  Keep me Logged in </label> <input type="submit" class="btn btn-success" value="Log In">
                </div>
               
              </div>
            </div>
           
          </fieldset>
        {!! Form::close() !!}
    
      </div>
    </div>
  </div>
</div>
</div>
</body> 
</html>