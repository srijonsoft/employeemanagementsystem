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
              <h3 class="box-title">New Employee</h3>

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
				<h2>Mailbox</h2>
				<hr />
				
				<!-- Stack the columns on mobile by making one full-width and the other half-width -->
				<div class="row">
				
				<div class="col-md-9">
				{!! Form::open(['url' => '/admin/delete-mail', 'class' => 'form-horizontal', 'onSubmit' => 'return validate();']) !!}		
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th style="width: 98px;">
								<div class="checkbox radio-margin">
									<label>
										<input type="checkbox" id="checkAll" value="">
										<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>

									</label>
									<div class="box-tools pull-right" style="margin-top:-5px;">
										<button type="submit" id="delete" class="btn btn-danger">
										<i class="fa fa-trash-o"></i>&nbsp;</button>
									</div>
								</div>
								</th>
								<th>Name</th>
								<th>Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							{{-- */$x=0;/* --}}
							@foreach($mailbox as $item)
								{{-- */$x++;/* --}}
								<tr id="mailboxtr">
									<td>
										<div class="checkbox radio-margin">
											<label>
												<input type="checkbox" name="checkbox[]" id="checkbox[]" value="{{ $item->id }}">
												<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
											</label>
										</div>
									
									</td>
									<td>{{ $item->name }}</td>
									<td>{{ $item->created_at }}</td>
									<td>{{ $item->letitle }}</td>	
								</tr>
							@endforeach
						</tbody>
					</table>
					<div class="pagination-wrapper"> {!! $mailbox->render() !!} </div>
				</div>
				{!! Form::close() !!}
				</div>
				<div class="col-md-3">
					<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>
								<div class="checkbox radio-margin">
									<label>
										Action								
									</label>
								</div>
								</th>
							</tr>
						</thead>
						<tbody>
							{{-- */$x=0;/* --}}
							@foreach($mailbox as $item)
								{{-- */$x++;/* --}}
								<tr id="mailboxtr">
									<td>
										
											<label>
												<a href="{{ url('/admin/mail-box/' . $item->id) }}" class="btn btn-success btn-xs" title="View MailBox"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
												<a href="{{ url('/admin/mail-box/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit MailBox"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
												{!! Form::open([
													'method'=>'DELETE',
													'url' => ['/admin/mail-box', $item->id],
													'style' => 'display:inline'
												]) !!}
													{!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete MailBox" />', array(
															'type' => 'submit',
															'class' => 'btn btn-danger btn-xs',
															'title' => 'Delete MailBox',
															'onclick'=>'return confirm("Confirm delete?")'
													));!!}
												{!! Form::close() !!}
											
											</label>
										
									
									</td>	
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				</div>
								</div>

			</div>
            </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
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
<script language="javascript">
	function validate()
	{
	var chks = document.getElementsByName('checkbox[]');
	var hasChecked = false;
	for (var i = 0; i < chks.length; i++)
	{
	if (chks[i].checked)
	{
	hasChecked = true;
	break;
	}
	}
	if (hasChecked == false)
	{
	alert("Please select at least one.");
	return false;
	}
	return true;
	}
</script>
</div>
<!-- /.content-wrapper -->
@endsection
