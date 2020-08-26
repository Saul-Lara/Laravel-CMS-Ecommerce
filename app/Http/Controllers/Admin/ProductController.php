<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Category;
use App\Http\Models\Product;

use Validator, Str, Config, Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getProducts()
    {
        $products = Product::orderBy('id', 'desc')->paginate(20);
        $data = ['products' => $products];
        return view('admin.products.home', $data);
    }

    public function getProductAdd()
    {
        $categories = Category::pluck('name', 'id');
        $data = ['categories' => $categories];
        return view('admin.products.add', $data);
    }

    public function postProductAdd(Request $request)
    {
        $rules = [
            'name' => 'required',
            'img' => 'required',
            'price' => 'required',
            'content' => 'required'
        ];

        $messages = [
            'name.required' => 'Se requiere de un nombre para el producto.',
            'img.required' => 'Se requiere una imagen para el producto.',
            'img.image' => 'El archivo debe ser una imagen.',
            'price.required' => 'Ingrese el precio del producto.',
            'content.required' => 'Ingrese una descripcion del producto.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')
            ->with('typealert', 'danger')->withInput();
        else:
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt , '', $request->file('img')->getClientOriginalName()));
            $filename = rand(1, 999).'-'.$name.'.'.$fileExt;
            $final_file = $upload_path.$path.'/'.$filename;

            $product = new Product;

            $product->status = '0';
            $product->name = e($request->input('name'));
            $product->slug = Str::slug($request->input('name'));
            $product->category_id = $request->input('category');
            $product->file_path = date('Y-m-d');
            $product->image = $filename;
            $product->price = $request->input('price');
            $product->in_discount = $request->input('indiscount');
            $product->discount = $request->input('discount');
            $product->content = e($request->input('content'));

            if($product->save()):
                if($request->hasFile('img')):
                    $file = $request->img->storeAs($path, $filename, 'uploads');
                    $image = Image::make($final_file);
                    $image->fit(256, 256, function ($constraint) {
                        $constraint->upsize();
                    });
                    $image->save($upload_path.$path.'/t_'.$filename);
                endif;
                return redirect('admin/products')->with('message', 'Se ha guardado con exito.')
            ->with('typealert', 'success');
            endif;

        endif;
        
    }
}
