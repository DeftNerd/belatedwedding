<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'guests';

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
    protected $fillable = ['invitation_id', 'name', 'phone', 'email', 'is_child', 'is_attending_ceremony', 'is_attending_reception', 'meal_id', 'comment'];

    protected $casts = [
      'is_child' => 'boolean',
      'is_attending_ceremony' => 'boolean',
      'is_attending_reception' => 'boolean'
    ];

    public function invitation()
    {
        return $this->belongsTo('App\Invitation');
    }

    public function gifts()
    {
        return $this->belongsToMany('App\Gift');
    }

}
