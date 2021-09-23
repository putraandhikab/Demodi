<ul class="sidebar-nav">
    <li class="sidebar-header">
        Pages
    </li>

    <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ url('dashboard') }}">
            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item {{ Request::is('sales') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ url('sales') }}">
            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Sales</span>
        </a>
    </li>

    <li class="sidebar-item {{ Request::is('produks') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ url('produks') }}">
            <i class="align-middle" data-feather="truck"></i> <span class="align-middle">Produk</span>
        </a>
    </li>

    <li class="sidebar-item {{ Request::is('prospek') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ url('prospek') }}">
            <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Prospek</span>
        </a>
    </li>

    <li class="sidebar-item {{ Request::is('jadwals') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ url('jadwals') }}">
            <i class="align-middle" data-feather="watch"></i> <span class="align-middle">Jadwal</span>
        </a>
    </li>
    