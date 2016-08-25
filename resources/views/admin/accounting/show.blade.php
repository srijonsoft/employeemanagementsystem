@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Accounting {{ $accounting->id }}
        <a href="{{ url('admin/accounting/' . $accounting->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Accounting"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/accounting', $accounting->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Accounting',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $accounting->id }}</td>
                </tr>
                <tr><th> Title </th><td> {{ $accounting->title }} </td></tr><tr><th> Body </th><td> {{ $accounting->body }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
