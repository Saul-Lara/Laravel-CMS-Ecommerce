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
        <a href="{{ url('/admin/product/add') }}">Agregar producto</a>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection