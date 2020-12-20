@extends('front.dashboard.pages.app')

@section('title','Pesan')
@push('end-style')
     <link rel="stylesheet" href="{{ asset('front/style/style.css') }}" />
@endpush

@section('content')
<div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="row my-2 social">
            <div class="col">
              <div class="container">
                <!-- For demo purpose-->
                <div class="row rounded-lg overflow-hidden shadow">
                  <!-- Chat Box-->
                  <div class="col px-0">
                    <div class="px-4 py-5 chat-box bg-white overflow-auto">
                      <!-- Sender Message-->
                      @if (isset($pesan))
                        @foreach ($pesan as $index=>$item)
                          @if ( $item->users_id != Auth::user()->id )
                              <div class="media w-50 mb-3"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                                <div class="media-body ml-3">
                                  <div class="bg-light rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-muted">{{ $item->pesan }}</p>
                                  </div>
                                  <p class="small text-muted">{{ $item->created_at->format('H:i:s A') }} | {{ $item->created_at->format('M d') }}</p>
                                </div>
                              </div>
                          @elseif( $item->users_id == Auth::user()->id )
                              <!-- Reciever Message-->
                              <div class="media w-50 ml-auto mb-3">
                                <div class="media-body">
                                  <div class="bg-primary rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-white">{{ $item->pesan }}</p>
                                  </div>
                                  <p class="small text-muted">{{ $item->created_at->format('H:i:s A') }} | {{ $item->created_at->format('M d') }}</p>
                                </div>
                              </div>
                            @endif    
                        @endforeach
                      @else
                        <div class="text-center pt-3 text-primary">           
                            <p class="mt-5 pt-5"><strong> <i class="fas fa-envelope-open my-3" style="font-size: 6em;"></i><br> 
                              Belum ada pesan yang terkirim <br> silahkan kirim pesan</strong></p>
                        </div>
                      @endif
                    </div>
                    <!-- Typing area -->
                    <form action="{{ route('chat-user.store') }}" class="bg-light" method="POST">
                      @csrf
                      <div class="input-group">
                        <input type="text" name="pesan" placeholder="Tulis pesan anda." aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                        <div class="input-group-append">
                          <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane text-primary"></i></button>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
              <!-- end chat -->
            </div>
          </div>
        </div>
</div>
@endsection