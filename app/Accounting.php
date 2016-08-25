<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounting extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'salary_payments';

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
    protected $fillable = ['emp_code', 'salary', 'payment_date', 'status_id', 'payment_amount', 'due_amount'];
}
