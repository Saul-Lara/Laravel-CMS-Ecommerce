@extends('admin.connect.master')

@section('title', 'Admin Login')

@section('content')
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <img src="{{ url('/static/img/logoAutoIn.png.') }}" alt="logo" width="150" height="100%" class="mb-5 mt-2">
                        <h4 class="text-dark font-weight-normal">Bienvenido a <span class="font-weight-bold">Mass Web</span>
                        </h4>
                        <p class="text-muted">Por favor inicia sesion en la plataforma.</p>
                        <!--
                        <form method="POST" action="" class="needs-validation" novalidate="" autocomplete="off">
                            <div class="form-group">
                                <label for="email">Nombre de usuario</label>
                                <input type="text" class="form-control" name="userName" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Por favor llena el campo Nombre de usuario
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Contraseña</label>
                                </div>
                                <input type="password" class="form-control" name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                    Por favor llena el campo Contraseña
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                    Iniciar sesion
                                </button>
                            </div>
                        </form> -->
                        {!! Form::open(['url' => 'admin/login']) !!}

                        <div class="form-group">
                            <label for="email">Correo electronico</label>
                            {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Contraseña</label>
                            </div>
                            {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group text-right">
                            {!! Form::submit('Iniciar sesion', ['class' => 'btn btn-primary btn-lg btn-icon icon-right']) !!}
                        </div>

                        {!! Form::close() !!}

                        @if (Session::has('message'))
                            <div class="container">
                                <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
                                    {{ Session::get('message') }}
                                    @if ($errors->any())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                    
                                </div>

                                <script>
                                    $('.alert').slideDown();
                                    setTimeout(() => {
                                        $('.alert').slideUp();
                                    }, 8000);
                                </script>
                            </div>
                        @endif

                        <div class="text-center mt-5 text-small">
                            Copyright &copy; Autoin.
                            <div class="mt-2">
                                <a href="#">Privacy Policy</a>
                                <div class="bullet"></div>
                                <a href="#">Terms of Service</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
                    data-background="https://picsum.photos/1575/2101">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h1 class="mb-2 display-4 font-weight-bold">Good Morning</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop