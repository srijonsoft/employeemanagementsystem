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
            <!-- /.box-header -->
			<div class="box-body">
				<div class="row">
				<div class="col-md-6">
				<h2>Accounting</h2>
				</div>
				<div class="col-md-6" style="margin-top:20px">
					 <form action="#" class="form-inline" id="submit_date">
						<div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
							<div class="col-sm-6">
								{!! Form::date('start_date', null, ['class' => 'form-control', 'required' => 'required', 'id'=> 'start_date']) !!}
								{!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
							</div>
						</div>
						<div class="form-group {{ $errors->has('end_date') ? 'has-error' : ''}}">
							<div class="col-sm-6">
								{!! Form::date('end_date', null, ['class' => 'form-control', 'required' => 'required', 'id'=> 'end_date']) !!}
								{!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
							</div>
						</div>
						<input type="hidden" value="{{ Session::token() }}" name="_token">
					</form>
				</div>
				</div>	
				<hr />
				<div class="row" id="third_info">

				</div>
				<div class="row" id="first_info">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover table-inverse">
							<thead class="thead-inverse">
								<tr>
									<th>S.No</th>
									<th> Date </th>
									<th> Pay Amount </th>
									<th> Due Amount </th>
									<th> Status </th>
								</tr>
							</thead>
							<tbody>
							<?php $pay_total = 0; $due_total = 0; ?>
							{{-- */$x=0;/* --}}
							@foreach($accounting as $item)
								{{-- */$x++;/* --}}
								
								<?php 
									$pay_total+= $item->payment_amount;
									$due_total+=$item->due_amount;
								?>
								<tr>
									<td>{{ $x }}</td>
									<td>{{ $item->payment_date }}</td>
									<td>{{ $item->payment_amount }}</td>
									<td>{{ $item->due_amount }}</td>
									<td style="color:#449d44">{{ $item->title }}</td>
								</tr>
								
							@endforeach
								<tr>
									<td style="font-weight:bold">Total</td>
									<td></td>
									<td style="color:red;font-weight:bold">{{ $pay_total }}</td>
									<td style="color:red;font-weight:bold">{{ $due_total }}</td>
									<td></td>
								</tr>
							</tbody>
						</table>
						<div class="pagination-wrapper"></div>
					</div>
				</div>
				</div>
				<div class="row" id="second_info">
				<div class="col-md-6">
				<h3>Debit/Credit</h3>
				<hr />
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover table-inverse">
							<thead class="thead-inverse">
								<tr>
									<th>S.No</th>
									<th> Debit </th>
									<th> Credit </th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{ $x }}</td>
									<td>{{ $pay_total }}</td>
									<td>{{ $due_total }}</td>
								</tr>
								<tr>
									<td style="font-weight:bold">Total</td>
									<td></td>
									<td style="color:red;font-weight:bold">{{ $totalsalary }}</td>
									<td></td>
								</tr>
							</tbody>
						</table>
						<div class="pagination-wrapper"></div>
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
 <script>
 $(document).ready(function(){
	 $("#start_date,#end_date").change(function(){
		 
		var paymentURL = '{{ route('account-info') }}';
		var token = '{{ Session::token() }}';
		var start_date = $("#start_date").val();
		var end_date = $("#end_date").val();
	
		var startdate = start_date.split("/").reverse().join("-");
		var enddate = end_date.split("/").reverse().join("-");
	
	
		 if(start_date.length && end_date.length > 0){
			 $.ajax({
			method: 'POST',
			url : paymentURL,
			data: { startdate: startdate, enddate: enddate, _token: token}
		})
		.done(function(msg){
			$("#first_info").hide();
			$("#second_info").hide();
			
			var pay_total = 0; 
			var due_total = 0;
			
			var peopleHTML = "";
			peopleHTML += "<div class='row'>";
			peopleHTML += "<div class='col-md-12'>";
			peopleHTML += "<div class='table-responsive'>";
			peopleHTML += "<table class='table table-bordered table-striped table-hover table-inverse'>";
			peopleHTML += "<thead class='thead-inverse'>";
			
			peopleHTML += "<tr>";
			peopleHTML += "<th>S.No</th>";
			peopleHTML += "<th> Date </th>";
			peopleHTML += "<th> Pay Amount </th>";				
			peopleHTML += "<th> Due Amount </th>";			
			peopleHTML += "<th> Status </th>";				
			peopleHTML += "</tr>";
			peopleHTML += "</thead>";
			peopleHTML += "<tbody>";
				
			jQuery.each(msg, function(index, item) {
				
				 
					pay_total+= item.payment_amount;
					due_total+= item.due_amount;
				
				
				
					
				peopleHTML += "<tr>";					
				peopleHTML += "<td>"+item.id+"</td>";					
				peopleHTML += "<td>"+item.payment_date+"</td>";
				peopleHTML += "<td>"+item.payment_amount+"</td>";
				peopleHTML += "<td>"+item.due_amount+"</td>";				
				peopleHTML += "<td>"+item.title+"</td>";
				peopleHTML += "</tr>";
				peopleHTML += "<tr>";
				peopleHTML += "<td style='font-weight:bold'>Total</td>";			
				peopleHTML += "<td></td>";
				peopleHTML += "<td style='color:red;font-weight:bold'>"+pay_total+"</td>";
				peopleHTML += "<td style='color:red;font-weight:bold'>"+due_total+"</td>";
				peopleHTML += "<td></td>";
				peopleHTML += "</tr>";
		
				
						
					
				});	
				
				peopleHTML += "</tbody>";
				peopleHTML += "</table>";
				peopleHTML += "<div class='pagination-wrapper'></div>";
				peopleHTML += "</div>";
				peopleHTML += "</div>";
				peopleHTML += "</div>";
				
				
				$('#third_info').html(peopleHTML);
				
				
				
				
				peopleHTML += "<div class='row'>";
				peopleHTML += "<div class='col-md-6'>";
				peopleHTML += "<h3>Debit/Credit</h3>";
				peopleHTML += "<hr />";
				peopleHTML += "<div class='table-responsive'>";
				peopleHTML += "<table class='table table-bordered table-striped table-hover table-inverse'>";
				peopleHTML += "<thead class='thead-inverse'>";
				peopleHTML += "<tr>";
				peopleHTML += "<th>S.No</th>";					
				peopleHTML += "<th> Debit </th>";
				peopleHTML += "<th> Credit </th>";
				peopleHTML += "</tr>";
				peopleHTML += "</thead>";
				peopleHTML += "<tbody>";
				
				jQuery.each(msg, function(index, item) {
					
				peopleHTML += "<tr>";
				peopleHTML += "<td></td>";
				peopleHTML += "<td>"+pay_total+"</td>";
				peopleHTML += "<td>"+due_total+"</td>";
				peopleHTML += "</tr>";
				peopleHTML += "<tr>";
				peopleHTML += "<td style='font-weight:bold'>Total</td>";
				peopleHTML += "<td></td>";
				peopleHTML += "<td style='color:red;font-weight:bold'></td>";
				peopleHTML += "<td></td>";
				peopleHTML += "</tr>";
								
				
				});	
				
				peopleHTML += "</tbody>";
				peopleHTML += "</table>";
				peopleHTML += "<div class='pagination-wrapper'></div>";
				peopleHTML += "</div>";
				peopleHTML += "</div>";
				peopleHTML += "</div>";

				$('#third_info').html(peopleHTML);
				
					
				
			
		});	 
		 }
	 });
 });
 </script>
</div>
<!-- /.content-wrapper -->
@endsection