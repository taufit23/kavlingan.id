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



    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Tanah</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('private.jenis_surat') }}">Jenis surat tanah</a>
                <a class="collapse-item" href="{{ route('private.data_tanah') }}">Data tanah</a>
                {{-- <a class="collapse-item" href="{{ route('private.validasi_tanah') }}">validasi tanah</a> --}}
            </div>
        </div>
    </li>

    <!-- Nav Item - users Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true"
            aria-controls="collapseUsers">
            <i class="fas fa-fw fa-users"></i>
            <span>Akun Penjual & Pembeli</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingusers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('private.users') }}">Data Penjual & Pembeli</a>
                {{-- <a class="collapse-item" href="{{ route('private.users.validasi_pengguna') }}">Validasi Pengguna</a> --}}
                {{-- <a class="collapse-item" href="{{ route('private.users.role_users') }}">Role Pengguna</a> --}}
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsebank" aria-expanded="true"
            aria-controls="collapsebank"><i class="fas fa-search-dollar"></i>
            <span>Bank</span>
        </a>
        <div id="collapsebank" class="collapse" aria-labelledby="headingusers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('private.data_bank') }}">Data Bank</a>
            </div>
        </div>
    </li>

</ul>
<!-- End of Sidebar -->
