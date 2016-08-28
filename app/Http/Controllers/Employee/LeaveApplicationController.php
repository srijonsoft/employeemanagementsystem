<?php

namespace App\Http\Controllers\Employee;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\LeaveApplication;
use App\Designation;
use App\LeaveType;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class LeaveApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $leaveapplication = LeaveApplication::paginate(15);

        return view('employee.leave-application.index', compact('leaveapplication'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
		$designationList 	= Designation::lists('title','id');
		$leavetypeList 		= LeaveType::lists('title','id');
		
        return view('employee.leave-application.create', compact('designationList', 'leavetypeList'));
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
							'name' 				=> 'required',
							'designation_id' 	=> 'required',
							'leavetype_id' 		=> 'required',
							'no_of_days' 		=> 'required',
							'start_date' 		=> 'required',
							'ending_date' 		=> 'required',
							'purpose' 			=> 'required'
						]);
						
		$leave	= new LeaveApplication();
		
		$leave->name			= $request['name'];
		$leave->designation_id	= $request['designation_id'];
		$leave->leavetype_id	= $request['leavetype_id'];
		$leave->no_of_days		= $request['no_of_days'];
		$leave->start_date		= $request['start_date'];
		$leave->ending_date		= $request['ending_date'];
		$leave->purpose			= $request['purpose'];
		$leave->status_id			= 3;
		
		$leave->save();

        Session::flash('flash_message', 'LeaveApplication added!');

        return redirect('employee/leave-application');
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
        $leaveapplication = LeaveApplication::where('leave_applications.id',$id)
							->join('designations', 'leave_applications.designation_id', '=', 'designations.id')
							->join('leave_type', 'leave_applications.leavetype_id', '=', 'leave_type.id')
							->select('leave_applications.*', 'designations.title as dtitle', 'leave_type.title as ltitle')
							->first();

        return view('employee.leave-application.show', compact('leaveapplication'));
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
		$designationList 	= Designation::lists('title','id');
		$leavetypeList 		= LeaveType::lists('title','id');
		
        $leaveapplication = LeaveApplication::findOrFail($id);

        return view('employee.leave-application.edit', compact('leaveapplication', 'designationList', 'leavetypeList'));
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
							'name' 				=> 'required',
							'designation_id' 	=> 'required',
							'leavetype_id' 		=> 'required',
							'no_of_days' 		=> 'required',
							'start_date' 		=> 'required',
							'ending_date' 		=> 'required',
							'purpose' 			=> 'required'
						]);
		$leaveapplication = LeaveApplication::findOrFail($id);
		
		$leave	= array(
		
					'name'				=> $request['name'],
					'designation_id'	=> $request['designation_id'],
					'leavetype_id'		=> $request['leavetype_id'],
					'no_of_days'		=> $request['no_of_days'],
					'start_date'		=> $request['start_date'],
					'ending_date'		=> $request['ending_date'],
					'purpose'			=> $request['purpose']

				);
		
		
        
        DB::table('leave_applications')->where('id',$id)->update($leave);

        Session::flash('flash_message', 'LeaveApplication updated!');

        return redirect('employee/leave-application');
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
        LeaveApplication::destroy($id);

        Session::flash('flash_message', 'LeaveApplication deleted!');

        return redirect('employee/leave-application');
    }
}
