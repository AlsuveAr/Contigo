<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'user_id', 'name', 'lst_name',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function history()
    {
    	return $this->hasOne('App\History');
    }
}
