<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SalaryIncrement;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class SalaryIncrementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $salaryincrement = DB::table('backup_employees')
			->join('add_employees', 'backup_employees.emp_code', '=', 'add_employees.emp_code')
			->join('departments', 'add_employees.department_id', '=', 'departments.id')
			->join('designations', 'add_employees.post_id', '=', 'designations.id')
			->select('backup_employees.*','add_employees.fullname','designations.title as ptitle','departments.title as title')
			->paginate(15);

        return view('admin.salary-increment.index', compact('salaryincrement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.salary-increment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
		$this->validate($request, ['emp_code' => 'required', 'department_id' => 'required', 'salary' => 'required', 'increment_after' => 'required', 'increment_percent' => 'required', 'increment_step' => 'required', ]);

        SalaryIncrement::create($request->all());

        Session::flash('flash_message', 'SalaryIncrement added!');

        return redirect('admin/salary-increment');
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
        $salaryincrement = SalaryIncrement::findOrFail($id);

        return view('admin.salary-increment.show', compact('salaryincrement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($emp_code)
    {
		$salaryincrement = DB::table('backup_employees')->where('backup_employees.emp_code', $emp_code)
					->orderby('backup_employees.id', 'desc')
					->join('add_employees', 'backup_employees.emp_code', '=', 'add_employees.emp_code')
					->join('departments', 'backup_employees.department_id', '=', 'departments.id')
					->join('designations', 'add_employees.post_id', '=', 'designations.id')
					->select('backup_employees.*','add_employees.fullname',
							'add_employees.increment_after as incrementafter',
							'add_employees.increment_percent as incrementpercent',
							'add_employees.join_date',
							'add_employees.initial_salary as salary',
							'add_employees.emp_image','departments.title','designations.title as dtitle')
					->first();

        
        return view('admin.salary-increment.edit', compact('salaryincrement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($emp_code, Request $request)
    {
        
        $this->validate($request, 
					[
					//'department_id' 		=> 'required',
					'incrementdate' 		=> 'required',
					'incrementafter1' 		=> 'required',
					'incrementpercent1' 		=> 'required',
					'incrementsalary' 		=> 'required',
					'incrementstep' 		=> 'required'
					]);
					
		$remember_token = $request->_token;
		
		$employee = array(
					'initial_salary' 	=> $request->incrementsalary,
					'increment_after' 	=> $request->incrementafter1,
					'increment_percent' => $request->incrementpercent1,
					'remember_token' 	=> $remember_token
				);
				
				
		
		if(DB::table('add_employees')->where('emp_code', $emp_code)->update($employee)){
			
			$backup_employees = array(
				'emp_code' 			=> $emp_code,
				'department_id' 	=> $request->department_id,
				'salary' 			=> $request->incrementsalary,
				'increment_after' 	=> $request->incrementafter1,
				'increment_percent' => $request->incrementpercent1,
				'increment_step' 	=> $request->incrementstep,
				'increment_date' 	=> $request->incrementdate,
				'remember_token' 	=> $remember_token
				);
			
			DB::table('backup_employees')->insert($backup_employees);
			
			Session::flash('flash_message', 'SalaryIncrement updated!');

			return redirect('admin/salary-increment');
			
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
        SalaryIncrement::destroy($id);

        Session::flash('flash_message', 'SalaryIncrement deleted!');

        return redirect('admin/salary-increment');
    }
}
