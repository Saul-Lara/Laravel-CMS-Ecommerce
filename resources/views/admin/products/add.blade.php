@extends('admin.master')

@section('title', 'Agregar producto')

@section('breadcrumb')
<div class="breadcrumb-item">
    <a href="{{ url('/admin/products') }}"> Productos</a>
</div>
<div class="breadcrumb-item">
    Agregar producto
</div>
@endsection

@section('content')
<div class="section-body">
    {!! Form::open(['url' => '/admin/product/add']) !!}
    <div class="row">
        <div class="col-12">
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
                                    {!! Form::text('name', null, ['class' => 'form-control',
                                    'placeholder' => 'Nombre del producto...' , 'required']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="category">Categoria</label>
                                <div class="input-group">
                                    {!! Form::select('category', $categories , 0 , ['class' =>
                                    'form-control select-search']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="img">Imagen destacada</label>
                                <div class="custom-file">
                                    {!! Form::file('img', ['class' => 'custom-file-input', 'id' => 'customFile',
                                    'required']) !!}
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
                                    {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' =>
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
                                    {!! Form::select('indiscount', ['0' => 'No', '1' => 'Si'], 0 , ['class' =>
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
                                    {!! Form::number('discount', 0.00, ['class' => 'form-control', 'min' => '0.00',
                                    'step' => '0.01', 'required']) !!}
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
                                {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'editor',
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
        </div>

    </div>
    {!! Form::close() !!}
</div>
@endsection