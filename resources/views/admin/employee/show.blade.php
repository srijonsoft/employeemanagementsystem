@extends('layouts.header')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Employee Detail</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
					<div class="row">
					<h1>&nbsp;&nbsp;Employee - {{ $employee->id }}
						<a href="{{ url('/admin/employee/create') }}" class="btn btn-primary btn-xs" title="Add New Employee"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
						<a href="{{ url('admin/employee/' . $employee->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit AddEmployee"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
						{!! Form::open([
							'method'=>'DELETE',
							'url' => ['admin/addemployee', $employee->id],
							'style' => 'display:inline'
						]) !!}
							{!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
									'type' => 'submit',
									'class' => 'btn btn-danger btn-xs',
									'title' => 'Delete Employee',
									'onclick'=>'return confirm("Confirm delete?")'
							));!!}
						{!! Form::close() !!}
					</h1>
					<div class="col-md-6">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
							<tbody>
								<tr>
									<th>ID</th><td>{{ $employee->id }}</td>
								</tr>
								<tr>
									<th> Emp Code </th><td> {{ $employee->emp_code }} </td>
								</tr>
								<tr>
									<th> Full Name </th><td> {{ $employee->fullname }} </td>
								</tr>
								<tr>
									<th> User Name </th><td> {{ $employee->username }} </td>
								</tr>
								<tr>
									<th> Birth Date </th><td> {{ $employee->date_of_birth }} </td>
								</tr>
								<tr>
									<th> Present Address </th><td> {{ $employee->present_address }} </td>
								</tr>
								<tr>
									<th> Parmanent Address </th><td> {{ $employee->parmanent_address }} </td>
								</tr>
								<tr>
									<th> Mobile </th><td> {{ $employee->mobile }} </td>
								</tr>
								<tr>
									<th> Email </th><td> {{ $employee->email }} </td>
								</tr>
								<tr>
									<th> Country </th><td> {{ $employee->getCountry() }} </td>
								</tr>
								<tr>
									<th> Religion </th><td> {{ $employee->getReligion() }} </td>
								</tr>
								<tr>
									<th> Gender </th><td> {{ $employee->getGender() }} </td>
								</tr>
								<tr>
									<th> Father's Name </th><td> {{ $employee->father_name }} </td>
								</tr>
								<tr>
									<th> Mother's Name </th><td> {{ $employee->mother_name }} </td>
								</tr>
								<tr>
									<th> Father's Mobile </th><td> {{ $employee->father_mobile }} </td>
								</tr>
							</tbody>
						</table>
					</div>
					</div>
					<div class="col-md-6">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
							<tbody>
								<tr>
									<th> Photo </th><td> <img src="{{ url('public/images/upload/emp_img/'.$employee->emp_image) }}" class="img-thumbnail" alt=""> </td>
								</tr>
								<tr>
									<th>Department</th><td> {{ $employee->getDepartmnt() }} </td>
								</tr>
								<tr>
									<th> Designation </th><td> {{ $employee->getPost() }} </td>
								</tr>
								<tr>
									<th> Confirm Date </th><td> {{ $employee->confirm_date }} </td>
								</tr>
								<tr>
									<th> Join Date </th><td> {{ $employee->join_date }} </td>
								</tr>
								<tr>
									<th> Initial Salary </th><td> {{ $employee->initial_salary }} TK</td>
								</tr>
								<tr>
									<th> Increment After </th><td> {{ $employee->increment_after }} -Month </td>
								</tr>
								<tr>
									<th> Increment Percent </th><td> {{ $employee->increment_percent }} %</td>
								</tr>
								<tr>
									<th> Status </th><td> {{ $employee->getStatus() }} </td>
								</tr>
							</tbody>
						</table>
					</div>
					</div>
				</div>
            </div>
            <!-- ./box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection