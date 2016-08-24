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
              <h3 class="box-title">New Employee</h3>

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
              <div class="row">
			  {!! Form::open(['url' => '/admin/employee', 'class' => 'form-horizontal', 'files' => true, 'method' => 'post', 'accept-charset' => 'utf-8']) !!}
			   
				<div class="col-md-6">
				<div class="form-group">
				<label for="field-1" class="col-sm-4 control-label">Image<span class="error"></span></label>
				<div class="col-sm-6">
					<div class="fileinput fileinput-new" data-provides="fileinput">
						<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
							<img src="http://creativeitem.com/demo/ekattor/uploads/user.jpg" alt="...">
						</div>
						<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
						<div>
							<span class="btn btn-white btn-file">
								<span class="fileinput-new">Select image</span>
								<span class="fileinput-exists">Change</span>
								
								{!! Form::file('photo') !!}
							</span>
							
							<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
						</div>
						<span class='req'> </span>
					</div>
				</div>
				</div>
				<div class="form-group {{ $errors->has('fullname') ? 'has-error' : ''}}">
					{!! Form::label('fullname', 'Full Name', ['class' => 'col-sm-4 control-label']) !!}
					<div class="col-sm-6">
						{!! Form::text('fullname', null, ['class' => 'form-control', 'required' => 'required']) !!}
						{!! $errors->first('fullname', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
					{!! Form::label('username', 'User Name', ['class' => 'col-sm-4 control-label']) !!}
					<div class="col-sm-6">
					{!! Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) !!}
						{!! $errors->first('username', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
					{!! Form::label('password', 'Password', ['class' => 'col-sm-4 control-label']) !!}
					<div class="col-sm-6">
					{!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
					{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : ''}}">
					{!! Form::label('confirm_password', 'Confirm Password', ['class' => 'col-sm-4 control-label']) !!}
					<div class="col-sm-6">
					{!! Form::password('confirm_password', ['class' => 'form-control', 'required' => 'required']) !!}
					{!! $errors->first('confirm_password', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : ''}}">
					{!! Form::label('date_of_birth', 'Date of Birth', ['class' => 'col-sm-4 control-label']) !!}
					<div class="col-sm-6">
						{!! Form::date('date_of_birth', null, ['class' => 'form-control', 'required' => 'required', 'id'=> 'birthDate']) !!}
						{!! $errors->first('date_of_birth', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('present_address') ? 'has-error' : ''}}">
					{!! Form::label('present_address', 'Present Address', ['class' => 'col-sm-4 control-label']) !!}
					<div class="col-sm-6">
						{!! Form::textarea('present_address', null, ['class' => 'form-control', 'required' => 'required']) !!}
						{!! $errors->first('present_address', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('parmanent_address') ? 'has-error' : ''}}">
					{!! Form::label('parmanent_address', 'Parmanent Address', ['class' => 'col-sm-4 control-label']) !!}
					<div class="col-sm-6">
						{!! Form::textarea('parmanent_address', null, ['class' => 'form-control', 'required' => 'required']) !!}
						{!! $errors->first('parmanent_address', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group">
                   {!! Form::label('country', 'Country', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6">
					 {!! Form::select('country_id', $countryList, null, array('country_id' => 'country_id', 'class' => 'form-control input-sm', 'required' => 'required')) !!}  
                    </div>
                </div>
				<div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
					{!! Form::label('mobile', 'Mobile', ['class' => 'col-sm-4 control-label']) !!}
					<div class="col-sm-6">
						{!! Form::text('mobile', null, ['class' => 'form-control', 'required' => 'required']) !!}
						{!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
					{!! Form::label('email', 'Email', ['class' => 'col-sm-4 control-label']) !!}
					<div class="col-sm-6">
						{!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
						{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group">
                   {!! Form::label('religion', 'Religion', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6">
					 {!! Form::select('religion_id', $religionList, null, array('id' => 'country_id', 'class' => 'form-control input-sm', 'required' => 'required')) !!}  
                    </div>
                </div>
				<div class="form-group">
                   {!! Form::label('gender', 'Gender', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6">
					 {!! Form::select('gender_id', $genderList, null, array('id' => 'country_id', 'class' => 'form-control input-sm', 'required' => 'required')) !!}  
                    </div>
                </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
				<div class="form-group">
				<label for="field-1" class="col-sm-4 control-label">Image<span class="error"></span></label>
				<div class="col-sm-6">
					<div class="fileinput fileinput-new" data-provides="fileinput">
						<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
							<img src="http://creativeitem.com/demo/ekattor/uploads/user.jpg" alt="...">
						</div>
						<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
						<div>
							<span class="btn btn-white btn-file">
								<span class="fileinput-new">Select image</span>
								<span class="fileinput-exists">Change</span>
								{!! Form::file('letter_file') !!}
							</span>
							
							<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
						</div>
						<span class='req'> </span>
					</div>
				</div>
				</div>
				<div class="form-group {{ $errors->has('father_name') ? 'has-error' : ''}}">
					{!! Form::label("father_name", "Father's Name", ["class" => "col-sm-4 control-label"]) !!}
					<div class="col-sm-6">
						{!! Form::text('father_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
						{!! $errors->first('father_name', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('mother_name') ? 'has-error' : ''}}">
					{!! Form::label("mother_name", "Mother's Name", ["class" => "col-sm-4 control-label"]) !!}
					<div class="col-sm-6">
						{!! Form::text('mother_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
						{!! $errors->first('mother_name', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('father_mobile') ? 'has-error' : ''}}">
					{!! Form::label("father_mobile", "Father's Mobile", ["class" => "col-sm-4 control-label"]) !!}
					<div class="col-sm-6">
						{!! Form::text('father_mobile', null, ['class' => 'form-control', 'required' => 'required']) !!}
						{!! $errors->first('father_mobile', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
                   {!! Form::label('department_id', 'Department', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6">
					 {!! Form::select('department_id', $deptList, null, array('id' => 'department_id', 'class' => 'form-control input-sm', 'required' => 'required')) !!}  
                    </div>
                </div>
				<div class="form-group {{ $errors->has('post_id') ? 'has-error' : ''}}">
                   {!! Form::label('post_id', 'Post', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6">
					 {!! Form::select('post_id', $designList, null, array('id' => 'post_id', 'class' => 'form-control input-sm', 'required' => 'required')) !!}  
                    </div>
                </div>
				<div class="form-group {{ $errors->has('confirm_date') ? 'has-error' : ''}}">
					{!! Form::label('confirm_date', 'Confirm Date', ['class' => 'col-sm-4 control-label']) !!}
					<div class="col-sm-6">
						{!! Form::date('confirm_date', null, ['class' => 'form-control', 'required' => '', 'id'=> 'birthDate']) !!}
						{!! $errors->first('confirm_date', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('join_date') ? 'has-error' : ''}}">
					{!! Form::label('join_date', 'Join Date', ['class' => 'col-sm-4 control-label']) !!}
					<div class="col-sm-6">
						{!! Form::date('join_date', null, ['class' => 'form-control', 'required' => '', 'id'=> 'birthDate']) !!}
						{!! $errors->first('join_date', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('initial_salary') ? 'has-error' : ''}}">
					{!! Form::label("initial_salary", "Initial Salary", ["class" => "col-sm-4 control-label"]) !!}
					<div class="col-sm-6">
						{!! Form::text('initial_salary', null, ['class' => 'form-control', 'required' => '']) !!}
						{!! $errors->first('initial_salary', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('increment_after') ? 'has-error' : ''}}">
					{!! Form::label("increment_after", "Increment After", ["class" => "col-sm-4 control-label"]) !!}
					<div class="col-sm-6">
						{!! Form::text('increment_after', null, ['class' => 'form-control', 'required' => '']) !!}[Month]
						{!! $errors->first('increment_after', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('increment_percent') ? 'has-error' : ''}}">
					{!! Form::label("increment_percent", "Increment Percent", ["class" => "col-sm-4 control-label"]) !!}
					<div class="col-sm-6">
						{!! Form::text('increment_percent', null, ['class' => 'form-control', 'required' => 'required']) !!}[%]
						{!! $errors->first('increment_percent', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                   {!! Form::label('status', 'Status', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6">
					 {!! Form::select('status_id', $statusList, null, array('id' => 'country_id', 'class' => 'form-control input-sm')) !!}  
                    </div>
                </div>
                </div>
				<div class="form-group">
				<div class="col-sm-offset-2 col-sm-3">
					{!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
				</div>
				</div>
                <!-- /.col -->
				{!! Form::close() !!}
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection