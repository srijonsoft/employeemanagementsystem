@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit EmployeeLogin {{ $employeelogin->id }}</h1>

    {!! Form::model($employeelogin, [
        'method' => 'PATCH',
        'url' => ['/employee/employee-login', $employeelogin->id],
        'class' => 'form-horizontal'
    ]) !!}

    

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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