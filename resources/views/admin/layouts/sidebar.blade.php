      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item ">
                <a href="{{ route('dashboard') }}" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Main</li>
              <li class="nav-item {{ request()->is('admin/data-pendaftar') ? 'active' : '' }}">
                <a href="{{ route('data-pendaftar') }}" class="nav-link "><i class="fas fa-user-graduate"></i><span>Data Pendaftar</span></a>
              </li>
              <li class="nav-item {{ request()->is('admin/status-pendaftar') ? 'active' : '' }}">
                <a href="{{ route('status-pendaftar') }}" class="nav-link "><i class="fas fa-book"></i><span>Data Status Pendaftar</span></a>
              </li>
              <li class="menu-header">Dashboard</li>
              <li class="nav-item {{ request()->is('admin/tahun-ajaran*') ? 'active' : '' }}">
                <a href="{{ route('tahun-ajaran.index') }}" class="nav-link "><i class="fas fa-calendar"></i><span>Data Tahun Ajaran</span></a>
              </li>
              <li class="nav-item {{ request()->is('admin/qna*') ? 'active' : '' }}">
                <a href="{{ route('qna.index') }}" class="nav-link "><i class="fas fa-question"></i><span>Qna</span></a>
              </li>
              <li class="nav-item {{ request()->is('admin/jadwal*') ? 'active' : '' }}">
                <a href="{{ route('jadwal.index') }}" class="nav-link "><i class="fas fa-lemon"></i><span>Jadwal Kegiatan</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                  <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
              </li>
            </ul>
          </ul>
        </aside>
      </div>