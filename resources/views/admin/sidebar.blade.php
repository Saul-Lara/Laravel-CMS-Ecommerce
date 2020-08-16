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

            <li>
                <a class="nav-link" href="{{ url('/admin/products') }}">
                    <i class="fas fa-boxes"></i>
                    <span>Productos</span>
                </a>
            </li>

            <li>
                <a class="nav-link" href="{{ url('/admin/users') }}">
                    <i class="fas fa-user-friends"></i>
                    <span>Usuarios</span>
                </a>
            </li>
        </ul>
    </aside>
</div>