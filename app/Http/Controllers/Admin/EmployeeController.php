<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Employee;
use App\Country;
use App\Religion;
use App\Gender;
use App\Department;
use App\Designation;
use App\Status;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Repositories\ImageRepository;
use Eventviva\ImageResize;
use File;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
		$employee = DB::table('add_employees')
				->join('departments', 'add_employees.department_id', '=', 'departments.id')
				->join('designations', 'add_employees.post_id', '=', 'designations.id')
				->select('add_employees.id','add_employees.emp_code','add_employees.fullname','add_employees.mobile','add_employees.present_address','designations.title as ptitle','departments.title as title')
				->paginate(15);
			
        return view('admin.employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
		$countryList 	= Country::lists('title','id');
		$religionList	= Religion::lists('title','id');
		$genderList 	= Gender::lists('title','id');
		$deptList		= Department::lists('title','id');
		$designList 	= Designation::lists('title','id');
		$statusList 	= Status::lists('title','id');
		
        return view('admin.employee.create', compact('countryList', 'religionList', 'genderList', 'deptList', 'designList', 'statusList'));
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
							'fullname' 				=> 'required',
							'username' 				=> 'required|min:6|max:50',
							'password' 				=> 'required',
							'confirm_password' 		=> 'required|same:password',
							'date_of_birth' 		=> 'required',
							'present_address' 		=> 'required',
							'parmanent_address' 	=> 'required',
							'country_id' 			=> 'required',
							'mobile' 				=> 'required',
							'email'					=> 'required|unique:add_employees',
							'religion_id' 			=> 'required',
							'gender_id' 			=> 'required',
							'father_name' 			=> 'required',
							'mother_name' 			=> 'required',
							'father_mobile' 		=> 'required',
							'department_id' 		=> 'required',
							'post_id' 				=> 'required',
							'confirm_date' 			=> 'required',
							'join_date' 			=> 'required',
							'initial_salary' 		=> 'required',
							'increment_after' 		=> 'required',
							'increment_percent' 	=> 'required',
							'photo' 				=> 'required|image|mimes:jpeg,png,jpg,gif,bmp,svg|max:2048',
							'letter_file' 			=> 'required|mimes:txt,pdf,doc,docx,zip,xml|max:1024',
							'status_id' 			=> 'required'  ]);
		
				
					
		// if pass validation -- employe image
		$image_name = $request->file('photo')->getClientOriginalName(); 
		$image_extension = $request->file('photo')->getClientOriginalExtension();
		$image_new_name = md5(microtime(true));
		$n_image = $image_new_name. '.' .$image_extension;
		$temp_file = base_path() . '/public/images/upload/emp_img/'.strtolower($image_new_name . '_temp.' . $image_extension);
		$request->file('photo')
			->move( base_path() . '/public/images/upload/emp_img/', strtolower($image_new_name . '_temp.' . $image_extension) );
        $origin_size = getimagesize( $temp_file );
        $origin_width = $origin_size[0];
        $origin_height = $origin_size[1];
        // resize
        $image_resize = new ImageResize($temp_file );
        if( trim( $request->get('height') ) != "")
        {
        	$height = $request->get('height');
        	
        }
        else
        {
			$height = 0;        	
        }
        if( trim( $request->get('width') ) != "")
        {
        	$width = $request->get('width');
        	
        }
        else
        {
        	$width = 0;
        }
        if($width > 0 && $height > 0)
        {
        	$image_resize->resize($width, $height);	
        }
        else if($width == 0 && $height > 0)
        {
        	$image_resize->resizeToHeight($height);
        }
        else if($width > 0 && $height == 0) 
        {
        	$image_resize->resizeToWidth($width);
        }
        $image_resize->save( base_path() . '/public/images/upload/emp_img/' . $image_new_name . '.' . $image_extension );
        $image_location = '/images/upload/emp_img/' . $image_new_name . '.' . $image_extension;
        File::delete($temp_file);
        $image_data = array(
        	'image_name'		=>	$image_name
        	,'image_extension'	=>	$image_extension
        	,'image_location'	=>	$image_location
        	,'origin_height'	=>	$origin_height
        	,'origin_width'		=>	$origin_width
        	,'height'			=>	$height
        	,'width'			=>	$width
        );
		
		// if pass validation -- employe joining letter
		$image_name = $request->file('letter_file')->getClientOriginalName(); 
		$letter_extension = $request->file('letter_file')->getClientOriginalExtension();
		$letter_new_name = md5(microtime(true));
		$n_letter = $letter_new_name. '.' .$letter_extension;
		$temp_file = base_path() . '/public/images/upload/join_letter'.strtolower($letter_new_name . '.' . $letter_extension);
		$request->file('letter_file')
			->move( base_path() . '/public/images/upload/join_letter', strtolower($n_letter . '.' . $letter_extension) );
			
		$remember_token = $request->_token;
		$emp_code = mt_rand(100000,999999);
		
		$employee = array(
			'emp_code' 			=> $emp_code,
			'fullname' 			=> $request->fullname,
			'username' 			=> $request->username,
			'password' 			=> md5($request->password),
			'date_of_birth' 	=> $request->date_of_birth,
			'present_address' 	=> $request->present_address,
			'parmanent_address' => $request->parmanent_address,
			'country_id' 		=> $request->country_id,
			'mobile' 			=> $request->mobile,
			'email' 			=> $request->email,
			'religion_id' 		=> $request->religion_id,
			'gender_id' 		=> $request->gender_id,
			'father_name' 		=> $request->father_name,
			'mother_name' 		=> $request->mother_name,
			'father_mobile' 	=> $request->father_mobile,
			'department_id' 	=> $request->department_id,
			'post_id' 			=> $request->post_id,
			'confirm_date' 		=> $request->confirm_date,
			'join_date' 		=> $request->join_date,
			'initial_salary' 	=> $request->initial_salary,
			'increment_after' 	=> $request->increment_after,
			'increment_percent' => $request->increment_percent,
			'emp_image' 		=> $n_image,
			'letter_file' 		=> $n_letter,
			'status_id' 		=> $request->status_id,
			'remember_token' 	=> $remember_token,
		);			
					
        
		if(DB::table('add_employees')->insert($employee)){
			
			$backup_employee = array(
				'emp_code' 			=> $emp_code,
				'department_id' 	=> $request->department_id,
				'salary' 			=> $request->initial_salary,
				'increment_after' 	=> '',
				'increment_percent' => '',
				'increment_step' 	=> '',
				'remember_token' 	=> $remember_token
			);			
			
			 DB::table('backup_employees')->insert($backup_employee);
			 
			Session::flash('flash_message', 'Employee added successfully!');
		}else{
			Session::flash('flash_message', 'Employee not added successfully!');
		}
        

        return redirect('admin/employee');
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
        $employee = Employee::findOrFail($id);

        return view('admin.employee.show', compact('employee'));
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
		$countryList 	= Country::lists('title','id');
		$religionList 	= Religion::lists('title', 'id');
		$genderList 	= Gender::lists('title', 'id');
		$deptList 		= Department::lists('title', 'id');
		$designList 	= Designation::lists('title', 'id');
		$statusList 	= Status::lists('title', 'id');
		
        $employee = Employee::findOrFail($id);

        return view('admin.employee.edit', compact('employee', 'countryList', 'religionList', 'genderList', 'deptList', 'designList', 'statusList'));
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
					'fullname' 				=> 'required',
					'username' 				=> 'required|min:6|max:50',
					'date_of_birth' 		=> 'required',
					'present_address' 		=> 'required',
					'parmanent_address' 	=> 'required',
					'country_id' 			=> 'required',
					'mobile' 				=> 'required',
					'email'					=> 'required',
					'religion_id' 			=> 'required',
					'gender_id' 			=> 'required',
					'father_name' 			=> 'required',
					'mother_name' 			=> 'required',
					'father_mobile' 		=> 'required',
					'department_id' 		=> 'required',
					'post_id' 				=> 'required',
					'confirm_date' 			=> 'required',
					'join_date' 			=> 'required',
					'initial_salary' 		=> 'required',
					'increment_after' 		=> 'required',
					'increment_percent' 	=> 'required',
					'status_id' 			=> 'required'  ]);

		$addemployee = Employee::findOrFail($id);
		
		if($request->file('photo')){
		// if pass validation -- employe image
		$image_name = $request->file('photo')->getClientOriginalName();
		$image_extension = $request->file('photo')->getClientOriginalExtension();
		$image_new_name = md5(microtime(true));
		$n_image = $image_new_name. '.' .$image_extension;
		$temp_file = base_path() . '/public/images/upload/emp_img/'.strtolower($image_new_name . '_temp.' . $image_extension);
		$request->file('photo')
			->move( base_path() . '/public/images/upload/emp_img/', strtolower($image_new_name . '_temp.' . $image_extension) );
		$origin_size = getimagesize( $temp_file );
		$origin_width = $origin_size[0];
		$origin_height = $origin_size[1];
		// resize
		$image_resize = new ImageResize($temp_file );
		if( trim( $request->get('height') ) != "")
		{
			$height = $request->get('height');
			
		}
		else
		{
			$height = 0;        	
		}
		if( trim( $request->get('width') ) != "")
		{
			$width = $request->get('width');
			
		}
		else
		{
			$width = 0;
		}
		if($width > 0 && $height > 0)
		{
			$image_resize->resize($width, $height);	
		}
		else if($width == 0 && $height > 0)
		{
			$image_resize->resizeToHeight($height);
		}
		else if($width > 0 && $height == 0) 
		{
			$image_resize->resizeToWidth($width);
		}
		$image_resize->save( base_path() . '/public/images/upload/emp_img/' . $image_new_name . '.' . $image_extension );
		$image_location = '/images/upload/emp_img/' . $image_new_name . '.' . $image_extension;
		File::delete($temp_file);
		$image_data = array(
			'image_name'		=>	$image_name
			,'image_extension'	=>	$image_extension
			,'image_location'	=>	$image_location
			,'origin_height'	=>	$origin_height
			,'origin_width'		=>	$origin_width
			,'height'			=>	$height
			,'width'			=>	$width
		);
		
		// if pass validation -- employe joining letter
		$image_name = $request->file('letter_file')->getClientOriginalName(); 
		$letter_extension = $request->file('letter_file')->getClientOriginalExtension();
		$letter_new_name = md5(microtime(true));
		$n_letter = $letter_new_name. '.' .$letter_extension;
		$temp_file = base_path() . '/public/images/upload/join_letter'.strtolower($letter_new_name . '.' . $letter_extension);
		$request->file('letter_file')
			->move( base_path() . '/public/images/upload/join_letter', strtolower($n_letter . '.' . $letter_extension) );
			
			$remember_token = $request->_token;
			
			$employee = array(
			'fullname' 			=> $request->fullname,
			'username' 			=> $request->username,
			'password' 			=> md5($request->password),
			'date_of_birth' 	=> $request->date_of_birth,
			'present_address' 	=> $request->present_address,
			'parmanent_address' => $request->parmanent_address,
			'country_id' 		=> $request->country_id,
			'mobile' 			=> $request->mobile,
			'email' 			=> $request->email,
			'religion_id' 		=> $request->religion_id,
			'gender_id' 		=> $request->gender_id,
			'father_name' 		=> $request->father_name,
			'mother_name' 		=> $request->mother_name,
			'father_mobile' 	=> $request->father_mobile,
			'department_id' 	=> $request->department_id,
			'post_id' 			=> $request->post_id,
			'confirm_date' 		=> $request->confirm_date,
			'join_date' 		=> $request->join_date,
			'initial_salary' 	=> $request->initial_salary,
			'increment_after' 	=> $request->increment_after,
			'increment_percent' => $request->increment_percent,
			'emp_image' 		=> $n_image,
			//'letter_file' 		=> $letter_new_name,
			'status_id' 		=> $request->status_id,
			'remember_token' 	=> $remember_token,
		);			
			
			if(DB::table('add_employees')->where('id', $id)->update($employee)){
				
				$backup_employee = array(
					
					'department_id' 	=> $request->department_id,
					'salary' 			=> $request->initial_salary,
					'increment_after' 	=> '',
					'increment_percent' => '',
					'increment_step' 	=> '',
					'remember_token' 	=> $remember_token
				);			
				
				DB::table('backup_employees')->where('id', $id)->update($backup_employee);
				
				Session::flash('flash_message', 'Employee updated!');

				return redirect('admin/employee');
			}	
		}else{
			
			$remember_token = $request->_token;
			
			$employee = array(
				'fullname' 			=> $request->fullname,
				'username' 			=> $request->username,
				'date_of_birth' 	=> $request->date_of_birth,
				'present_address' 	=> $request->present_address,
				'parmanent_address' => $request->parmanent_address,
				'country_id' 		=> $request->country_id,
				'mobile' 			=> $request->mobile,
				'email' 			=> $request->email,
				'religion_id' 		=> $request->religion_id,
				'gender_id' 		=> $request->gender_id,
				'father_name' 		=> $request->father_name,
				'mother_name' 		=> $request->mother_name,
				'father_mobile' 	=> $request->father_mobile,
				'department_id' 	=> $request->department_id,
				'post_id' 			=> $request->post_id,
				'confirm_date' 		=> $request->confirm_date,
				'join_date' 		=> $request->join_date,
				'initial_salary' 	=> $request->initial_salary,
				'increment_after' 	=> $request->increment_after,
				'increment_percent' => $request->increment_percent,
				'status_id' 		=> $request->status_id,
				'remember_token' 	=> $remember_token,
			);			
			
		
			if(DB::table('add_employees')->where('id', $id)->update($employee)){
				
				$backup_employee = array(
					'department_id' 	=> $request->department_id,
					'salary' 			=> $request->initial_salary,
					'increment_after' 	=> '',
					'increment_percent' => '',
					'increment_step' 	=> '',
					'remember_token' 	=> $remember_token
				);			
				
				DB::table('backup_employees')->where('id', $id)->update($backup_employee);
				
				Session::flash('flash_message', 'Employee updated!');

				return redirect('admin/employee');
			}
			
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
        Employee::destroy($id);

        Session::flash('flash_message', 'Employee deleted!');

        return redirect('admin/employee');
    }
}
