<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Designation;
use App\Department;
use App\Status;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $designation = Designation::paginate(15);

        return view('admin.designation.index', compact('designation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
		$depatList = Department::lists('title','id');
		$statusList = Status::lists('title','id');
		
        return view('admin.designation.create', compact('depatList','statusList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'department_id' => 'required', 'status_id' => 'required', ]);

        Designation::create($request->all());

        Session::flash('flash_message', 'Designation added!');

        return redirect('admin/designation');
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
        $designation = Designation::findOrFail($id);

        return view('admin.designation.show', compact('designation'));
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
		$depatList = Department::lists('title','id');
		$statusList = Status::lists('title','id');
		
        $designation = Designation::findOrFail($id);

        return view('admin.designation.edit', compact('designation','depatList','statusList'));
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
        $this->validate($request, ['title' => 'required', 'department_id' => 'required', 'status_id' => 'required', ]);

        $designation = Designation::findOrFail($id);
        $designation->update($request->all());

        Session::flash('flash_message', 'Designation updated!');

        return redirect('admin/designation');
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
        Designation::destroy($id);

        Session::flash('flash_message', 'Designation deleted!');

        return redirect('admin/designation');
    }
}
