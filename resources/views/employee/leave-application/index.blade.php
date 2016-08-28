@extends('layouts.app')
@section('content')

    <div class="panel panel-default target">
        <div class="panel-heading" contenteditable="false"><h3>Application List</h3></div>
        <div class="panel-body">
            <div class="row">
				<div class="table">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>S.No</th>
								<th> Name </th>
								<th> No of Days </th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						{{-- */$x=0;/* --}}
						@foreach($leaveapplication as $item)
							{{-- */$x++;/* --}}
							<tr>
								<td>{{ $x }}</td>
								<td>{{ $item->name }}</td>
								<td>{{ $item->no_of_days }}</td>
								<td>{{ $item->start_date }}</td>
								<td>{{ $item->ending_date }}</td>
								<td>{{ $item->status }}</td>
								<td>
									<a href="{{ url('/employee/leave-application/' . $item->id) }}" class="btn btn-success btn-xs" title="View LeaveApplication"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
									<a href="{{ url('/employee/leave-application/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit LeaveApplication"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
									{!! Form::open([
										'method'=>'DELETE',
										'url' => ['/employee/leave-application', $item->id],
										'style' => 'display:inline'
									]) !!}
										{!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete LeaveApplication" />', array(
												'type' => 'submit',
												'class' => 'btn btn-danger btn-xs',
												'title' => 'Delete LeaveApplication',
												'onclick'=>'return confirm("Confirm delete?")'
										));!!}
									{!! Form::close() !!}
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					<div class="pagination-wrapper"> {!! $leaveapplication->render() !!} </div>
				</div>
            </div>    
        </div>   
    </div>
@endsection

