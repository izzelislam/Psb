@extends('front.ujian.app')

@section('title','Tes Tahap Pertama')
    
@section('content')
    <div class="container py-5">
      <div class="my-4">
        <div class="row justify-content-center px-4">
          <div class="col-md-10 col-sm-12 title">
            <h5>
              <strong> <i class="fa fa-link ico"></i> Link Video</strong>
            </h5>
            <p class="card-text">
              Silahkan kirim Link Video Melalui Form Dibawah Ini !
            </p>
            <div class="card text-left overflow-auto">
              <div class="card-body">
                <form method="POST" action="{{ route('tahap-empat-video.store') }}">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Link Video <b>*</b> </label>
                    <input
                      type="twxt"
                      required
                      class="form-control"
                      id="exampleInputEmail1"
                      aria-describedby="emailHelp"
                      name="link"
                    />
                  </div>
                </div>
                <div>
                  <button class="btn btn-primary mx-3 float-right mb-3">
                    Kirim
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection