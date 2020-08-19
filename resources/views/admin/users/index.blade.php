@extends('admin.master')

@section('title', 'Ver usuarios')

@section('breadcrumb')
<div class="breadcrumb-item">
    Ver usuarios
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Email</th>
                                    <th>Acciones disponibles</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->lastname }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        <a href="{{ url('/admin/user/'.$admin->id.'/edit') }}" type="button" class="btn btn-primary btn-action" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></a>
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