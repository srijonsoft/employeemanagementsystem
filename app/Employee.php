<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'add_employees';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
	
	public function getDepartmnt(){
		return Department::where('id', $this->department_id)->first()->title;
	}
	
	/**
    * The database post name value.
    *
    * @var string
    */
	public function getPost(){
		return Designation::where('id', $this->post_id)->first()->title;
	}
	
	/**
    * The database country name value.
    *
    * @var string
    */
	public function getCountry(){
		return Country::where('id', $this->country_id)->first()->title;
	}
	
	/**
    * The database religion name value.
    *
    * @var string
    */
	public function getReligion(){
		return Religion::where('id', $this->religion_id)->first()->title;
	}
	
	/**
    * The database religion name value.
    *
    * @var string
    */
	public function getGender(){
		return Gender::where('id', $this->gender_id)->first()->title;
	}
	
	/**
    * The database status name value.
    *
    * @var string
    */
	public function getStatus(){
		return Status::where('id', $this->status_id)->first()->title;
	}

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['emp_code','fullname','username'];
}
