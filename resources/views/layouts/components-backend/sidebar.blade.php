<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header flex items-center py-4 px-6 h-header-height">
      <a href="../dashboard/index.html" class="b-brand flex items-center gap-3">
        <!-- ========   Change your logo from here   ============ -->
        <img src="{{asset('assets/backend/images/logo-white.svg')}}" class="img-fluid logo logo-lg" alt="logo" />
        <img src="{{asset('assets/backend/images/favicon.svg')}}" class="img-fluid logo logo-sm" alt="logo" />
      </a>
    </div>
    <div class="navbar-content h-[calc(100vh_-_74px)] py-2.5">
      <ul class="pc-navbar">
        <li class="pc-item pc-caption">
          <label>Navigation</label>
        </li>
        <li class="pc-item">
        <li class="pc-item">
          <a href="{{ url('admin') }}" class="pc-link">
            <span class="pc-micon">
              <i data-feather="home"></i>
            </span>
            <span class="pc-mtext">Dashboard</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('backend.users.index') }}" class="pc-link">
            <span class="pc-micon">
              <i data-feather="user"></i>
            </span>
            <span class="pc-mtext">User</span>
          </a>
        </li>
        </li>
      </ul>
    </div>
  </div>
</nav>