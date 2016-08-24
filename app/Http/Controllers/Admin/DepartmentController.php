<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Department;
use App\Status;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $department = Department::paginate(15);

        return view('admin.department.index', compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
		$statusList = Status::lists('title','id');
		
        return view('admin.department.create', compact('statusList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
       $this->validate($request, ['title' => 'required', 'status_id' => 'required', ]);
	   
        Department::create($request->all());

        Session::flash('flash_message', 'Department added!');

        return redirect('admin/department');
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
        $department = Department::findOrFail($id);

        return view('admin.department.show', compact('department'));
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
		
        $department = Department::findOrFail($id);

        return view('admin.department.edit', compact('department', 'statusList'));
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
        $this->validate($request, ['title' => 'required', 'status_id' => 'required', ]);

        $department = Department::findOrFail($id);
        $department->update($request->all());

        Session::flash('flash_message', 'Department updated!');

        return redirect('admin/department');
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
        Department::destroy($id);

        Session::flash('flash_message', 'Department deleted!');

        return redirect('admin/department');
    }
}
