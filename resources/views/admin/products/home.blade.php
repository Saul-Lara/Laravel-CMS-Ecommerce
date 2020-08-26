@extends('admin.master')

@section('title', 'Productos')

@section('breadcrumb')
<div class="breadcrumb-item">
    Productos
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-action">
                        <a href="{{ url('/admin/product/add') }}" class="btn btn-primary">Agregar producto</a>
                    </div>
                  </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Precio</th>
                                    <th>Acciones disponibles</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        <a data-fancybox="gallery" href="{{ url('/uploads/'.$product->file_path.'/'.$product->image) }}">
                                            <img src="{{ url('/uploads/'.$product->file_path.'/t_'.$product->image) }}"
                                                alt="Imagen {{ $product->name }}" width="60">
                                        </a>
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <a href="{{ url('/admin/product/'.$product->id.'/edit') }}" type="button"
                                            class="btn btn-primary btn-action" data-toggle="tooltip" title="Editar"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ url('/admin/product/'.$product->id.'/delete') }}" type="button"
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