<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SalaryPayment;
use App\PaymentStatus;
use App\Employee;
use App\SalaryPaymetBackup;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class SalaryPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $salarypayment = DB::table('salary_payments')
				->join('add_employees', 'salary_payments.emp_code', '=', 'add_employees.emp_code')
				->join('payment_statuses', 'salary_payments.status_id', '=', 'payment_statuses.id')
				//->join('designations', 'add_employees.post_id', '=', 'designations.id')
				->select('salary_payments.*','add_employees.fullname','payment_statuses.title')
				->paginate(15);

        return view('admin.salary-payment.index', compact('salarypayment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
		$paymentStatus = PaymentStatus::lists('title','id');
		
        return view('admin.salary-payment.create', compact('paymentStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        $this->validate($request, 
						[
						'emp_code' 			=> 'required',
						'salary' 			=> 'required',						
						'payment_date' 		=> 'required', 
						'status_id' 		=> 'required', 
						'payment_amount' 	=> 'required' 
						]);

        SalaryPayment::create($request->all());
		
		SalaryPaymetBackup::create($request->all());

        Session::flash('flash_message', 'Salary Payment added!');

        return redirect('admin/salary-payment');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $salarypayment = DB::table('salary_payments')->where('salary_payments.id', $id)
			->join('add_employees', 'salary_payments.emp_code', '=', 'add_employees.emp_code')
			->join('payment_statuses', 'salary_payments.status_id', '=', 'payment_statuses.id')
			//->join('designations', 'add_employees.post_id', '=', 'designations.id')
			->select('salary_payments.*','add_employees.fullname','add_employees.emp_image','payment_statuses.title')
			->first();


        return view('admin.salary-payment.show', compact('salarypayment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
		$paymentStatus = PaymentStatus::lists('title','id');
		
        $salarypayment = SalaryPayment::findOrFail($id);

        return view('admin.salary-payment.edit', compact('salarypayment', 'paymentStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        
        $this->validate($request, 
						[
							'emp_code' => 'required', 
							'payment_date' => 'required', 
							'status_id' => 'required', 
							'payment_amount' => 'required',  
							]);

        $salarypayment = SalaryPayment::findOrFail($id);
		
		$payBefore = $salarypayment->payment_amount;
		$total_salary = $request['payment_amount'] + $payBefore;
		$salaryInfo = array(
						'emp_code' 			=> $request['emp_code'],
						'payment_date'		=> $request['payment_date'],
						'status_id'			=> $request['status_id'],
						'payment_amount'	=> $request['payment_amount'] + $payBefore,
						'due_amount'		=> ''
					);
		
		if(SalaryPayment::where('id', $id)->update($salaryInfo)){
			
			$salaryBackup = new SalaryPaymetBackup();

			$salaryBackup->emp_code 		= $request['emp_code'];
			$salaryBackup->salary 			= $total_salary;
			$salaryBackup->payment_date 	= $request['payment_date'];
			$salaryBackup->status_id 		= $request['status_id'];
			$salaryBackup->payment_amount 	= $request['payment_amount'];
			
			$salaryBackup->save();

			Session::flash('flash_message', 'Salary Payment updated!');

			return redirect('admin/salary-payment');
		}
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        SalaryPayment::destroy($id);

        Session::flash('flash_message', 'SalaryPayment deleted!');

        return redirect('admin/salary-payment');
    }
	public function postSalaryInfo(Request $request){
		
		$emp_code = $request->emp_code;

		$info = Employee::where('add_employees.emp_code', $emp_code)
			->select('add_employees.*','designations.title as ptitle','departments.title as title')
			->join('departments', 'add_employees.department_id', '=', 'departments.id')
			->join('designations', 'add_employees.post_id', '=', 'designations.id')
			->first();
		
		return $info;
	}
}
