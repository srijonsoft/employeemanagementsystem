<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'designations';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
	
	public function getDepartment(){
		
		return Department::where('id', $this->department_id)->first()->title;
	}
	public function getStatus(){
		
		return Status::where('id', $this->status_id)->first()->title;
	}

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'department_id', 'status_id'];
}
