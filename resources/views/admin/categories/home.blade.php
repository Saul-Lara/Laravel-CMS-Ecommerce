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
                            {!! Form::text('icon', null, ['class' => 'form-control',
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

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4>Categorias</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="80">Icono</th>
                                    <th>Nombre</th>
                                    <th>Acciones disponibles</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{!! htmlspecialchars_decode($category->icon) !!}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ url('/admin/category/'.$category->id.'/edit') }}" type="button"
                                            class="btn btn-primary btn-action" data-toggle="tooltip" title="Editar"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ url('/admin/category/'.$category->id.'/delete') }}" type="button"
                                            class="btn btn-danger btn-action" data-toggle="tooltip" title="Eliminar"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection