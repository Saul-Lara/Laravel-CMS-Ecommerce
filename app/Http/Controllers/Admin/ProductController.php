<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Category;

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
        $categories = Category::pluck('name', 'id');
        $data = ['categories' => $categories];
        return view('admin.products.add', $data);
    }
}
