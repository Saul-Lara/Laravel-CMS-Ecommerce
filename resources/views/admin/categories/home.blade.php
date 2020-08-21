@extends('admin.master')

@section('title', 'Categorias')

@section('breadcrumb')
<div class="breadcrumb-item">
    <a href="{{ url('/admin/categories') }}"> Categorias</a>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Agregar categorias</h4>
                </div>

                {!! Form::open(['url' => '/admin/category/add']) !!}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
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

                    <div class="form-group">
                        <label for="icon">Icono</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="far fa-keyboard"></i>
                                </div>
                            </div>
                            {!! Form::text('icon', null, ['class' => 'form-control',
                            'placeholder' => 'Nombre del producto...' , 'required']) !!}
                        </div>
                    </div>
                </div>

                <div class="card-footer text-right col-md-12">
                    {!! Form::submit('Guardar.', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection