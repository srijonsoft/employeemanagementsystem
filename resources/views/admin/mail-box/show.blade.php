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
			<h2>MailBox - {{ $mailbox->id }}
				<a href="{{ url('admin/mail-box/' . $mailbox->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit MailBox"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
				{!! Form::open([
					'method'=>'DELETE',
					'url' => ['admin/mailbox', $mailbox->id],
					'style' => 'display:inline'
				]) !!}
					{!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
							'type' => 'submit',
							'class' => 'btn btn-danger btn-xs',
							'title' => 'Delete MailBox',
							'onclick'=>'return confirm("Confirm delete?")'
					));!!}
				{!! Form::close() !!}
			</h2>
			<hr />
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<tbody>
						<tr>
							<th> Name </th>
							<td> {{ $mailbox->name }} </td>
						</tr>
						<tr>
							<th> Designation </th>
							<td> {{ $mailbox->dtitle }} </td>
						</tr>
						<tr>
							<th> Leave Type </th>
							<td> {{ $mailbox->ltitle }} </td>
						</tr>
						<tr>
							<th> NO of Days </th>
							<td> {{ $mailbox->no_of_days }} </td>
						</tr>
						<tr>
							<th> Start Date </th>
							<td> {{ $mailbox->start_date }} </td>
						</tr>
						<tr>
							<th> End Date </th>
							<td> {{ $mailbox->ending_date }} </td>
						</tr>
						<tr>
							<th> Purpose </th>
							<td> {{ $mailbox->purpose }} </td>
						</tr>
					</tbody>
				</table>
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
