<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Category;
use App\Http\Models\Product;
use App\Http\Models\PGallery;

use Validator, Str, Config, Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getProducts()
    {
        $products = Product::with(['category'])->orderBy('id', 'desc')->paginate(20);
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

    public function getProductEdit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::pluck('name', 'id');
        $data = ['categories' => $categories, 'product' => $product];
        return view('admin.products.edit', $data);
    }

    public function postProductEdit($id, Request $request)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'content' => 'required'
        ];

        $messages = [
            'name.required' => 'Se requiere de un nombre para el producto.',
            'img.image' => 'El archivo debe ser una imagen.',
            'price.required' => 'Ingrese el precio del producto.',
            'content.required' => 'Ingrese una descripcion del producto.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')
            ->with('typealert', 'danger')->withInput();
        else:
            $product = Product::findOrFail($id);

            $product->status = $request->input('status');
            $product->name = e($request->input('name'));
            $product->category_id = $request->input('category');
            if($request->hasFile('img')):
                $path = '/'.date('Y-m-d');
                $fileExt = trim($request->file('img')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt , '', $request->file('img')->getClientOriginalName()));
                $filename = rand(1, 999).'-'.$name.'.'.$fileExt;
                $final_file = $upload_path.$path.'/'.$filename;

                $product->file_path = date('Y-m-d');
                $product->image = $filename;
            endif;
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
                return back()->with('message', 'Se ha actualizado con exito.')
            ->with('typealert', 'success');
            endif;
        endif;
    }

    public function postProductGalleryAdd($id, Request $request)
    {
        $rules = [
            'file_image' => 'required'
        ];

        $messages = [
            'file_image.required' => 'Seleccione una imagen.',
            'file_image.image' => 'El archivo debe ser una imagen.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')
            ->with('typealert', 'danger')->withInput();
        else:
            if($request->hasFile('file_image')):
                $path = '/'.date('Y-m-d');
                $fileExt = trim($request->file('file_image')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt , '', $request->file('file_image')->getClientOriginalName()));
                $filename = rand(1, 999).'-'.$name.'.'.$fileExt;
                $final_file = $upload_path.$path.'/'.$filename;

                $gallery = new PGallery;
                $gallery->product_id = $id;
                $gallery->file_path = date('Y-m-d');
                $gallery->file_name = $filename;

                if($gallery->save()):
                    if($request->hasFile('file_image')):
                        $file = $request->file_image->storeAs($path, $filename, 'uploads');
                        $image = Image::make($final_file);
                        $image->fit(256, 256, function ($constraint) {
                            $constraint->upsize();
                        });
                        $image->save($upload_path.$path.'/t_'.$filename);
                    endif;
                    return back()->with('message', 'Imagen subida con exito.')
                ->with('typealert', 'success');
                endif;

            endif;

        endif;
    }
    
    public function getProductGalleryDelete($id, $gallery_id)
    {
        $gallery = PGallery::findOrFail($gallery_id);
        $path = $gallery->file_path;
        $file = $gallery->file_name;
        $upload_path = Config::get('filesystems.disks.uploads.root');

        if($gallery->product_id != $id):
            return back()->with('message', 'La imagen no puede ser eliminada.')
            ->with('typealert', 'danger');
        else:
            if($gallery->delete()):
                //unlink($upload_path.'/'.$path.'/'.$file);
                //unlink($upload_path.'/'.$path.'/t_'.$file);
                return back()->with('message', 'Imagen borrada con exito.')
                ->with('typealert', 'success');
            endif;
        endif;
    }

}
