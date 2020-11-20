@extends('front.main.pages.app')
@section('title','Question & Answer')
@section('content')
    <div class="container py-5">
      <div class="my-4 title">
        <h5><strong>Question And Answer</strong></h5>
      </div>
      <div class="accordion" id="accordionExample">
        @foreach ($qna as $index=>$item)
            <div class="card card-accordion">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button
                class="btn btn-link btn-block text-left"
                type="button"
                data-toggle="collapse"
                data-target="#collapse{{ $item->id }}"
                aria-expanded="true"
                aria-controls="collapse{{ $item->id }}"
              >
                {{ $item->pertanyaan }}
              </button>
            </h2>
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
      </div>
    </div>
@endsection