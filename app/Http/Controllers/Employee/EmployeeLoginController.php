<?php

namespace App\Http\Controllers\Employee;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EmployeeLogin;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use Auth;

class EmployeeLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $username = Session::get('username');
		$password = Session::get('password');
		
		$employee = DB::table('add_employees')
					->select('add_employees.*')
                    ->where('username', $username)
                    ->where('password',	$password)
                    ->first();
					
		
		Session::put('fullname', $employee->fullname); 	//array index
		Session::put('emp_image', $employee->emp_image); //array index
		Session::put('id', $employee->id); 				//array index
		Session::put('emp_code', $employee->emp_code); //array index
		Session::put('emp_image', $employee->emp_image); //array index

        return view('employee.employee-login.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('employee.employee-login.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
						'username' 	=> 'required',
						'password'	=> 'required'
					]);
		
		      
		$users = DB::table('add_employees')
                    ->where('username', $request->username)
                    ->where('password', md5($request->password))
                    ->first();
		if($users){
			
			 Session::put('username', $request->username); //array index
			 Session::put('password', md5($request->password)); //array index
						
			Session::flash('flash_message', 'Employee Login added!');

			return redirect('employee/employee-login');
		}else{
			Session::flash('flash_message', 'Username Password is not correct!');
			
			return redirect()->back();
		}
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
        $employeelogin = DB::table('add_employees')->where('add_employees.id', $id)
				->join('departments', 'add_employees.department_id', '=', 'departments.id')
				->join('designations', 'add_employees.post_id', '=', 'designations.id')
				->join('status', 'add_employees.status_id', '=', 'status.id')
				->join('gender', 'add_employees.gender_id', '=', 'gender.id')
				->join('country', 'add_employees.country_id', '=', 'country.id')
				->join('religion', 'add_employees.religion_id', '=', 'religion.id')
				->select('add_employees.*','designations.title as ptitle',
						'departments.title as title', 'status.title as stitle',
						'gender.title as gtitle', 'country.title as ctitle', 'religion.title as rtitle')
				->first();

        return view('employee.employee-login.show', compact('employeelogin'));
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
        $employeelogin = EmployeeLogin::findOrFail($id);

        return view('employee.employee-login.edit', compact('employeelogin'));
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
        
        $employeelogin = EmployeeLogin::findOrFail($id);
        $employeelogin->update($request->all());

        Session::flash('flash_message', 'EmployeeLogin updated!');

        return redirect('employee/employee-login');
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
        EmployeeLogin::destroy($id);

        Session::flash('flash_message', 'EmployeeLogin deleted!');

        return redirect('employee/employee-login');
    }
	public function postSalaryInfo($emp_code){
		
		$salaryinfo = DB::table('salary_payments_backup')
								->where('salary_payments_backup.emp_code', $emp_code)
								->join('add_employees', 'salary_payments_backup.emp_code', '=', 'add_employees.emp_code')
								->join('payment_statuses', 'salary_payments_backup.status_id', '=', 'payment_statuses.id')
								->select('salary_payments_backup.*', 'add_employees.fullname', 'add_employees.emp_image', 'payment_statuses.title')
								->paginate(15);
		
		return view('employee.employee-login.salaryinfo', compact('salaryinfo'));
	}
	public function postInrementInfo($emp_code){
		
		$incrementinfo = DB::table('backup_employees')
								->where('backup_employees.emp_code', $emp_code)
								// ->join('add_employees', 'salary_payments_backup.emp_code', '=', 'add_employees.emp_code')
								// ->join('payment_statuses', 'salary_payments_backup.status_id', '=', 'payment_statuses.id')
								->select('backup_employees.*')
								->paginate(15);
		
		return view('employee.employee-login.salaryincrement', compact('incrementinfo'));
	}
	public function logout()
    {
        Auth::logout();
		return redirect('employee/employee-login/create');
    }
}
