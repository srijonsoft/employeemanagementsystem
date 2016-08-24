@extends('layouts.app')

@section('content')
<div class="container">

    <h1>SalaryIncrement {{ $salaryincrement->id }}
        <a href="{{ url('admin/salary-increment/' . $salaryincrement->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit SalaryIncrement"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/salaryincrement', $salaryincrement->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete SalaryIncrement',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $salaryincrement->id }}</td>
                </tr>
                
            </tbody>
        </table>
    </div>

</div>
@endsection
