<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'leave_applications';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'designation_id', 'leavetype_id', 'no_of_days', 'start_date', 'ending_date', 'purpose', 'status'];
}
