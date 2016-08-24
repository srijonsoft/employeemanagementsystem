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
              <h3><i class="fa fa-info-circle"></i>Salary Payment</h3>

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
					<div class="col-md-8 col-md-offset-2">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
							<tbody id="emp_info">
								
							</tbody>
						</table>
					</div>
					</div>
                <!-- /.col -->
				</div>
            <!-- ./box-body -->
          
				<h2>Salary Payment List&nbsp;&nbsp;<a href="{{ url('/admin/salary-payment/create') }}" class="btn btn-primary btn-xs" title="Add New Salary Payment"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h2>
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>S.No</th>
								<th> Emp Code </th>
								<th> Fullname </th>
								<th> Payment Date </th>
								<th> Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						{{-- */$x=0;/* --}}
						@foreach($salarypayment as $item)
							{{-- */$x++;/* --}}
							<tr>
								<td>{{ $x }}</td>
								<td>{{ $item->emp_code }}</td>
								<td>{{ $item->fullname }}</td>
								<td>{{ $item->payment_date }}</td>
								<td>{{ $item->title }}</td>
								<td>
									<a href="{{ url('/admin/salary-payment/' . $item->id) }}" class="btn btn-success btn-xs" title="View Salary Payment"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
									@if($item->title == 'Complete')
									<a href="{{ url('/admin/salary-payment/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Salary Payment" disabled><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
									@elseif($item->title == 'Due')
									<a href="{{ url('/admin/salary-payment/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Salary Payment"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>	
									@endif
									{!! Form::open([
										'method'=>'DELETE',
										'url' => ['/admin/salary-payment', $item->id],
										'style' => 'display:inline'
									]) !!}
										{!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete SalaryPayment" />', array(
												'type' => 'submit',
												'class' => 'btn btn-danger btn-xs',
												'title' => 'Delete SalaryPayment',
												'onclick'=>'return confirm("Confirm delete?")'
										));!!}
									{!! Form::close() !!}
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					<div class="pagination-wrapper"> {!! $salarypayment->render() !!} </div>
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