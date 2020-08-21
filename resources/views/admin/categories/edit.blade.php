@extends('admin.master')

@section('title', 'Editar categoria')

@section('breadcrumb')
<div class="breadcrumb-item">
    <a href="{{ url('/admin/categories') }}"> Categorias</a>
</div>
<div class="breadcrumb-item">
    Editar categoria
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4>Agregar categorias</h4>
                </div>

                {!! Form::open(['url' => '/admin/category/'. $category->id .'/edit']) !!}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="far fa-keyboard"></i>
                                </div>
                            </div>
                            {!! Form::text('name', $category->name, ['class' => 'form-control',
                            'placeholder' => 'Nombre...' , 'required']) !!}
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
                            {!! Form::text('icon', $category->icon, ['class' => 'form-control',
                            'placeholder' => 'Icono...' , 'required']) !!}
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