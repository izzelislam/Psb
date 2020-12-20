     @php
        $teman=App\Models\Teman::where('users_id','=',Auth::user()->id)->pluck('id')->first();

        $data=App\Models\Chat::where('teman_id','=',$teman)->where('read','=',null)->whereHas('user',function($query){
          $query->where('role','=','admin');
        })->count();

     @endphp
     <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item  {{ request()->is('user') ? 'active' : '' }}">
              <a href="{{ route('dashboard-user') }}"  class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item {{ request()->is('user/profile-user') ? 'active' : '' }}">
              <a href="{{ route('dashboard-profile-user') }}" class="nav-link"><i class="fas fa-user beep"></i><span>Profile</span></a>
            </li>
            <li class="nav-item {{ request()->is('user/question-and-answer') ? 'active' : '' }}">
              <a href="{{ route('qna-user')}}" class="nav-link"><i class="fas fa-question-circle"></i><span>Q&A</span></a>
            </li>
            <li class="nav-item {{ request()->is('user/informasi') ? 'active' : '' }}">
              <a href="{{ route('informasi-user')}}" class="nav-link"><i class="fas fa-leaf "></i><span>Informasi</span></a>
            </li>
            <li class="nav-item {{ request()->is('user/pesan') ? 'active' : '' }}">
              <a href="{{ route('dashboard-pesan')}}" class="nav-link"><i class="fas fa-envelope-open {{ $data > 0 ? 'beep' :'' }}"></i><span>Pesan</span> <h6 class="d-inline"><span class="badge badge-danger d-inline   ">
                {{ $data }}
              </span></h6> </a>
            </li>
          </ul>
        </div>
      </nav>