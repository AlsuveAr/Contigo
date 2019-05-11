<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Client;
use App\Counselor;
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
        $this->middleware('role:client');
    }
	
    public function couseling()
    {
    	//$client =  Auth::user()->client;
   		//$counselor= Counselor::where('id', $client->history->counselor_id)->first();

   		

    	return view('web.couseling');
    } 

    public function faq()
    {
    	return view('web.faq');
    } 

    public function contactUs()
    {
    	return view('web.contactus');
    } 

    public function account()
    {
    	return view('web.account');
    } 
}
