@extends('layouts.app')
@section('content')

	<div class="panel panel-default target">
		<div class="panel-heading" contenteditable="false">
			<h3>LeaveApplication - {{ $leaveapplication->id }}
				<a href="{{ url('employee/leave-application/' . $leaveapplication->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit LeaveApplication"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
					{!! Form::open([
						'method'=>'DELETE',
						'url' => ['employee/leaveapplication', $leaveapplication->id],
						'style' => 'display:inline'
					]) !!}
						{!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
								'type' => 'submit',
								'class' => 'btn btn-danger btn-xs',
								'title' => 'Delete LeaveApplication',
								'onclick'=>'return confirm("Confirm delete?")'
						));!!}
					{!! Form::close() !!}
			</h3>
		</div>
		<div class="panel-body">
			<div class="row">

				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<tbody>
							<tr>
								<th>ID</th>
								<td>{{ $leaveapplication->id }}</td>
							</tr>
							<tr>
								<th> Name </th>
								<td> {{ $leaveapplication->name }} </td>
							</tr>
							<tr>
								<th> Designation </th>
								<td> {{ $leaveapplication->dtitle }} </td>
							</tr>
							<tr>
								<th> Leave Type </th>
								<td> {{ $leaveapplication->ltitle }} </td>
							</tr>
							<tr>
								<th> No of days </th>
								<td> {{ $leaveapplication->no_of_days }} </td>
							</tr>
							<tr>
								<th> Start Date </th>
								<td> {{ $leaveapplication->start_date }} </td>
							</tr>
							<tr>
								<th> End Date </th>
								<td> {{ $leaveapplication->ending_date }} </td>
							</tr>
							<tr>
								<th> Purpose </th>
								<td> {{ $leaveapplication->purpose }} </td>
							</tr>
							<tr>
								<th> Status </th>
								<td> {{ $leaveapplication->status }} </td>
							</tr>
						</tbody>
					</table>
				</div>
            </div>    
        </div>   
    </div>
@endsection
