@extends('layouts.app')
@section('content')
    <div class="panel panel-default target">
        <div class="panel-heading" contenteditable="false">Salary Payment List</div>
        <div class="panel-body">
            <div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>S.No</th>
									<th> Emp. Code </th>
									<th> Salary </th>
									<th> Payment Date </th>
									<th> Payment Amount </th>
									<th> Due Amount </th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
							{{-- */$x=0;/* --}}
							@foreach($salaryinfo as $item)
								{{-- */$x++;/* --}}
								<tr>
									<td>{{ $x }}</td>
									<td>{{ $item->emp_code }}</td>
									<td>{{ $item->salary }}</td>
									<td>{{ $item->payment_date }}</td>
									<td>{{ $item->payment_amount }}</td>
									<td>{{ $item->due_amount }}</td>
									<td>{{ $item->title }}</td>
								</tr>
							@endforeach
							</tbody>
						</table>
						<div class="pagination-wrapper"> {!! $salaryinfo->render() !!} </div>
					</div>
				</div>   
            </div>    
        </div>      
    </div>
@endsection
