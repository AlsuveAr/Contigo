<?php

namespace App\Http\Controllers\Counselor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\History;
use App\Client;

use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:counselor');
    }

    public function index() 
    {
    	$user = Auth::user();
        $clients = History::where('counselor_id', $user->counselor->id)->with('client')->get();

    	return view('counselor.dashboard', compact('clients'));
    }

    public function clients() 
    {   
        $user = Auth::user();
        $clients = History::where('counselor_id', $user->counselor->id)->with('client')->get();

        
        return view('counselor.clients', compact('clients'));
    }
    public function client(Client $client) 
    {   
        $history = History::where('client_id', $client->id)->first();


        return view('counselor.client', compact('client', 'history'));
    }

    public function info()
    {
        $counselor = Auth::user()->counselor;

        return view('counselor.info', compact('counselor'));
    }

    public function messages()
    {
        
        $histories = History::where('counselor_id', Auth::user()->counselor->id)->with('client')->get();

        //dd($histories);

        return view('counselor.messages', compact('histories'));
    }
}
