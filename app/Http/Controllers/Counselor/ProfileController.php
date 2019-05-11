<?php

namespace App\Http\Controllers\Counselor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\Counselor\InfoRequest;

use App\Counselor;


class ProfileController extends Controller
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

    public function update(ProfileRequest $request)
    {
    	auth()->user()->update($request->all());

        return back()->withStatus(__('Datos actualizados correctamente.'));
    }

    public function password(PasswordRequest $request)
    {
    	auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Contraseña actualizada correctamente.'));
    }

    public function info(InfoRequest $request)
    {
    	$consejero = Counselor::find(auth()->user()->counselor->id);
    	//auth()->user()->counselor->update($request->all());

    	$consejero->update($request->all());

    	return back()->withStatus(__('Los datos han sido actualizados correctamente.'));
    }
}
