<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('private.dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fab fa-korvue"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kavlingan<sup>.Id</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('private.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        All data
    </div>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Tanah</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('private.jenis_surat') }}">Jenis surat tanah</a>
                <a class="collapse-item" href="{{ route('private.data_tanah') }}">data tanah</a>
                <a class="collapse-item" href="{{ route('private.validasi_tanah') }}">validasi tanah</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - users Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true"
            aria-controls="collapseUsers">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Pengguna</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingusers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('private.users') }}">Data Pengguna</a>
                <a class="collapse-item" href="{{ route('private.users.validasi_pengguna') }}">Validasi Pengguna</a>
                <a class="collapse-item" href="{{ route('private.users.role_users') }}">Role Pengguna</a>
                <a class="collapse-item" href="users-other.html">Other</a>
            </div>
        </div>
    </li>

</ul>
<!-- End of Sidebar -->
