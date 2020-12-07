   @php
        $teman=App\Models\Teman::where('users_id','=',Auth::user()->id)->pluck('id')->first();

        $pesan=App\Models\Chat::where('teman_id','=',$teman)->where('read','=',null)->whereHas('user',function($query){
            $query->where('role','=','admin');
        })->get();

        // dd($pesan->toArray());
    @endphp
   <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <div class="container">
            <div class="navbar-nav">
            <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
            </div>
            <div class="nav-collapse">
            <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                <i class="fas fa-ellipsis-v"></i>
            </a>
            </div>
            <ul class="navbar-nav navbar-right">
            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg {{ $pesan->count() > 0 ? 'beep' : '' }}"><i class="far fa-envelope"></i></a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Pesan <h6 class="d-inline"><span class="d-inline badge badge-danger">{{ $pesan->count() }}</span></h6>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                     @foreach ($pesan as $index=>$item)
                        @if ($item->count() > 0)
                            <a href="{{ route('dashboard-pesan')}}" class="dropdown-item dropdown-item-unread">
                            <div class="dropdown-item-avatar">
                                <img alt="image" src="{{ Avatar::create($item->user->name)->toGravatar(['d' => 'wavatar', 'r' => 'pg', 's' => 100])}}" class="rounded-circle">
                            </div>
                            <div class="dropdown-item-desc">
                                <b>{{ $item->user->name }}</b>
                                <p>{{ $item->pesan }}</p>
                                <div class="time">{{ $item->created_at->format('H:i:s A') }}</div>
                            </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
                </div>
            </li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ Avatar::create(Auth::user()->name)->toGravatar(['d' => 'wavatar', 'r' => 'pg', 's' => 100])}}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
                <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>                
                    <form action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <button href="#" class="dropdown-item btn-icon icon-left text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
            </ul>
        </div>
      </nav>