@extends('layouts.app')

@section('content')
<div class="container">

    <h1>UserLogin {{ $userlogin->id }}
        <a href="{{ url('admin/user-login/' . $userlogin->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit UserLogin"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/userlogin', $userlogin->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete UserLogin',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $userlogin->id }}</td>
                </tr>
                <tr><th> Title </th><td> {{ $userlogin->title }} </td></tr><tr><th> Body </th><td> {{ $userlogin->body }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
