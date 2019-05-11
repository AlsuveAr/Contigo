<?php

namespace App\Http\Controllers\Counselor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\History;
use App\Client;

use Illuminate\Support\Facades\Auth;

class CounselingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:counselor');
    }

    public function messages()
    {
    	$histories = History::where('counselor_id', Auth::user()->counselor->id)->with('client')->get();

    	$room = $histories->first();
        //dd($histories);

        return view('counselor.messages', compact('room','histories'));
    }

    public function message(History $room)
    {
    	$histories = History::where('counselor_id', Auth::user()->counselor->id)->with('client')->get();
    	return view('counselor.messages', compact('room', 'histories'));
    }
}
