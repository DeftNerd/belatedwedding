<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'meals';

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
    protected $fillable = ['name', 'description'];


    public function guests()
    {
       return $this->belongsTo('App\Guest');
    }

}
