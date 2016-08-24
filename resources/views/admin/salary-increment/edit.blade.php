@extends('layouts.header')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Salary Increment</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<h3><i class="fa fa-info-circle"></i>Salary Info.</h3>
			<hr />
				  <div class="row">
					<div class="col-md-8">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
							<tbody>
								<tr>
									<th>Fullname</th><td>{{ $salaryincrement->fullname }}</td>
								</tr>
								<tr>
									<th>Department</th><td>{{ $salaryincrement->title }}</td>
								</tr>
								<tr>
									<th>Designation</th><td>{{ $salaryincrement->dtitle }}</td>
								</tr>
								<tr>
									<th>Initial Salary</th><td id="initia_lsalary">{{ $salaryincrement->salary }} TK</td>
								</tr>
								<tr>
									<th>Join Date</th><td id="join_date">{{ $salaryincrement->join_date }}</td>
								</tr>
								<tr>
									<th>Increment After</th><td>{{ $salaryincrement->incrementafter }} Month</td>
								</tr>
								<tr>
									<th>Increment Percent</th><td>{{ $salaryincrement->incrementpercent }} %</td>
								</tr>
								<tr>
									<th>Increment Step</th><td> {{ $salaryincrement->increment_step }} Times</td>
								</tr>
							</tbody>
						</table>
					</div>
					</div>
					<div class="col-md-4">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
							<tbody>
								<tr>
									<th> Photo </th><td> <img src="{{ url('public/images/upload/emp_img/'.$salaryincrement->emp_image) }}" class="img-responsive" alt=""> </td>
								</tr>
							</tbody>
						</table>
					</div>
					</div>
                <!-- /.col -->
            </div>
            <!-- ./box-body -->
            <div class="box-body">
			<h2><i class="fa fa-edit"></i>Employee NO - {{ $salaryincrement->id }}</h2>
			<hr />
			{!! Form::model($salaryincrement, [
				'method' => 'PATCH',
				'url' => ['/admin/salary-increment', $salaryincrement->emp_code],
				'class' => 'form-horizontal'
			]) !!}
              <div class="row">
			  {!! Form::open(['url' => '/admin/salary-increment', 'class' => 'form-horizontal', 'files' => true, 'method' => 'post', 'accept-charset' => 'utf-8']) !!}
				
				<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
					<div class="col-sm-6">
						{!! Form::hidden('department_id', null, ['class' => 'form-control', 'required' => 'required', 'id'=> 'department_id']) !!}
						{!! $errors->first('department_id', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('incrementdate') ? 'has-error' : ''}}">
					{!! Form::label('incrementdate', 'Increment Date', ['class' => 'col-sm-4 control-label']) !!}
					<div class="col-sm-6">
						{!! Form::date('incrementdate', null, ['class' => 'form-control', 'required' => 'required', 'id'=> 'incrementdate']) !!}
						{!! $errors->first('incrementdate', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('incrementafter') ? 'has-error' : ''}}">
					{!! Form::label('incrementafter1', 'Increment After', ['class' => 'col-sm-4 control-label']) !!}
					<div class="col-sm-6">
						{!! Form::text('incrementafter1', null, ['class' => 'form-control', 'id' => 'incrementafter1', 'required' => 'required']) !!}
						{!! $errors->first('incrementafter1', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('incrementpercent1') ? 'has-error' : ''}}">
					{!! Form::label('incrementpercent1', 'Increment Percent', ['class' => 'col-sm-4 control-label']) !!}
					<div class="col-sm-6">
						{!! Form::text('incrementpercent1', null, ['class' => 'form-control', 'id' => 'incrementpercent1', 'required' => 'required']) !!}
						{!! $errors->first('incrementpercent1', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('incrementsalary') ? 'has-error' : ''}}">
					{!! Form::label('incrementsalary', 'Increment Salary', ['class' => 'col-sm-4 control-label']) !!}
					<div class="col-sm-6">
						{!! Form::text('incrementsalary', null, ['class' => 'form-control', 'id' => 'total_salary', 'required' => 'required']) !!}
						{!! $errors->first('incrementsalary', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('incrementstep') ? 'has-error' : ''}}">
					{!! Form::label('incrementstep', 'Increment Step', ['class' => 'col-sm-4 control-label']) !!}
					<div class="col-sm-6">
						{!! Form::text('incrementstep', null, ['class' => 'form-control', 'id' => '', 'required' => 'required']) !!}
						{!! $errors->first('incrementstep', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group">
				<div class="col-sm-offset-4 col-sm-3">
					 {!! Form::submit('Increment', ['class' => 'btn btn-primary form-control']) !!}
				</div>
				</div>
                <!-- /.col -->
				{!! Form::close() !!}
              </div>
			   @if ($errors->any())
					<ul class="alert alert-danger">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				@endif
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<script>
$(document).ready(function(){
    $("#incrementdate").change(function(){
        var join_date = $("#join_date").text();
		var increment_date=$("#incrementdate").val();
     	
		var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
		var firstDate = new Date(increment_date);
		var secondDate = new Date(join_date);
		 
		var diffDays = Math.round(Math.abs((firstDate - secondDate) / (oneDay)));
		var month = diffDays / 30.5;
	
		$("#incrementafter1").val(month);
    });
});
</script>
	
	
<script>
$(document).ready(function() {
   $("#incrementpercent1").keyup(function() {
	   
      var value = $("#incrementpercent1").val();
	  
      var initialsalary = $("#initia_lsalary").text();
	  
	  var total = ( parseFloat(value) * 10 * parseFloat(initialsalary) ) / 1000;
	  
      var new_salary = parseFloat(initialsalary) + parseFloat(total) ;
	  
      $("#total_salary").val(new_salary);
	
   });
});
 </script>
	
  </div>
  <!-- /.content-wrapper -->
@endsection