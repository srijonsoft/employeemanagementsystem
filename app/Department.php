<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'departments';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
	
	// Get Status
	
	public function getStatus(){
		
		return Status::where('id', $this->status_id)->first()->title;
	}

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body'];
}
