<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Status;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $registration = User::paginate(15);

        return view('admin.registration.index', compact('registration'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
		$statusList = Status::lists('title','id');
		
        return view('admin.registration.create', compact('statusList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
		$this->validate($request, [
							'fullname' => 'required|max:120',
							'name' => 'required|min:6',
							'email' => 'required|unique:users',
							'password' => 'required',
							'confirm_password' => 'required|same:password',
							'status_id'			=> 'required'
							]);
							
		$users = new User();
		
		$users->fullname		= $request['fullname'];
		$users->name			= $request['name'];
		$users->email			= $request['email'];
		$users->password		= bcrypt($request['password']);
		$users->status_id		= $request['status_id'];
		$users->remember_token	= $request->_token;
		
		$users->save();

        Session::flash('flash_message', 'Registration added!');

        return redirect('admin/registration');
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
        $registration = User::findOrFail($id);

        return view('admin.registration.show', compact('registration'));
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
		$statusList = Status::lists('title','id');
		
        $registration = User::findOrFail($id);

        return view('admin.registration.edit', compact('registration', 'statusList'));
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
        $this->validate($request, [
							'fullname' => 'required|max:120',
							'name' => 'required|min:6',
							'email' => 'required',
							'status_id'			=> 'required'
							]);
							
		$registration = User::findOrFail($id);
		
		$users = array(
					'fullname' 			=> $request['fullname'],
					'name'				=> $request['name'],
					'email'				=> $request['email'],
					'status_id'			=> $request['status_id'],
					'remember_token'	=> $request->_token
		         );
		
		DB::table('users')->where('id',$id)->update($users);

        Session::flash('flash_message', 'Registration updated!');

        return redirect('admin/registration');
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
        Registration::destroy($id);

        Session::flash('flash_message', 'Registration deleted!');

        return redirect('admin/registration');
    }
}
