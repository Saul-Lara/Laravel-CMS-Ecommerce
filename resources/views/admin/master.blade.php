<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - MyCms</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('/static/css/adminStyle.css') }}">
    <link rel="stylesheet" href="{{ url('/static/css/adminComponents.css') }}">

    <!-- General JS Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="{{ url('/static/js/stisla.js') }}"></script>
    <script src="{{ url('/static/js/adminScripts.js') }}"></script>
    <script src="{{ url('/static/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('/static/js/admin.js') }}"></script>

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            <!-- Top Nav Bar -->
            @include('admin.topbar')

            <!-- Sidebar Lateral -->
            @include('admin.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    <!-- Header section -->
                    <div class="section-header">
                        <h1>@yield('title')</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
                            @section('breadcrumb')
                            @show
                        </div>
                    </div>

                    @if (Session::has('message'))
                    <!-- Message alert -->
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

                    <!-- Content section -->
                    @section('content')
                    @show
                </section>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2020 <div class="bullet"></div><a href="{{ env('COMPANY_SITE') }}">{{ env('COMPANY') }}</a>
                </div>
                <div class="footer-right">
                    Version 1.2.0 (Laravel)
                </div>
            </footer>

        </div>
    </div>
</body>

</html>