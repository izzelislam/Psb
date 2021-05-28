      @php
          $pesan=App\Models\Teman::with(['chat'=>function($query){
            $query->where('read','=',null)->whereHas('user',function($query){$query->where('role','=','pendaftar');});
          }])->orderBy('created_at','desc')->get();

      @endphp
      <div class="navbar-bg"></div>
      
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle    
          {{App\Models\Teman::whereHas('chat',function($query){
              $query->where('read','=',null)->whereHas('user',function($query){
                $query->where('role','=','pendaftar');
              });
            })->count()  > 0 ?'beep' :'' }} "><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages 
                <h6 class="d-inline mt-2" >
                  <span class="badge badge-danger ">{{ App\Models\Teman::whereHas('chat',function($query){
                    $query->where('read','=',null)->whereHas('user',function($query){
                      $query->where('role','=','pendaftar');
                    });
                  })->count() }}</span>
                </h6>
                <div class="float-right">
                  <a href="{{ route('read-all') }}">Mark All As Read</a>
                </div>
              </div>
              
              <div class="dropdown-list-content dropdown-list-message">

              @foreach ($pesan as $index=>$item)
                @if ( isset($item) && $item->chat->count() > 0)
                    <a href="#mymodal"
                       data-toggle="modal" 
                       data-target="#mymodal"
                       data-remote="{{ route('isi-chat.index', $item->id) }}" 
                       class="dropdown-item dropdown-item-unread">
                      <div class="dropdown-item-avatar">
                        <img alt="image" src="{{ Avatar::create($item->user->name)->toGravatar(['d' => 'wavatar', 'r' => 'pg', 's' => 100])}}" class="rounded-circle">
                      </div>
                      <div class="dropdown-item-desc">
                        <strong>
                          @if ($item->user->biodata1 != null)
                              {{ $item->user->biodata1->nama }}
                          @else
                              {{ $item->user->name }}
                          @endif
                        </strong>
                        <p>{{ $item->chat->last()->pesan }}</p>
                        <div class="time">{{ $item->chat->last()->created_at->format('H:i:s A') }}</div>
                      </div>
                    </a>
                @endif
              @endforeach

              </div>
              <div class="dropdown-footer text-center">
                <a href="{{ route('chat-admin.index') }}">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ Avatar::create(Auth::user()->name)->toGravatar(['d' => 'retro', 'r' => 'g', 's' => 100])}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <form action="{{ route('logout') }}" method="POST" >
                  @csrf
                  <button href="#" class="dropdown-item btn-icon icon-left text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                  </button>
              </form>
            </div>
          </li>
        </ul>
      </nav>


    <script>
      jQuery(document).ready(function($){
        $('#mymodal').on('show.bs.modal',function(e){
          var button = $(e.relatedTarget);
          var modal =$(this);

          modal.find('.modal-body').load(button.data('remote'));
          modal.find('.modal-title').html(button.data('title'));
        });
      });
    </script>
    <div class="modal" id="mymodal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            
          </div>
          <div class="modal-body">
            <i class="fas fa-spiner fa-spin"></i>
          </div>
        </div>
      </div>
    </div>