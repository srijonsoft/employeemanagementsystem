@extends('layouts.app')
@section('content')

    <div class="panel panel-default target">
        <div class="panel-heading" contenteditable="false">Frofile Details</div>
        <div class="panel-body">
            <div class="row">
				<div class="col-md-6">
					<div class="table-responsive">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<th>Emp. Code</th><td>{{ $employeelogin->emp_code }}</td>
								</tr>
								<tr>
									<th>Full Name</th><td>{{ $employeelogin->fullname }}</td>
								</tr>
								<tr>
									<th>Username</th><td>{{ $employeelogin->username }}</td>
								</tr>
								<tr>
									<th>Date of Birth</th><td>{{ $employeelogin->date_of_birth }}</td>
								</tr>
								<tr>
									<th>Email</th><td>{{ $employeelogin->email }}</td>
								</tr>
								<tr>
									<th>Mobile</th><td>{{ $employeelogin->mobile }}</td>
								</tr>
								<tr>
									<th>Present Address</th><td>{{ $employeelogin->present_address }}</td>
								</tr>
								<tr>
									<th>Permanent Address</th><td>{{ $employeelogin->parmanent_address }}</td>
								</tr>
								<tr>
									<th>Gender</th><td>{{ $employeelogin->gtitle }}</td>
								</tr>
								<tr>
									<th>Country</th><td>{{ $employeelogin->ctitle }}</td>
								</tr>
								<tr>
									<th>Religion</th><td>{{ $employeelogin->rtitle }}</td>
								</tr>
								<tr>
									<th>Father Name</th><td>{{ $employeelogin->father_name }}</td>
								</tr>
								<tr>
									<th>Father Mobile</th><td>{{ $employeelogin->father_mobile }}</td>
								</tr>
								<tr>
									<th>Mother Name</th><td>{{ $employeelogin->mother_name }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-6">
					<div class="table-responsive">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<th>Confirm Date</th><td>{{ $employeelogin->confirm_date }}</td>
								</tr>
								<tr>
									<th>Join Date</th><td>{{ $employeelogin->join_date }}</td>
								</tr>
								<tr>
									<th>Department</th><td>{{ $employeelogin->title }}</td>
								</tr>
								<tr>
									<th>Designation</th><td>{{ $employeelogin->ptitle }}</td>
								</tr>
								<tr>
									<th>Salary</th><td>{{ $employeelogin->initial_salary }} Tk</td>
								</tr>
								<tr>
									<th>Increment After</th><td>{{ $employeelogin->increment_after }} Months</td>
								</tr>
								<tr>
									<th>Increment Percent</th><td>{{ $employeelogin->increment_percent }} %</td>
								</tr>
								<tr>
									<th>Status</th><td>{{ $employeelogin->stitle }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
                     
            </div>
                 
        </div>
              
    </div>
@endsection
