@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New SalaryIncrement</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/salary-increment', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('emp_code') ? 'has-error' : ''}}">
                {!! Form::label('emp_code', 'Emp Code', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('emp_code', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('emp_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
                {!! Form::label('department_id', 'Department Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('department_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('department_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('salary') ? 'has-error' : ''}}">
                {!! Form::label('salary', 'Salary', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('salary', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('salary', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('increment_after') ? 'has-error' : ''}}">
                {!! Form::label('increment_after', 'Increment After', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('increment_after', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('increment_after', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('increment_percent') ? 'has-error' : ''}}">
                {!! Form::label('increment_percent', 'Increment Percent', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('increment_percent', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('increment_percent', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('increment_step') ? 'has-error' : ''}}">
                {!! Form::label('increment_step', 'Increment Step', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('increment_step', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('increment_step', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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
@endsection