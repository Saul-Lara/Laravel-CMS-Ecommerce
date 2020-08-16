<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Auth;

class AdminLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest:admin')->except(['getLogout']);
    }

    public function getLogin()
    {
        return view('admin.connect.login');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];

        $messages = [
            'email.required' => 'Su correo electronico es requerido.',
            'email.email' => 'El formato del correo es invalido.',
            'password.required' => 'Por favor escriba una contraseña.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')
            ->with('typealert', 'danger');
        else:
            if(Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true) ):
                return redirect('/admin');
            else:
                return back()->with('message', 'Correo electronico o contraseña incorrecta')->with('typealert', 'danger');
            endif;
        endif;
    }

    public function getRegister()
    {
        return view('welcome');
    }

    public function getLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
