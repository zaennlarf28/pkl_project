<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>

                <!-- Dashboard 1 -->
                <a class="nav-link" href="{{ route('guru.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <!-- Dashboard 2: User Icon -->
                <a class="nav-link" href="{{ route('guru.kelas.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Daftar Kelas
                </a>

                <a class="nav-link" href="{{ route('guru.tugas.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Daftar Tugas
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name ?? 'Guest' }}
        </div>
    </nav>
</div>
