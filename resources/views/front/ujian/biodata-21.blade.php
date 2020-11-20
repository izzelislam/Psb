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
                    class="btn btn-primary btn-circle"
                    disabled="disabled"
                    >2</a
                  >
                  <p>Step 2</p>
                </div>
                <div class="stepwizard-step">
                  <a
                    href="#step-3"
                    type="button"
                    class="btn btn-default btn-circle"
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
            <h5><strong>Tes Tahap Kedua</strong></h5>
            <p class="card-text">Silahkan isi form dibawah ini</p>
            <div class="card text-left">
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Facebook<b>*</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      name="facebook"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Instagram<b>*</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      name="instagram"
                      required
                    />
                  </div>
                  <div class="mt-4">
                    <button
                      type="submit"
                      class="btn btn-primary float-left px-3"
                    >
                      Sebelumnya
                    </button>
                    <button
                      type="submit"
                      class="btn btn-primary float-right px-3"
                    >
                      Selanjutnya
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection