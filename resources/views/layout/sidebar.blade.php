<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Prodi TI</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Data
    </div>

    <!-- Nav Item - Master Data (Collapsible) -->
    <li class="nav-item {{ request()->is('dosen*') || request()->is('mahasiswa*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masterDataCollapse" aria-expanded="true" aria-controls="masterDataCollapse">
            <i class="fas fa-fw fa-database"></i>
            <span>Master Data</span>
        </a>
        <div id="masterDataCollapse" class="collapse {{ request()->is('dosen*') || request()->is('mahasiswa*') ? 'show' : '' }}" aria-labelledby="headingMasterData" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('dosen*') ? 'active' : '' }}" href="{{ route('dosen.index') }}">
                    <i class="fas fa-chalkboard-teacher"></i> Dosen
                </a>
                <a class="collapse-item {{ request()->is('mahasiswa*') ? 'active' : '' }}" href="{{ route('mahasiswa.index') }}">
                    <i class="fas fa-user-graduate"></i> Mahasiswa
                </a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Akademik (Collapsible) -->
    <li class="nav-item {{ request()->is('matakuliah*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#akademikCollapse" aria-expanded="true" aria-controls="akademikCollapse">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Akademik</span>
        </a>
        <div id="akademikCollapse" class="collapse {{ request()->is('matakuliah*') ? 'show' : '' }}" aria-labelledby="headingAkademik" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('matakuliah*') ? 'active' : '' }}" href="{{ route('matakuliah.index') }}">Mata Kuliah</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Riset & PKM (Collapsible) -->
    <li class="nav-item {{ request()->is('projectmahasiswa*') || request()->is('penelitian*') || request()->is('pengabdianmasyarakat*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#risetCollapse" aria-expanded="true" aria-controls="risetCollapse">
            <i class="fas fa-fw fa-flask"></i>
            <span>Riset & PKM</span>
        </a>
        <div id="risetCollapse" class="collapse {{ request()->is('projectmahasiswa*') || request()->is('penelitian*') || request()->is('pengabdianmasyarakat*') ? 'show' : '' }}" aria-labelledby="headingRiset" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('projectmahasiswa*') ? 'active' : '' }}" href="{{ route('projectmahasiswa.index') }}">Project Mahasiswa</a>
                <a class="collapse-item {{ request()->is('penelitian*') ? 'active' : '' }}" href="{{ route('penelitian.index') }}">Riset Dosen</a>
                <a class="collapse-item {{ request()->is('pengabdianmasyarakat*') ? 'active' : '' }}" href="{{ route('pengabdianmasyarakat.index') }}">Pengabdian Masyarakat</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Konten & Informasi
    </div>

    <!-- Nav Item - Informasi -->
    <li class="nav-item {{ request()->is('informasi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('informasi.index') }}">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>Informasi</span>
        </a>
    </li>

    <!-- Nav Item - Alumni & Tracer Alumni (Collapsible) -->
    <li class="nav-item {{ request()->is('alumni*') || request()->is('tracer-alumni*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#alumniCollapse" aria-expanded="true" aria-controls="alumniCollapse">
            <i class="fas fa-fw fa-users"></i>
            <span>Alumni</span>
        </a>
        <div id="alumniCollapse" class="collapse {{ request()->is('alumni*') || request()->is('tracer-alumni*') ? 'show' : '' }}" aria-labelledby="headingAlumni" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('alumni*') ? 'active' : '' }}" href="{{ route('alumni.index') }}">Data Alumni</a>
                <a class="collapse-item {{ request()->is('tracer-alumni*') ? 'active' : '' }}" href="{{ route('tracer-alumni.index') }}">Tracer Alumni</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Peraturan (Collapsible) -->
    <li class="nav-item {{ request()->is('akademik*') || request()->is('kemahasiswaan*') || request()->is('administratif*') || request()->is('keuangan*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#peraturanCollapse" aria-expanded="true" aria-controls="peraturanCollapse">
            <i class="fas fa-fw fa-gavel"></i>
            <span>Peraturan</span>
        </a>
        <div id="peraturanCollapse" class="collapse {{ request()->is('akademik*') || request()->is('kemahasiswaan*') || request()->is('administratif*') || request()->is('keuangan*') ? 'show' : '' }}" aria-labelledby="headingPeraturan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('akademik*') ? 'active' : '' }}" href="{{ route('akademik.index') }}">Akademik</a>
                <a class="collapse-item {{ request()->is('kemahasiswaan*') ? 'active' : '' }}" href="{{ route('kemahasiswaan.index') }}">Kemahasiswaan</a>
                <a class="collapse-item {{ request()->is('administratif*') ? 'active' : '' }}" href="{{ route('administratif.index') }}">Administratif</a>
                <a class="collapse-item {{ request()->is('keuangan*') ? 'active' : '' }}" href="{{ route('keuangan.index') }}">Keuangan</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>