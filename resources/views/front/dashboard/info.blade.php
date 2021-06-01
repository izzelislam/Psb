@extends('front.dashboard.pages.app')

@section('title','informasi')

@section('content')
<div class="row">
  <div class="col">
    <div class="row">
      <div class="card-body">
         <div class="col-md-10 col-12">
           @if (isset($jadwal))
               @foreach ($jadwal as $item)
                <a href="{{ route('informasi-detail-user', $item->id) }}" class="text-decoration-none " style="color:#707070;">
                  <div class="card mb-3 shadow-sm">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="{{ Storage::url($item->gambar) }}" class="card-img" alt="...">
                      </div>
                      <div class="col-md-8 col-12">
                        <div class="card-body">
                          <h5 class="card-title">{{ $item->title }}</h5>
                          <p class="card-text">{{ \Illuminate\Support\Str::limit($item->isi,100, $end='.' ) }}</p>
                          <p class="card-text"><small class="text-muted">{{ $item->created_at->format('Y-m-d') }}</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
            @endforeach
           @endif
          </div>
      </div>
    </div>
  </div>
</div>
@endsection