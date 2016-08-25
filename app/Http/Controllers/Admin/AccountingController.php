<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Accounting;
use App\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class AccountingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        return view('admin.accounting.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
		$startdate 	= date("Y-m-01");
		$enddate	= date("Y-m-t");
		
		$accounting = Accounting::where('payment_date','>=', $startdate)
						->where('payment_date','<=', $enddate)
						->join('payment_statuses','salary_payments.status_id','=','payment_statuses.id')
						->select('salary_payments.*', 'payment_statuses.title')
						->get();
		
		$totalsalary = Employee::sum('initial_salary');

        return view('admin.accounting.create', compact('accounting', 'totalsalary'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
		
        Session::flash('flash_message', 'Accounting added!');

        return redirect('admin/accounting', compact('accounting', 'totalsalary'));
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
        $accounting = Accounting::findOrFail($id);

        return view('admin.accounting.show', compact('accounting'));
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
        $accounting = Accounting::findOrFail($id);

        return view('admin.accounting.edit', compact('accounting'));
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
        $this->validate($request, ['title' => 'required', 'body' => 'required_with:title|alpha_num', ]);

        $accounting = Accounting::findOrFail($id);
        $accounting->update($request->all());

        Session::flash('flash_message', 'Accounting updated!');

        return redirect('admin/accounting');
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
        Accounting::destroy($id);

        Session::flash('flash_message', 'Accounting deleted!');

        return redirect('admin/accounting');
    }
	public function postAccountInfo(Request $request){
		
		$accounting = Accounting::where('payment_date','>=', $request['startdate'])
						->where('payment_date','<=', $request['enddate'])
						->join('payment_statuses','salary_payments.status_id','=','payment_statuses.id')
						->select('salary_payments.*', 'payment_statuses.title')
						->get();
		
		$totalsalary = Employee::sum('initial_salary');
		
		return $accounting;
	}
}
