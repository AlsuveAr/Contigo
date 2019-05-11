<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    protected $fillable = [
    	'user_id', 'name', 'lst_name', 'bio', 'msg'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function histories()
    {
    	return $this->hasMany('App\History');
    }
}
