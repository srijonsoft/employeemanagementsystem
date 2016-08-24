<!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	{!! HTML::style('resources/assets/css/style.css') !!}
	
<style>

</style>


<div class="container">
    {!! Form::open(['url' => '/admin/user-login', 'class' => 'form-signin']) !!}    
      <h2 class="form-signin-heading">Please Login</h2>
	  
	  @if(Session::has('flash_message'))
		{{Session::get('flash_message')}}
	  @endif
      {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'User Name']) !!}
	  {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
	  
	  
      {!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Password']) !!}
      {!! $errors->first('password', '<p class="help-block">:message</p>') !!}


	  
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
        
 {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}	  
    {!! Form::close() !!}
	 
  </div>