@extends('layouts.app')
@section('content')

    <div class="panel panel-default target">
                <div class="panel-heading" contenteditable="false">Salary Increment List</div>
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
									<th> Increment Date </th>
									<th> Increment After </th>
									<th> Increment Percent </th>
									<th> Increment Step</th>
								</tr>
							</thead>
							<tbody>
							{{-- */$x=0;/* --}}
							@foreach($incrementinfo as $item)
								{{-- */$x++;/* --}}
								<tr>
									<td>{{ $x }}</td>
									<td>{{ $item->emp_code }}</td>
									<td>{{ $item->salary }}</td>
									<td>{{ $item->increment_date }}</td>
									<td>{{ $item->increment_after }} Month</td>
									<td>{{ $item->increment_percent }} %</td>
									<td>{{ $item->increment_step }}</td>
								</tr>
							@endforeach
							</tbody>
						</table>
						<div class="pagination-wrapper"> {!! $incrementinfo->render() !!} </div>
					</div>
				</div>   
            </div>    
        </div>      
    </div>

@endsection
