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
            <div class="card text-left overflow-auto h-50">
              <div class="card-body mb-1">
                <div class="card text-left">
                  <div class="card-body">
                    <div class="soal">
                      <div class="row">
                        <div class="col">
                          <p>
                            <b class="title">1</b>. Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="jawaban">
                      <div class="row">
                        <div class="col">
                          <!-- jawaban 1 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >Lorem ipsum dolor sit amet, consectetur
                              adipiscing elit, sed do eiusmod tempor incididunt
                              ut labore et
                            </label>
                          </div>
                          <!-- jawaban 2 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >dolore magna aliqua. Ut enim ad minim veniam,
                              quis nostrud
                            </label>
                          </div>
                          <!-- jawaban 3 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >Duis aute irure dolor in reprehenderit in
                              voluptate velit esse cillum dolore</label
                            >
                          </div>
                          <!-- jawaban 4 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >Toggle this custom radio</label
                            >
                          </div>
                          <!-- jawaban 5 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >fugiat nulla pariatur. Excepteur sint occaecat
                              cupidatat non proident, sunt in culpa qui officia
                              deserunt mollit</label
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body mb-1">
                <div class="card text-left">
                  <div class="card-body mb-3">
                    <div class="soal">
                      <div class="row">
                        <div class="col">
                          <p>
                            <b class="title">2</b>. Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="jawaban">
                      <div class="row">
                        <div class="col">
                          <!-- jawaban 1 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >Lorem ipsum dolor sit amet, consectetur
                              adipiscing elit, sed do eiusmod tempor incididunt
                              ut labore et
                            </label>
                          </div>
                          <!-- jawaban 2 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >dolore magna aliqua. Ut enim ad minim veniam,
                              quis nostrud
                            </label>
                          </div>
                          <!-- jawaban 3 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >Duis aute irure dolor in reprehenderit in
                              voluptate velit esse cillum dolore</label
                            >
                          </div>
                          <!-- jawaban 4 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >Toggle this custom radio</label
                            >
                          </div>
                          <!-- jawaban 5 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >fugiat nulla pariatur. Excepteur sint occaecat
                              cupidatat non proident, sunt in culpa qui officia
                              deserunt mollit</label
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body mb-1">
                <div class="card text-left">
                  <div class="card-body">
                    <div class="soal">
                      <div class="row">
                        <div class="col">
                          <p>
                            <b class="title">1</b>. Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="jawaban">
                      <div class="row">
                        <div class="col">
                          <!-- jawaban 1 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >Lorem ipsum dolor sit amet, consectetur
                              adipiscing elit, sed do eiusmod tempor incididunt
                              ut labore et
                            </label>
                          </div>
                          <!-- jawaban 2 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >dolore magna aliqua. Ut enim ad minim veniam,
                              quis nostrud
                            </label>
                          </div>
                          <!-- jawaban 3 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >Duis aute irure dolor in reprehenderit in
                              voluptate velit esse cillum dolore</label
                            >
                          </div>
                          <!-- jawaban 4 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >Toggle this custom radio</label
                            >
                          </div>
                          <!-- jawaban 5 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >fugiat nulla pariatur. Excepteur sint occaecat
                              cupidatat non proident, sunt in culpa qui officia
                              deserunt mollit</label
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body mb-1">
                <div class="card text-left">
                  <div class="card-body mb-3">
                    <div class="soal">
                      <div class="row">
                        <div class="col">
                          <p>
                            <b class="title">2</b>. Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="jawaban">
                      <div class="row">
                        <div class="col">
                          <!-- jawaban 1 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >Lorem ipsum dolor sit amet, consectetur
                              adipiscing elit, sed do eiusmod tempor incididunt
                              ut labore et
                            </label>
                          </div>
                          <!-- jawaban 2 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >dolore magna aliqua. Ut enim ad minim veniam,
                              quis nostrud
                            </label>
                          </div>
                          <!-- jawaban 3 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >Duis aute irure dolor in reprehenderit in
                              voluptate velit esse cillum dolore</label
                            >
                          </div>
                          <!-- jawaban 4 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >Toggle this custom radio</label
                            >
                          </div>
                          <!-- jawaban 5 -->
                          <div
                            class="custom-control custom-radio custom-control-inline my-2"
                          >
                            <input
                              type="radio"
                              id="customRadioInline1"
                              name="customRadioInline1"
                              class="custom-control-input"
                            />
                            <label
                              class="custom-control-label"
                              for="customRadioInline1"
                              >fugiat nulla pariatur. Excepteur sint occaecat
                              cupidatat non proident, sunt in culpa qui officia
                              deserunt mollit</label
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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