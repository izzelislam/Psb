@extends('front.dashboard.pages.app')

@section('title','informasi')

@section('content')
<div class="row">
  <div class="col">
    <div class="row">
      <div class="card-body">
         <div class="col-md-10 col-sm-12">
            <div class="card mb-3">
              <img src="{{ Storage::url($jadwal->gambar) }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $jadwal->title }}</h5>
                <p class="card-text">{!! $jadwal->isi !!}</p>
                <p class="card-text"><small class="text-muted">{{ $jadwal->created_at->format('Y-m-d') }}</small></p>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection