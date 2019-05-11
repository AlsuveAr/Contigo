<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
    	'client_id', 'counselor_id', 'test', 'result_test',
    ];

    public function client() 
    {
    	return $this->belongsTo('App\Client');
    }
    
    public function counselor() 
    {
    	return $this->belongsTo('App\Counselor');
    }

    public function users()
    {
		return $this->belongsToMany(User::class);
    }
}
