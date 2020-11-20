      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item  {{ request()->is('user') ? 'active' : '' }}">
              <a href="{{ route('dashboard-user') }}"  class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item {{ request()->is('user/tes-proses') ? 'active' : '' }}">
              <a href="{{ route('dashboard-tes-proses') }}" class="nav-link"><i class="fas fa-book"></i><span>Tes Yang Anda Ikuti</span></a>
            </li>
            <li class="nav-item {{ request()->is('user/pesan') ? 'active' : '' }}">
              <a href="{{ route('dashboard-pesan')}}" class="nav-link"><i class="fas fa-envelope-open"></i><span>Pesan</span></a>
            </li>
          </ul>
        </div>
      </nav>