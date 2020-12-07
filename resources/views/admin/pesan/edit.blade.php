@include('admin.layouts.style')
<div class="row">
  <div class="col px-0" >
    <div class="px-4 py-5 chat-box bg-white overflow-auto">
      @foreach ($pesan as $item)
        <!-- Sender Message-->
        @if ($item->users_id != Auth::user()->id)
          <div class="media w-50 mb-3"><img src="{{ Avatar::create($item->user->name)->toGravatar(['d' => 'wavatar', 'r' => 'pg', 's' => 100])}}" alt="user" width="50" class="rounded-circle">
            <div class="media-body ml-3">
              <div class="bg-light rounded py-2 px-3 mb-2">
                <p class="text-small mb-0 text-muted">{{ $item->pesan }}</p>
              </div>
              <p class="small text-muted">{{ $item->created_at->format('H:i:s A') }} | {{ $item->created_at->format('M d') }}</p>
            </div>
          </div>    
        @elseif($item->users_id = Auth::user()->id)
          <!-- Reciever Message-->
          <div class="media w-50 ml-auto mb-3">
            <div class="media-body mr-3">
              <div class="bg-primary rounded py-2 px-3 mb-2">
                <p class="text-small mb-0 text-white">{{ $item->pesan }}</p>
              </div>
              <p class="small text-muted">{{ $item->created_at->format('H:i:s A') }} | {{ $item->created_at->format('M d') }}</p>
            </div>
            <img src="{{ Avatar::create($item->user->name)->toGravatar(['d' => 'wavatar', 'r' => 'pg', 's' => 100])}}" alt="user" width="50" class="rounded-circle">
          </div>
        @endif   
      @endforeach
  
    </div>
    
    <!-- Typing area -->
    <form action="{{ route('chat-admin.store') }}" method="POST" class="bg-light">
      @csrf
      <input type="hidden" value="{{ $pesan->first()->teman_id }}" name="teman_id">
      <div class="input-group">
        <input type="text" name="pesan" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
        <div class="input-group-append">
          <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
        </div>
      </div>
    </form>
  
  </div>
</div>