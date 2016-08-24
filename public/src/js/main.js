
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
	$(document).ready(function(){
		$('#payment_amount').keyup(function(){
			
			var salary = $('#salary').val();
			var payment_amount = $('#payment_amount').val();
			var due = salary - payment_amount;
			$('#dueamount').val(due);
			
		});
	});

$(document).ready(function(){
		$('#payment_status1').change(function(){
			
			var status = $('#payment_status1').val();
			
			if(status == 1){
				$('#due_amount1').hide();
				
				var dueamount = $('#dueamount1').val();
				
				$('#paymentamount1').val(dueamount);
			
			}
			});
		});