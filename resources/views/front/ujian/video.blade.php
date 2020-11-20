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
                    class="btn btn-success btn-circle"
                    disabled="disabled"
                    >3</a
                  >
                  <p>Step 3</p>
                </div>
                <div class="stepwizard-step">
                  <a
                    href="#step-3"
                    type="button"
                    class="btn btn-primary btn-circle"
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
              <strong> <i class="fa fa-link ico"></i> Link Video</strong>
            </h5>
            <p class="card-text">
              Silahkan kirim Link Video Melalui Form Dibawah Ini !
            </p>
            <div class="card text-left overflow-auto">
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Link Video <b>*</b> </label>
                    <input
                      type="email"
                      class="form-control"
                      id="exampleInputEmail1"
                      aria-describedby="emailHelp"
                    />
                  </div>
                </form>
              </div>
              <div>
                <button class="btn btn-primary mx-3 float-right mb-3">
                  Selanjutnya
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection