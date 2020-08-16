<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest:admin');
    }

    public function getLogin()
    {
        return view('admin.login');
    }

    public function getRegister()
    {
        return view('welcome');
    }
}
