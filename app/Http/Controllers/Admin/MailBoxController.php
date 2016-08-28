<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\LeaveApplication;
use App\LeaveStatus;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class MailBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $mailbox = DB::table('leave_applications')
				->join('leave_status', 'leave_applications.status_id', '=', 'leave_status.id')
				->select('leave_applications.*','leave_status.title as letitle')
				->paginate(15);

				
		$mail = count($mailbox);

		Session::put('mailno',$mail);
				
        return view('admin.mail-box.index', compact('mailbox'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.mail-box.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'body' => 'required_with:title|alpha_num', ]);

        LeaveApplication::create($request->all());

        Session::flash('flash_message', 'MailBox added!');

        return redirect('admin/mail-box');
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
        $mailbox = LeaveApplication::where('leave_applications.id',$id)
							->join('designations', 'leave_applications.designation_id', '=', 'designations.id')
							->join('leave_type', 'leave_applications.leavetype_id', '=', 'leave_type.id')
							->select('leave_applications.*', 'designations.title as dtitle', 'leave_type.title as ltitle')
							->first();

        return view('admin.mail-box.show', compact('mailbox'));
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
		$leaveStatus = LeaveStatus::lists('title','id');
		
        $mailbox = LeaveApplication::findOrFail($id);

        return view('admin.mail-box.edit', compact('mailbox', 'leaveStatus'));
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
        $this->validate($request, ['status_id' => 'required',]);
	
		$status = array(
					'status_id'	=> $request['status_id']
					);
					
		DB::table('leave_applications')->where('id',$id)->update($status);
		
		
        Session::flash('flash_message', 'MailBox updated!');

        return redirect('admin/mail-box');
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

        Session::flash('flash_message', 'MailBox deleted!');

        return redirect('admin/mail-box');
    }
	public function deleteMails(Request $request){
		
		
		for($i=0;$i<count($_POST['checkbox']);$i++){
		$id=$_POST['checkbox'][$i];
		 LeaveApplication::destroy($id);
		 
		 return redirect('admin/mail-box');
		}

		
	}
}
