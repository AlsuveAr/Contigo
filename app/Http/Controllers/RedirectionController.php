<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class RedirectionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (Auth::check()) {
            if ($user->hasRole('client')) {
                return redirect()->route('web.couseling');

            } else if ($user->hasRole('counselor')){

                return redirect()->route('counselor.index');
                
            } else if($user->hasRole('admin')) {
                return redirect()->route('admin.home');
            }
        } else {
            return view('web.index');
        }
    }
}
