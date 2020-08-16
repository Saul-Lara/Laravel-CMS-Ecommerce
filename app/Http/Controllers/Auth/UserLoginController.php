<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    public function getLogin()
    {
        return view('connect.login');
    }
}
