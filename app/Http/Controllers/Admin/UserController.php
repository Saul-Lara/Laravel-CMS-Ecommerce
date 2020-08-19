<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function getUsers()
    {
        $admins = Admin::orderBy('id', 'desc')->get();

        //dd($admins);
        $data = ['admins' => $admins];

        return view('admin.users.index', $data);
    }
    
}
