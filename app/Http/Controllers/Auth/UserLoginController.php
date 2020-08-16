<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest')->except(['getLogout']);
    }

    public function getLogin()
    {
        return view('connect.login');
    }

    public function postLogin(Request $request)
    {

    }

    public function getRegister()
    {
        return view('welcome');
    }

    public function getLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
