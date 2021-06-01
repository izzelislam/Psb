@extends('front.main.pages.app')
@section('title','Question & Answer')
@section('content')
    <div class="container py-5">
      <div class="my-4 title">
        {{-- @php
            dd($jadwal->gambar)
        @endphp --}}
        <div class="row">
          <div class="col-md-10 mt-3">
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
@endsection