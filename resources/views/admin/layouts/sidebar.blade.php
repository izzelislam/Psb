      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand mt-2 mb-4">
            <img src="{{ asset('front/assets/img/Pita_web_logo-1.png') }}" alt="" style="width: 70%">
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PSB</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item ">
                <a href="{{ route('dashboard') }}" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">UTAMA</li>
              {{-- <li class="nav-item {{ request()->is('admin/data-pendaftar') ? 'active' : '' }}">
                <a href="{{ route('data-pendaftar') }}" class="nav-link "><i class="fas fa-user-graduate"></i><span>Data Pendaftar</span></a>
              </li> --}}
              <li class="nav-item {{ request()->is('admin/status-pendaftar*') ? 'active' : '' }}">
                <a href="{{ route('status-pendaftar') }}" class="nav-link "><i class="fas fa-id-card"></i><span>Biodata</span></a>
              </li>
              <li class="nav-item {{ request()->is('admin/nilai') ? 'active' : '' }}">
                <a href="{{ route('nilai.index') }}" class="nav-link "><i class="fas fa-tachometer-alt"></i><span>Nilai</span></a>
              </li>
              <li class="nav-item {{ request()->is('admin/video') ? 'active' : '' }}">
                <a href="{{ route('video.index') }}" class="nav-link "><i class="fas fa-video"></i><span>Video</span></a>
              </li>
              <li class="nav-item {{ request()->is('admin/wawancara') ? 'active' : '' }}">
                <a href="{{ route('wawancara.index') }}" class="nav-link "><i class="fas fa-microphone"></i><span>Wawancara</span></a>
              </li>
              <li class="nav-item {{ request()->is('admin/calon-santri-baru') ? 'active' : '' }}">
                <a href="{{ route('lolos.index') }}" class="nav-link "><i class="fas fa-microchip"></i><span>Lolos</span></a>
              </li>
              <li class="menu-header">Soal</li>
              <li class="nav-item {{ request()->is('admin/soal-tes-iq*') ? 'active' : '' }}">
                <a href="{{ route('soal-tes-iq.index') }}" class="nav-link "><i class="fas fa-leaf"></i><span>Soal Tes Iq</span></a>
              </li>
              <li class="nav-item {{ request()->is('admin/soal-tes-kepribadian*') ? 'active' : '' }}">
                <a href="{{ route('soal-tes-kepribadian.index') }}" class="nav-link "><i class="fas fa-flask"></i><span>Soal Tes Kepribadian</span></a>
              </li>
              <li class="menu-header">LAIN LAIN</li>
              <li class="nav-item {{ request()->is('admin/tahun-ajaran*') ? 'active' : '' }}">
                <a href="{{ route('tahun-ajaran.index') }}" class="nav-link "><i class="fas fa-calendar"></i><span>Data Tahun Ajaran</span></a>
              </li> 
              <li class="nav-item {{ request()->is('admin/informasi*') ? 'active' : '' }}">
                <a href="{{ route('informasi.index') }}" class="nav-link "><i class="fas fa-info-circle"></i><span>Informasi</span></a>
              </li>
              <li class="nav-item {{ request()->is('admin/chat-admin*') ? 'active' : '' }}">
                <a href="{{ route('chat-admin.index') }}" class="nav-link "><i class="fas fa-envelope"></i><span>Pesan</span>
                  <h6 class="d-inline mt-2" >
                    <span class="badge badge-danger ">{{ App\Models\Teman::whereHas('chat',function($query){
                    $query->where('read','=',null)->whereHas('user',function($query){
                        $query->where('role','=','pendaftar');
                      });
                    })->count() }}
                  </span>
                  </h6>
                </a>
              </li>
              <li class="nav-item {{ request()->is('admin/qna*') ? 'active' : '' }}">
                <a href="{{ route('qna.index') }}" class="nav-link "><i class="fas fa-question"></i><span>Qna</span></a>
              </li>
            </ul>
          </ul>
          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <form action="{{ route('logout') }}" method="POST" >
                @csrf
                <button class="btn btn-primary btn-lg btn-block btn-icon-split">
                 Logout
                </button>
            </form>
          </div>
        </aside>
      </div>e