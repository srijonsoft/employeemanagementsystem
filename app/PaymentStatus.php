<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payment_statuses';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
	
	public function getStatus(){
		
		return Status::where('id', $this->status_id)->first()->title;
	}

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'status_id'];
}
