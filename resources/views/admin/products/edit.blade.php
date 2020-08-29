@extends('admin.master')

@section('title', 'Editar producto')

@section('breadcrumb')
<div class="breadcrumb-item">
    <a href="{{ url('/admin/products') }}"> Productos</a>
</div>
<div class="breadcrumb-item">
    Editar producto
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="row">

        <div class="col-md-9">
            {!! Form::open(['url' => '/admin/product/'.$product->id.'/edit', 'files' => true]) !!}
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre del producto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-keyboard"></i>
                                        </div>
                                    </div>
                                    {!! Form::text('name', $product->name, ['class' => 'form-control',
                                    'placeholder' => 'Nombre del producto...' , 'required']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="category">Categoria</label>
                                <div class="input-group">
                                    {!! Form::select('category', $categories , $product->category_id , ['class' =>
                                    'form-control select-search']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="img">Imagen destacada</label>
                                <div class="custom-file">
                                    {!! Form::file('img', ['class' => 'custom-file-input', 'id' => 'customFile',
                                    'accept' => 'image/*']) !!}
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="price">Precio</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-money-bill-wave"></i>
                                        </div>
                                    </div>
                                    {!! Form::number('price', $product->price, ['class' => 'form-control', 'placeholder'
                                    =>
                                    'Precio...', 'min' => '0.00', 'step' => '0.01', 'required']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="indiscount">¿En descuento?</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-money-bill-wave"></i>
                                        </div>
                                    </div>
                                    {!! Form::select('indiscount', ['0' => 'No', '1' => 'Si'], $product->in_discount ,
                                    ['class' =>
                                    'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="discount">Descuento</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-money-bill-wave"></i>
                                        </div>
                                    </div>
                                    {!! Form::number('discount',$product->discount, ['class' => 'form-control', 'min' =>
                                    '0.00',
                                    'step' => '0.01', 'required']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="indiscount">Estado</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-money-bill-wave"></i>
                                        </div>
                                    </div>
                                    {!! Form::select('status', ['0' => 'Borrador', '1' => 'Publico'], $product->status ,
                                    ['class' =>
                                    'form-control']) !!}
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Clave del producto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-store-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Clave del producto..."
                                        name="claveArticulo" required="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content">Descripcion</label>
                                {!! Form::textarea('content', $product->content, ['class' => 'form-control', 'id' =>
                                'editor',
                                'required']) !!}

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card-footer text-right col-md-12">
                            {!! Form::submit('Agregar producto.', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                </div>
            </div>
            {!! Form::close() !!}
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Imagen destacada</h4>
                </div>
                <div class="card-body">
                    <img src="{{ url('/uploads/'.$product->file_path.'/'.$product->image) }}"
                        alt="Imagen {{ $product->name }}" class="img-fluid">
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Galeria</h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['url' => '/admin/product/'.$product->id.'/gallery/add', 'files' => true, 'id' =>
                    'form_product_gallery']) !!}
                    {!! Form::file('file_image', ['id' => 'product_file_image', 'accept' => 'image/*', 'style' =>
                    'display: none;', 'required']) !!}
                    {!! Form::close() !!}
                    <a href="#" id="btn_product_file_image" class="btn btn-outline-primary btn-lg btn-block">
                        <i class="fas fa-plus"></i>
                    </a>

                    <hr>

                    <div class="row row-cols-2">
                        @foreach ($product->getGallery as $image)
                        <!--     <a href="{{ url('/admin/product/'.$image->id.'/delete') }}" type="button"
                            class="btn btn-danger btn-action" data-toggle="tooltip" title="Eliminar"><i
                                class="fas fa-trash-alt"></i></a>
                            <img src="{{ url('/uploads/'.$image->file_path.'/t_'.$image->file_name) }}"> -->
                        <div class="col">
                            <img src="{{ url('/uploads/'.$image->file_path.'/t_'.$image->file_name) }}"
                                class="img-fluid">
                            <a href="{{ url('/admin/product/'.$product->id.'/gallery/'.$image->id.'/delete') }}" id="btn_product_file_image" class="btn btn-outline-danger btn-block">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection