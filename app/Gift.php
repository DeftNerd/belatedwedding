<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gifts';

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
    protected $fillable = ['description', 'is_thanked', 'thanked_at'];

    public function guests()
    {
        return $this->belongsToMany('App\Guest');
    }

}
