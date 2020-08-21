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
        $categories = Category::orderBy('id', 'asc')->get();
        $data = ['categories' => $categories];
        return view('admin.categories.home', $data);
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

            $c->name = e($request->input('name'));
            $c->slug = Str::slug($request->input('name'));
            $c->icon = e($request->input('icon'));

            if($c->save()):
                return back()->with('message', 'Se ha guardado con exito.')
            ->with('typealert', 'success');
            endif;
        endif;
    }

    public function getCategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        $data = ['category' => $category];
        return view('admin.categories.edit', $data);
    }

    public function postCategoryEdit(Request $request, $id){
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
            $c = Category::findOrFail($id);

            $c->name = e($request->input('name'));
            $c->icon = e($request->input('icon'));

            if($c->save()):
                return back()->with('message', 'Se ha guardado con exito.')
            ->with('typealert', 'success');
            endif;
        endif;
    }

    public function getCategoryDelete($id)
    {
        $category = Category::findOrFail($id);

        if($category->delete()):
            return back()->with('message', 'Se ha eliminado con exito.')
        ->with('typealert', 'success');
        endif;
    }
}
