<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('employee.employee-login.create');
});

Route::get('admin', function () {
    return view('admin.user-login.create');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('admin/registration', 'Admin\\RegistrationController');
	Route::resource('admin/department', 'Admin\\DepartmentController');
	Route::resource('admin/designation', 'Admin\\DesignationController');
	Route::resource('admin/employee', 'Admin\\EmployeeController');
	Route::resource('admin/payment-status', 'Admin\\PaymentStatusController');
	Route::resource('admin/salary-increment', 'Admin\\SalaryIncrementController');
	Route::resource('admin/salary-payment', 'Admin\\SalaryPaymentController');
	Route::resource('admin/accounting', 'Admin\\AccountingController');
	Route::resource('admin/mail-box', 'Admin\\MailBoxController');
	
});

Route::post('/salary-info', ['uses' => 'Admin\\SalaryPaymentController@postSalaryInfo', 'as' => 'salary-info']);

Route::post('/account-info', ['uses' => 'Admin\\AccountingController@postAccountInfo', 'as' => 'account-info']);

Route::get('/userimage/{filename}', ['uses' => 'Admin\\RegistrationController@getUserImage', 'as' => 'account.image']);

Route::resource('admin/user-login', 'Admin\\UserLoginController');

Route::get('admin/user-logout', ['uses' => 'Admin\\UserLoginController@logout', 'as' => 'logout']);


Route::post('admin/delete-mail', ['uses' => 'Admin\\MailBoxController@deleteMails', 'as' => 'delete-mail']);


Route::group(['middleware' => ['employee']], function () {
	Route::get('employee/salaryinfo/{emp_code}', ['uses' => 'Employee\\EmployeeLoginController@postSalaryInfo', 'as' => 'salaryinfo']);
	Route::get('employee/increment-info/{emp_code}', ['uses' => 'Employee\\EmployeeLoginController@postInrementInfo', 'as' => 'increment-info']);

});


Route::resource('employee/employee-login', 'Employee\\EmployeeLoginController');

Route::get('employee/logout', ['uses' => 'Employee\\EmployeeLoginController@logout', 'as' => 'logout']);

Route::resource('employee/leave-application', 'Employee\\LeaveApplicationController');
