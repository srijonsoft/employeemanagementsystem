<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PaymentStatus;
use App\Status;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class PaymentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $paymentstatus = PaymentStatus::paginate(15);

        return view('admin.payment-status.index', compact('paymentstatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
		$statusList = Status::lists('title','id');
		
        return view('admin.payment-status.create', compact('statusList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'status_id' => 'required', ]);

        PaymentStatus::create($request->all());

        Session::flash('flash_message', 'PaymentStatus added!');

        return redirect('admin/payment-status');
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
        $paymentstatus = PaymentStatus::findOrFail($id);

        return view('admin.payment-status.show', compact('paymentstatus'));
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
		
        $paymentstatus = PaymentStatus::findOrFail($id);

        return view('admin.payment-status.edit', compact('paymentstatus','statusList'));
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

        $paymentstatus = PaymentStatus::findOrFail($id);
        $paymentstatus->update($request->all());

        Session::flash('flash_message', 'PaymentStatus updated!');

        return redirect('admin/payment-status');
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
        PaymentStatus::destroy($id);

        Session::flash('flash_message', 'PaymentStatus deleted!');

        return redirect('admin/payment-status');
    }
}
