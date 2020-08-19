<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getProducts()
    {
        //$admins = Admin::orderBy('id', 'desc')->get();

        //dd($admins);

        return view('admin.products.home');
    }

    public function getProductAdd()
    {
        //$admins = Admin::orderBy('id', 'desc')->get();

        //dd($admins);

        return view('admin.products.add');
    }
}
