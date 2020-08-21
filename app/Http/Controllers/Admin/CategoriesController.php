<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator, Str;

use App\Http\Models\Category;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getHome()
    {
        return view('admin.categories.home');
    }

    public function postCategoryAdd(Request $request){
        $rules = [
            'name' => 'required',
            'icon' => 'required',
        ];

        $messages = [
            'name.required' => 'Se requiere de un nombre para la categoria.',
            'icon.required' => 'Se requiere un icono para la categoria.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')
            ->with('typealert', 'danger');
        else:
            $c = new Category;

            $c->module = $request->input('module');
            $c->name = e($request->input('name'));
            $c->slug = Str::slug($request->input('name'));
            $c->icon = e($request->input('icon'));

            if($c->save()):
                return back()->with('message', 'Se ha guardado con exito.')
            ->with('typealert', 'success');
            endif;
        endif;
    }
}
