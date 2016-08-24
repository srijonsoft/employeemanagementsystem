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
              <h3><i class="fa fa-info-circle"></i>Salary Info.</h3>

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
            <!-- ./box-body -->
          
			<h2>Salary Payment NO: - {{ $salarypayment->id }}
				<a href="{{ url('admin/salary-payment/' . $salarypayment->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit SalaryPayment"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
				{!! Form::open([
					'method'=>'DELETE',
					'url' => ['admin/salarypayment', $salarypayment->id],
					'style' => 'display:inline'
				]) !!}
					{!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
							'type' => 'submit',
							'class' => 'btn btn-danger btn-xs',
							'title' => 'Delete SalaryPayment',
							'onclick'=>'return confirm("Confirm delete?")'
					));!!}
				{!! Form::close() !!}
			</h2>
		<div class="col-md-8">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<tbody>
						<tr>
							<th> Emp Code </th>
							<td> {{ $salarypayment->emp_code }} </td>
						</tr>
						<tr>
							<th> Fullname </th>
							<td> {{ $salarypayment->fullname }} </td>
						</tr>
						<tr>
							<th> Salary </th>
							<td> {{ $salarypayment->salary }} </td>
						</tr>
						<tr>
							<th> Payment Date </th>
							<td> {{ $salarypayment->payment_date }} </td>
						</tr>
						<tr>
							<th> Status </th>
							<td> {{ $salarypayment->title }} </td>
						</tr>
						<tr>
							<th> Payment Amount </th>
							<td> {{ $salarypayment->payment_amount }} </td>
						</tr>
						@if($salarypayment->title == 'Due')
						<tr>
							<th> Due Amount </th>
							<td> {{ $salarypayment->due_amount }} </td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-4">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<tbody>
						<tr>
							<th>Photo</th><td><img src="{{ url('public/images/upload/emp_img/'.$salarypayment->emp_image) }}" class="img-thumbnail" alt=""></td>
						</tr>
					</tbody>
				</table>
			</div>
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