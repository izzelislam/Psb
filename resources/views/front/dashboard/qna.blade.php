@extends('front.dashboard.pages.app')

@section('title','Profile')

@section('content')
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <div class="accordion" id="accordionExample">
            @if ($qna->count() > 0)
                @foreach ($qna as $index=>$item)
                <div class="card card-accordion">
                  <div class="card-header" id="headingOne">
                      <button
                        class="btn btn-link btn-block text-left"
                        type="button"
                        data-toggle="collapse"
                        data-target="#collapse{{ $item->id }}"
                        aria-expanded="true"
                        aria-controls="collapse{{ $item->id }}"
                      >
                        <p style="font-size: 12pt;">{{ $item->pertanyaan }}</p>
                      </button>
                  </div>

                  <div
                    id="collapse{{ $item->id }}"
                    class="collapse {{ $index == 0 ? 'show' : '' }}"
                    aria-labelledby="headingOne"
                    data-parent="#accordionExample"
                  >
                    <div class="card-body">
                      {{$item->jawaban}}
                    </div>
                  </div>
                </div>
                @endforeach
            @else
                <small>tidak ada data yang di tampilkan</small>
            @endif
        </div>  
      </div>
    </div>
  </div>
</div>
@endsection