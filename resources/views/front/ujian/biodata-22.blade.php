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
                <form class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Hobi<b>*</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      name="last_education"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Cita-Cita<b>*</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      name="school_end"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"
                      >Skill/Kelebihan<b>*</b></label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      name="school_end"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"
                      >Jumlah Hafalan Al Qur'an<b>*</b></label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      name="school_end"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"
                      >Tokoh Idola<b>*</b></label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      name="school_end"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"
                      >Tokoh/Ulama Yang Disukai ?<b>*</b></label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      name="school_end"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"
                      >Dimana Allah ?<b>*</b></label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      name="school_end"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"
                      >Pengajian Yang Sering Dihadiri ?<b>*</b></label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      name="school_end"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"
                      >Buku Bacaan Yang Disukai?<b>*</b></label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      name="school_end"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="">Merokok Atau Tidak ? <b>*</b></label>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="exampleRadios"
                        id="exampleRadios1"
                        value="option1"
                        checked
                      />
                      <label class="form-check-label" for="exampleRadios1">
                        Iya
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="exampleRadios"
                        id="exampleRadios1"
                        value="option1"
                      />
                      <label class="form-check-label" for="exampleRadios1">
                        Tidak
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Punya Pacar Atau Tidak ?<b>*</b></label>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="exampleRadios"
                        id="exampleRadios1"
                        value="option1"
                        checked
                      />
                      <label class="form-check-label" for="exampleRadios1">
                        Punya
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="exampleRadios"
                        id="exampleRadios1"
                        value="option1"
                      />
                      <label class="form-check-label" for="exampleRadios1">
                        Tidak
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Suka Game Atau Tidak? <b>*</b></label>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="exampleRadios"
                        id="exampleRadios1"
                        value="option1"
                        checked
                      />
                      <label class="form-check-label" for="exampleRadios1">
                        Kurang Mampu
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="exampleRadios"
                        id="exampleRadios1"
                        value="option1"
                      />
                      <label class="form-check-label" for="exampleRadios1">
                        Mampu
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"
                      >Nama Game Kesukaan</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      name="school_end"
                      required
                    />
                    <small>Tidak di isi jika tidak suka game</small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"
                      >Berapa Jam Yang Dihabiskan Untuk Main game</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      name="school_end"
                      required
                    />
                    <small>Tidak di isi jika tidak suka game</small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"
                      >Alasan Mendaftar <b>*</b></label
                    >
                    <textarea name="" id="" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"
                      >Ceritakan Kegiatan Anda Dari Pagi Sampai Malam
                      <b>*</b></label
                    >
                    <textarea name="" id="" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"
                      >Ceritakan Dengan Singkat Kepribadian Anda <b>*</b></label
                    >
                    <textarea name="" id="" class="form-control" rows="4"></textarea>
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