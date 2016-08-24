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
              <h3 class="box-title">Department List</h3>

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
			<h2>Designation - {{ $designation->id }}
					<a href="{{ url('admin/designation/' . $designation->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Designation"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
					{!! Form::open([
						'method'=>'DELETE',
						'url' => ['admin/designation', $designation->id],
						'style' => 'display:inline'
					]) !!}
						{!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
								'type' => 'submit',
								'class' => 'btn btn-danger btn-xs',
								'title' => 'Delete Designation',
								'onclick'=>'return confirm("Confirm delete?")'
						));!!}
					{!! Form::close() !!}
				</h2>
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<tbody>
							<tr>
								<th>ID</th>
								<td>{{ $designation->id }}</td>
							</tr>
							<tr>
								<th> Title </th>
								<td> {{ $designation->title }} </td>
							</tr>
							<tr>
								<th> Department Id </th>
								<td> {{ $designation->getDepartment() }} </td>
							</tr>
							<tr>
								<th> Status Id </th>
								<td> {{ $designation->getStatus() }} </td>
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
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- /.content-wrapper -->
@endsection