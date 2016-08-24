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
              <h3 class="box-title">Admin List</h3>

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

				<!-- /.box-header -->
				<div class="box-body">
						@if(Session::has('flash_message'))
							{{Session::get('flash_message')}}
						@endif
					<h2>Registration</h2>
						<hr/>

						{!! Form::open(['url' => '/admin/registration', 'class' => 'form-horizontal']) !!}
						<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Image<span class="error"></span></label>
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
										
										{!! Form::file('image') !!}
									</span>
									
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
								<span class='req'> </span>
							</div>
						</div>
						</div>
						<div class="form-group {{ $errors->has('fullname') ? 'has-error' : ''}}">
							{!! Form::label('fullname', 'Fullname', ['class' => 'col-sm-3 control-label']) !!}
							<div class="col-sm-6">
								{!! Form::text('fullname', null, ['class' => 'form-control', 'required' => 'required']) !!}
								{!! $errors->first('fullname', '<p class="help-block">:message</p>') !!}
							</div>
						</div>
						<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
							{!! Form::label('name', 'Username', ['class' => 'col-sm-3 control-label']) !!}
							<div class="col-sm-6">
								{!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
								{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
							</div>
						</div>
						<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
							{!! Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) !!}
							<div class="col-sm-6">
								{!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
								{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
							</div>
						</div>
						<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
							{!! Form::label('password', 'Password', ['class' => 'col-sm-3 control-label']) !!}
							<div class="col-sm-6">
								{!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
								{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
							</div>
						</div>
						<div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : ''}}">
							{!! Form::label('confirm_password', 'Confirm Password', ['class' => 'col-sm-3 control-label']) !!}
							<div class="col-sm-6">
								{!! Form::password('confirm_password', ['class' => 'form-control', 'required' => 'required']) !!}
								{!! $errors->first('confirm_password', '<p class="help-block">:message</p>') !!}
							</div>
						</div>
						<div class="form-group {{ $errors->has('status_id') ? 'has-error' : ''}}">
							{!! Form::label('status_id', 'Status', ['class' => 'col-sm-3 control-label']) !!}
							<div class="col-sm-6">
								 {!! Form::select('status_id', $statusList, null, array('id' => 'status_id', 'class' => 'form-control input-sm', 'required' => 'required')) !!}  
								{!! $errors->first('status_id', '<p class="help-block">:message</p>') !!}
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-3">
								{!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
							</div>
						</div>
						{!! Form::close() !!}

				</div>
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
    </section>
    <!-- /.content -->
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- /.content-wrapper -->
@endsection