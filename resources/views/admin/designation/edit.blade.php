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
				<h2>Edit Designation - {{ $designation->id }}</h2>

			{!! Form::model($designation, [
				'method' => 'PATCH',
				'url' => ['/admin/designation', $designation->id],
				'class' => 'form-horizontal'
			]) !!}

						<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
						{!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label']) !!}
						<div class="col-sm-6">
							{!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
							{!! $errors->first('title', '<p class="help-block">:message</p>') !!}
						</div>
					</div>
					<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
						{!! Form::label('department_id', 'Department Id', ['class' => 'col-sm-3 control-label']) !!}
						<div class="col-sm-6">
							{!! Form::select('department_id', $depatList, null, ['class' => 'form-control', 'required' => 'required']) !!}
							{!! $errors->first('department_id', '<p class="help-block">:message</p>') !!}
						</div>
					</div>
					<div class="form-group {{ $errors->has('status_id') ? 'has-error' : ''}}">
						{!! Form::label('status_id', 'Status Id', ['class' => 'col-sm-3 control-label']) !!}
						<div class="col-sm-6">
							{!! Form::select('status_id', $statusList, null, ['class' => 'form-control', 'required' => 'required']) !!}
							{!! $errors->first('status_id', '<p class="help-block">:message</p>') !!}
						</div>
					</div>


			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-3">
					{!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
				</div>
			</div>
			{!! Form::close() !!}

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