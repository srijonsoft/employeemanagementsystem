<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailBox extends Model
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
    protected $fillable = ['title', 'body'];
}
