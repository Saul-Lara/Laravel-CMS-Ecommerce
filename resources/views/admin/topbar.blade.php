<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" aria-label="Mas opciones" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <figure class="avatar mr-2" data-initial="{{ Auth::User()->name[0] }}{{ Auth::User()->lastname[0] }}" style="background-color: #ff9c36; color: #ffffff;">
                </figure>
                <div class="d-sm-none d-lg-inline-block">Hola, {{ Auth::User()->name }} {{ Auth::User()->lastname }} </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" aria-label="Ver perfil" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ url('/admin/logout') }}" aria-label="Cerrar sesion" class="btn-exit-system dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Cerrar sesion
                </a>
            </div>
        </li>
    </ul>
</nav>