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
              <h3 class="box-title">Increment Lists</h3>

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
				@if(Session::has('flash_message'))
					{{Session::get('flash_message')}}
				@endif
				<h2><i class="fa fa-th-list" aria-hidden="true"></i>&nbsp;All Increment List</h2>
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>S.No</th>
								<th> Emp. Code </th>
								<th> Full Name </th>
								<th> Department </th>
								<th> Salary </th>
								<th> Increment After </th>
								<th> Increment Percent </th>
								<th> Increment Step </th>
							</tr>
						</thead>
						<tbody>
						{{-- */$x=0;/* --}}
						@foreach($salaryincrement as $item)
							{{-- */$x++;/* --}}
							<tr>
								<td>{{ $x }}</td>
								<td>{{ $item->emp_code }}</td>
								<td>{{ $item->fullname }}</td>
								<td>{{ $item->title }}</td>
								<td>{{ $item->salary }}</td>
								<td>{{ $item->increment_after }}</td>
								<td>{{ $item->increment_percent }}</td>
								<td>{{ $item->increment_step }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					<div class="pagination-wrapper"> {!! $salaryincrement->render() !!} </div>
				</div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection