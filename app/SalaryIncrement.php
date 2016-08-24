<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryIncrement extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'salary_increments';

    /**
    * The database primary key value.
    *
    * @var string
    */
	
	protected $primaryKey = 'id';
	
	public function getEmpInfo(){
		
		return AddEmployee::where('id', $this->id)->first()->fullname;
	}
	public function getDepartmnt(){
		
		return Department::where('id', $this->department_id)->first()->title;
	}
	public function getIncrementStep(){
		
		return SalaryIncrement::orderBy('id', 'desc')->first()->increment_step;
	}

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
     protected $fillable = ['emp_code', 'department_id', 'salary', 'increment_after', 'increment_percent', 'increment_step'];
}
