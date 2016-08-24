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
              <h2><i class="fa fa-info-circle"></i>Salary Info.</h2>

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
          
				<h2>Salary Payment</h2>
					<hr/>

					{!! Form::open(['url' => '/admin/salary-payment', 'class' => 'form-horizontal']) !!}

							<div class="form-group {{ $errors->has('emp_code') ? 'has-error' : ''}}">
								{!! Form::label('emp_code', 'Employee Code', ['class' => 'col-sm-3 control-label']) !!}
								<div class="col-sm-6">
									{!! Form::text('emp_code', null, ['class' => 'form-control', 'id' => 'emp_code', 'required' => 'required']) !!}
									[<span class="warning">Enter employee ID by key</span>]
									{!! $errors->first('emp_code', '<p class="help-block">:message</p>') !!}
								</div>
							</div>
							<div class="form-group {{ $errors->has('payment_date') ? 'has-error' : ''}}">
								{!! Form::label('payment_date', 'Payment Date', ['class' => 'col-sm-3 control-label']) !!}
								<div class="col-sm-6">
									{!! Form::date('payment_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
									{!! $errors->first('payment_date', '<p class="help-block">:message</p>') !!}
								</div>
							</div>
							<div class="form-group {{ $errors->has('status_id') ? 'has-error' : ''}}">
								{!! Form::label('status_id', 'Payment Status', ['class' => 'col-sm-3 control-label']) !!}
								<div class="col-sm-6">
									{!! Form::select('status_id', $paymentStatus, null, ['class' => 'form-control', 'id' => 'payment_status', 'required' => 'required']) !!}
									{!! $errors->first('status_id', '<p class="help-block">:message</p>') !!}
								</div>
							</div>
							<div class="form-group {{ $errors->has('payment_amount') ? 'has-error' : ''}}">
								{!! Form::label('payment_amount', 'Payment Amount', ['class' => 'col-sm-3 control-label']) !!}
								<div class="col-sm-6">
									{!! Form::text('payment_amount', null, ['class' => 'form-control', 'id' => 'payment_amount', 'required' => 'required']) !!}
									{!! $errors->first('payment_amount', '<p class="help-block">:message</p>') !!}
								</div>
							</div>
							<div class="form-group {{ $errors->has('due_amount') ? 'has-error' : ''}}" id="due_amount" style="display:none">
								{!! Form::label('due_amount', 'Due Amount', ['class' => 'col-sm-3 control-label', ]) !!}
								<div class="col-sm-6">
									{!! Form::text('due_amount', null, ['class' => 'form-control', 'id' => 'dueamount']) !!}
									{!! $errors->first('due_amount', '<p class="help-block">:message</p>') !!}
								</div>
							</div>
					
					 {!! Form::hidden('salary', null, ['class' => 'form-control', 'id' => 'salary', 'required' => 'required']) !!}

					<input type="hidden" value="{{ Session::token() }}" name="_token">
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-3">
							{!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
						</div>
					</div>
					{!! Form::close() !!}
				
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
	
	<script>
    $(document).ready(function(){
        $('#emp_code').keyup(function(){
         
		var paymentURL = '{{ route('salary-info') }}';
		var token = '{{ Session::token() }}';
		var emp_code = $("#emp_code").val();
		
		if(emp_code.length == 6){
		
		$.ajax({
			method: 'POST',
			url : paymentURL,
			data: { emp_code: $('#emp_code').val(), _token: token}
		})
		.done(function(msg){
			
			console.log(msg);
			$('#salary').val(msg.initial_salary);
			
			var peopleHTML = "";
			
			
				peopleHTML += "<tr>";
				peopleHTML += "<td style='width:160px'><b>Photo :</b></td>";
				
				peopleHTML += "<td><img src='{{ url('public/images/upload/emp_img/')}}/"+msg.emp_image+"' class='img-responsive'></td>";
				peopleHTML += "</tr>";

				peopleHTML += "<tr>";
				peopleHTML += "<td style='width:160px'><b>Emp. Code:</b></td>";
				peopleHTML += "<td>"+msg.emp_code+"</td>";
				peopleHTML += "</tr>";
				
				peopleHTML += "<tr>";
				peopleHTML += "<td style='width:160px'><b>Full Name:</b></td>";
				peopleHTML += "<td>"+msg.fullname+"</td>";
				peopleHTML += "</tr>";
				
				peopleHTML += "<tr>";
				peopleHTML += "<td style='width:160px'><b>Department:</b></td>";
				peopleHTML += "<td>"+msg.title+"</td>";
				peopleHTML += "</tr>";
				
				peopleHTML += "<tr>";
				peopleHTML += "<td style='width:160px'><b>Designation:</b></td>";
				peopleHTML += "<td>"+msg.ptitle+"</td>";
				peopleHTML += "</tr>";
				
				peopleHTML += "<tr>";
				peopleHTML += "<td style='width:160px'><b>Salary:</b></td>";
				peopleHTML += "<td>"+msg.initial_salary+"</td>";
				peopleHTML += "</tr>";
				
				

					
				jQuery('#emp_info').html(peopleHTML);
			
		});
		}
        });
    });
</script>
<script>
	$(document).ready(function(){
		$('#payment_status').change(function(){
			
			var status = $('#payment_status').val();
			var salary = $('#salary').val();
			
			if(status == 2){
				$('#due_amount').show();
			}else if(status == 1){
				$('#dueamount').val('');
				$('#due_amount').hide();
				
			}
			
		});
	});
</script>
<script>
	// $(document).ready(function(){
		// $('#payment_amount').keyup(function(){
			
			// var salary = $('#salary').val();
			// var payment_amount = $('#payment_amount').val();
			// var due = salary - payment_amount;
			// $('#dueamount').val(due);
			
		// });
	// });
</script>
  </div>
  <!-- /.content-wrapper -->
@endsection