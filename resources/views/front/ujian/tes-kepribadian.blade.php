@extends('front.ujian.app')

@section('title','Tes Tahap Pertama')
    
@section('content')
    <div class="container py-5">
      <div class="my-4">
        <div class="row justify-content-center px-4">
          <div class="col-md-10 col-sm-12 title">
            <!-- step wizard -->
            <div class="stepwizard mb-5">
              <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                  <a
                    href="#step-1"
                    type="button"
                    class="btn btn-success btn-circle"
                    >1</a
                  >
                  <p>Step 1</p>
                </div>
                <div class="stepwizard-step">
                  <a
                    href="#step-2"
                    type="button"
                    class="btn btn-success btn-circle"
                    disabled="disabled"
                    >2</a
                  >
                  <p>Step 2</p>
                </div>
                <div class="stepwizard-step">
                  <a
                    href="#step-3"
                    type="button"
                    class="btn btn-primary btn-circle"
                    disabled="disabled"
                    >3</a
                  >
                  <p>Step 3</p>
                </div>
                <div class="stepwizard-step">
                  <a
                    href="#step-3"
                    type="button"
                    class="btn btn-default btn-circle"
                    disabled="disabled"
                    >4</a
                  >
                  <p>Step 4</p>
                </div>
                <div class="stepwizard-step">
                  <a
                    href="#step-3"
                    type="button"
                    class="btn btn-default btn-circle"
                    disabled="disabled"
                    >5</a
                  >
                  <p>Step 5</p>
                </div>
              </div>
            </div>
            <!-- end step wizard -->
            <h5>
              <strong>
                <i class="fa fa-microchip ico"></i> Tes Kepribadian</strong
              >
            </h5>
            <p class="card-text">Silahkan Jawab Soal-Soal Dibawah Ini !</p>
            <div class="card text-left ">
              <form action="{{ route('kepribadian-store') }}" method="POST">
                @csrf
                <div x-data="soal()">
                    {{-- page 1--}}
                    <div x-show="soal_1">
                      @foreach ($kepribadian[0] as $index=>$item)
                        <div class="card-body mb-1">
                          <div class="card text-left">
                            <div class="card-body">
                              <div class="soal">
                                <div class="row">
                                  <div class="col">
                                    <p>
                                      <b class="title">{{ $index+1 }}</b>
                                      <br>
                                      {{ $item->soal }}
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="jawaban">
                                <div class="row">
                                  <div class="col">
                                    <!-- jawaban 1 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}a"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="a"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}a"
                                        > <strong>A .</strong> {{ $item->a }}  
                                      </label>
                                    </div>
                                    <!-- jawaban 2 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}b"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="b"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}b"
                                        ><strong>B .</strong>{{ $item->b }}
                                      </label>
                                    </div>
                                    <!-- jawaban 3 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}c"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="c"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}c"
                                        ><strong>C .</strong>
                                          {{ $item->c }}  
                                      </label>
                                    </div>
                                    <!-- jawaban 4 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}d"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="d"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}d"
                                        ><strong>D .</strong>
                                        {{ $item->e }}
                                      </label>
                                    </div>
                                    <!-- jawaban 5 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}e"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="e"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}e"
                                        ><strong>E .</strong>
                                        {{ $item->e }}  
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                      <div class="pb-3 m-5 ">
                        <button
                          type="button"
                          class="btn btn-primary float-right px-3"
                          x-on:click="soal1()"
                        >
                          Selanjutnya
                        </button>
                      </div>
                    </div>
                    {{-- page 2 --}}
                    <div x-show="soal_2">
                      @foreach ($kepribadian[1] as $index=>$item)
                        <div class="card-body mb-1">
                          <div class="card text-left">
                            <div class="card-body">
                              <div class="soal">
                                <div class="row">
                                  <div class="col">
                                    <p>
                                      <b class="title">{{ $index+1 }}</b>
                                      {{ $item->soal }}
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="jawaban">
                                <div class="row">
                                  <div class="col">
                                    <!-- jawaban 1 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}a"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="a"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}a"
                                        > <strong>A .</strong> {{ $item->a }}  
                                      </label>
                                    </div>
                                    <!-- jawaban 2 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}b"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="b"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}b"
                                        ><strong>B .</strong>{{ $item->b }}
                                      </label>
                                    </div>
                                    <!-- jawaban 3 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}c"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="c"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}c"
                                        ><strong>C .</strong>
                                          {{ $item->c }}  
                                      </label>
                                    </div>
                                    <!-- jawaban 4 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}d"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="d"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}d"
                                        ><strong>D .</strong>
                                        {{ $item->e }}
                                      </label>
                                    </div>
                                    <!-- jawaban 5 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}e"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="e"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}e"
                                        ><strong>E .</strong>
                                        {{ $item->e }}  
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                      <div class="pb-3 m-5">
                        <button
                          type="button"
                          class="btn btn-primary float-left px-3"
                          x-on:click="soal2back()"
                        >
                          Sebelumnya
                        </button>
                        <button
                          type="button"
                          class="btn btn-primary float-right px-3"
                          x-on:click="soal2()"
                        >
                          Selanjutnya
                        </button>
                      </div>
                    </div>
                    {{-- page 3 --}}
                    <div x-show="soal_3">
                      @foreach ($kepribadian[2] as $index=>$item)
                        <div class="card-body mb-1">
                          <div class="card text-left">
                            <div class="card-body">
                              <div class="soal">
                                <div class="row">
                                  <div class="col">
                                    <p>
                                      <b class="title">{{ $index+1 }}</b>
                                      {{ $item->soal }}
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="jawaban">
                                <div class="row">
                                  <div class="col">
                                    <!-- jawaban 1 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}a"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="a"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}a"
                                        > <strong>A .</strong> {{ $item->a }}  
                                      </label>
                                    </div>
                                    <!-- jawaban 2 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}b"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="b"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}b"
                                        ><strong>B .</strong>{{ $item->b }}
                                      </label>
                                    </div>
                                    <!-- jawaban 3 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}c"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="c"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}c"
                                        ><strong>C .</strong>
                                          {{ $item->c }}  
                                      </label>
                                    </div>
                                    <!-- jawaban 4 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}d"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="d"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}d"
                                        ><strong>D .</strong>
                                        {{ $item->e }}
                                      </label>
                                    </div>
                                    <!-- jawaban 5 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}e"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="e"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}e"
                                        ><strong>E .</strong>
                                        {{ $item->e }}  
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                      <div class="pb-3 m-5">
                        <button
                          type="button"
                          class="btn btn-primary float-left px-3"
                          x-on:click="soal3back()"
                        >
                          Sebelumnya
                        </button>
                        <button
                          type="button"
                          class="btn btn-primary float-right px-3"
                          x-on:click="soal3()"
                        >
                          Selanjutnya
                        </button>
                      </div>
                    </div>
                    {{-- page 4 --}}
                    <div x-show="soal_4">
                      @foreach ($kepribadian[3] as $index=>$item)
                        <div class="card-body mb-1">
                          <div class="card text-left">
                            <div class="card-body">
                              <div class="soal">
                                <div class="row">
                                  <div class="col">
                                    <p>
                                      <b class="title">{{ $index+1 }}</b>
                                      {{ $item->soal }}
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="jawaban">
                                <div class="row">
                                  <div class="col">
                                    <!-- jawaban 1 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}a"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="a"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}a"
                                        > <strong>A .</strong> {{ $item->a }}  
                                      </label>
                                    </div>
                                    <!-- jawaban 2 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}b"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="b"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}b"
                                        ><strong>B .</strong>{{ $item->b }}
                                      </label>
                                    </div>
                                    <!-- jawaban 3 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}c"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="c"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}c"
                                        ><strong>C .</strong>
                                          {{ $item->c }}  
                                      </label>
                                    </div>
                                    <!-- jawaban 4 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}d"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="d"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}d"
                                        ><strong>D .</strong>
                                        {{ $item->e }}
                                      </label>
                                    </div>
                                    <!-- jawaban 5 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}e"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="e"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}e"
                                        ><strong>E .</strong>
                                        {{ $item->e }}  
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                      <div class="pb-3 m-5">
                        <button
                          type="button"
                          class="btn btn-primary float-left px-3"
                          x-on:click="soal4back()"
                        >
                          Sebelumnya
                        </button>
                        <button
                          type="button"
                          class="btn btn-primary float-right px-3"
                          x-on:click="soal4()"
                        >
                          Selanjutnya
                        </button>
                      </div>
                    </div>
                    {{-- page 5 --}}
                    <div x-show="soal_5">
                      @foreach ($kepribadian[4] as $index=>$item)
                        <div class="card-body mb-1">
                          <div class="card text-left">
                            <div class="card-body">
                              <div class="soal">
                                <div class="row">
                                  <div class="col">
                                    <p>
                                      <b class="title">{{ $index+1 }}</b>
                                      {{ $item->soal }}
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="jawaban">
                                <div class="row">
                                  <div class="col">
                                    <!-- jawaban 1 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}a"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="a"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}a"
                                        > <strong>A .</strong> {{ $item->a }}  
                                      </label>
                                    </div>
                                    <!-- jawaban 2 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}b"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="b"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}b"
                                        ><strong>B .</strong>{{ $item->b }}
                                      </label>
                                    </div>
                                    <!-- jawaban 3 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}c"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="c"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}c"
                                        ><strong>C .</strong>
                                          {{ $item->c }}  
                                      </label>
                                    </div>
                                    <!-- jawaban 4 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}d"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="d"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}d"
                                        ><strong>D .</strong>
                                        {{ $item->e }}
                                      </label>
                                    </div>
                                    <!-- jawaban 5 -->
                                    <div
                                      class="custom-control custom-radio d-block custom-control-inline my-2"
                                    >
                                      <input
                                        type="radio"
                                        id="pilihan{{ $item->id }}e"
                                        name="pilihan[{{ $item->id }}]"
                                        class="custom-control-input"
                                        value="e"
                                      />
                                      <label
                                        class="custom-control-label"
                                        for="pilihan{{ $item->id }}e"
                                        ><strong>E .</strong>
                                        {{ $item->e }}  
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                      <div class="pb-3 m-5">
                        <button
                          type="button"
                          class="btn btn-primary float-left px-3"
                          x-on:click="soal5back()"
                        >
                          Sebelumnya
                        </button>
                        <button
                          type="submit"
                          class="btn btn-primary float-right px-3"
                        >
                          Selesai
                        </button>
                      </div>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@push('end-script')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

<script>
  function soal(){
    return{
      // data
      soal_1:true,
      soal_2:false,
      soal_3:false,
      soal_4:false,
      soal_5:false,
      // method
      soal1(){
        this.soal_1=false;
        this.soal_2=true;
      },
      soal2back(){
        this.soal_1=true;
        this.soal_2=false;
      },
      soal2(){
        this.soal_1=false;
        this.soal_2=false;
        this.soal_3=true;
      },
      soal3back(){
        this.soal_1=false;
        this.soal_2=true;
        this.soal_3=false;
      },
      soal3(){
        this.soal_1=false;
        this.soal_2=false;
        this.soal_3=false;
        this.soal_4=true;
      },
      soal4back(){
        this.soal_1=false;
        this.soal_2=false;
        this.soal_3=true;
        this.soal_4=false;
      },
      soal4(){
        this.soal_1=false;
        this.soal_2=false;
        this.soal_3=false;
        this.soal_4=false;
        this.soal_5=true;
      },
      soal5back(){
        this.soal_1=false;
        this.soal_2=false;
        this.soal_3=false;
        this.soal_4=true;
        this.soal_5=false;
      }
    }
  }
</script>
@endpush