<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-car"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SEWAANku Admin <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Menu Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Menu Kelola Data -->
    <hr class="sidebar-divider">

    <!-- Menu Sidebar Daftar mobil -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.mobil.index') }}">
            <i class="fas fa-fw fa-car"></i>
            <span>Daftar Mobil</span></a>
    </li>

    <!-- Menu Sidebar Daftar Pesan -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.pesan.index') }}">
            <i class="fas fa-envelope fa-fw"></i>
            <span>Daftar Pesan</span></a>
    </li>
</ul>