<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'wishes';

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
    protected $fillable = ['invitation_id', 'from', 'message'];
}
