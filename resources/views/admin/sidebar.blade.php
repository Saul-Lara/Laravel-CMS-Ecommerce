<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/admin') }}">asd</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/admin') }}">as</a>
        </div>
        <ul class="sidebar-menu">
            <li class="active">
                <a class="nav-link" href="{{ url('/admin') }}">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr>

            <li class="menu-header">Productos</li>

            <li>
                <a class="nav-link" href="{{ url('/admin/products') }}">
                    <i class="fas fa-boxes"></i>
                    <span>Productos</span>
                </a>
            </li>

            <li>
                <a class="nav-link" href="{{ url('/admin/categories') }}">
                    <i class="fas fa-folder-open"></i>
                    <span>Categorias</span>
                </a>
            </li>
            
            <hr>

            <li class="menu-header">Administracion</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-friends"></i>
                    <span>Usuarios</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/') }}">Añadir un nuevo usuario</a></li>
                    <li><a class="nav-link" href="{{ url('admin/users') }}">Ver usuarios actuales</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>