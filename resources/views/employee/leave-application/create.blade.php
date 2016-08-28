@extends('layouts.app')
@section('content')

    <div class="panel panel-default target">
        <div class="panel-heading" contenteditable="false"><h3>Leave Application</h3></div>
        <div class="panel-body">
            <div class="row">

			{!! Form::open(['url' => '/employee/leave-application', 'class' => 'form-horizontal']) !!}

					<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
						{!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
						<div class="col-sm-6">
							{!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
							{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
						</div>
					</div>
					<div class="form-group">
					   {!! Form::label('designation', 'Desgnation', ['class' => 'col-sm-3 control-label']) !!}
						<div class="col-sm-6">
						 {!! Form::select('designation_id', $designationList, null, array('id' => 'designation_id', 'class' => 'form-control input-sm', 'required' => 'required')) !!}  
						</div>
					</div>
					<div class="form-group">
					   {!! Form::label('leave_type', 'Leave Type', ['class' => 'col-sm-3 control-label']) !!}
						<div class="col-sm-6">
						 {!! Form::select('leavetype_id', $leavetypeList, null, array('id' => 'leavetype_id', 'class' => 'form-control input-sm', 'required' => 'required')) !!}  
						</div>
					</div>
					<div class="form-group {{ $errors->has('no_of_days') ? 'has-error' : ''}}">
						{!! Form::label('no_of_days', 'No of Days', ['class' => 'col-sm-3 control-label']) !!}
						<div class="col-sm-6">
							{!! Form::text('no_of_days', null, ['class' => 'form-control', 'required' => 'required']) !!}
							{!! $errors->first('no_of_days', '<p class="help-block">:message</p>') !!}
						</div>
					</div>
					<div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
						{!! Form::label('start_date', 'Commencing Date', ['class' => 'col-sm-3 control-label']) !!}
						<div class="col-sm-6">
							{!! Form::date('start_date', null, ['class' => 'form-control', 'required' => 'required', 'id'=> 'birthDate']) !!}
							{!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
						</div>
					</div>
					<div class="form-group {{ $errors->has('ending_date') ? 'has-error' : ''}}">
						{!! Form::label('ending_date', 'Ending Date', ['class' => 'col-sm-3 control-label']) !!}
						<div class="col-sm-6">
							{!! Form::date('ending_date', null, ['class' => 'form-control', 'required' => 'required', 'id'=> 'birthDate']) !!}
							{!! $errors->first('ending_date', '<p class="help-block">:message</p>') !!}
						</div>
					</div>
					<div class="form-group {{ $errors->has('purpose') ? 'has-error' : ''}}">
						{!! Form::label('purpose', 'Purpose', ['class' => 'col-sm-3 control-label']) !!}
						<div class="col-sm-6">
							{!! Form::textarea('purpose', null, ['class' => 'form-control']) !!}
							{!! $errors->first('purpose', '<p class="help-block">:message</p>') !!}
						</div>
					</div>


					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-3">
							{!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
						</div>
					</div>
					{!! Form::close() !!}

			@if ($errors->any())
				<ul class="alert alert-danger">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif     
            </div>    
        </div>   
    </div>
@endsection
