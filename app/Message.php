<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
    	'history_id', 'user_id', 'message',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function history()
    {
    	return $this->belongsTo(History::class);
    }

}
