<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UserLogin;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;

class UserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $userlogin = UserLogin::paginate(15);

        return view('admin.user-login.index', compact('userlogin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.user-login.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'password' => 'required', ]);

        $user = array('name' => $request->name, 'password' => $request->password);
		
		if(Auth::attempt($user)){
			
			Session::put('name', $request->name);
			
			Session::flash('flash_message', 'Login added!');
			
			return redirect('admin/user-login');
			
		}else{
			Session::flash('flash_message', 'Login Failed!');
			
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
        $userlogin = UserLogin::findOrFail($id);

        return view('admin.user-login.show', compact('userlogin'));
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
        $userlogin = UserLogin::findOrFail($id);

        return view('admin.user-login.edit', compact('userlogin'));
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

        $userlogin = UserLogin::findOrFail($id);
        $userlogin->update($request->all());

        Session::flash('flash_message', 'UserLogin updated!');

        return redirect('admin/user-login');
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
        UserLogin::destroy($id);

        Session::flash('flash_message', 'UserLogin deleted!');

        return redirect('admin/user-login');
    }
	public function logout(){
		
		Auth::logout();
		return redirect('admin/user-login/create');
	}
}
