@php

function check($param){
    $arr = explode(' ', $param);
    if (in_array('<iframe', $arr)){
      return null;
    }else {
      return $param;
    }
  }
  
@endphp


@extends('front.main.pages.app')
@section('title','Question & Answer')
@section('content')
    <div class="container py-5">
      <div class="my-4 title">
        <h5><strong>Informasi</strong></h5>
        <div class="row">
          <div class="col-md-10 mt-3">
           @if (isset($jadwal))
               @foreach ($jadwal as $item)
                <a href="{{ route('informasi-detail', $item->id) }}" class="text-decoration-none text-dark">
                  <div class="card mb-3 shadow">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="{{ Storage::url($item->gambar) }}" class="card-img" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{{ $item->title }}</h5>
                          <p class="card-text">{!! \Illuminate\Support\Str::limit($item->isi,100, $end='.' ) !!}</p>
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
@endsection

