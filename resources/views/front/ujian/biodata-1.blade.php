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
                    class="btn btn-primary btn-circle"
                    >1</a
                  >
                  <p>Step 1</p>
                </div>
                <div class="stepwizard-step">
                  <a
                    href="#step-2"
                    type="button"
                    class="btn btn-daftar btn-circle"
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
            <h5><strong>Tes Tahap Pertama</strong></h5>
            <p class="card-text">Silahkan isi form dibawah ini</p>
            <div class="card text-left">
              <div class="card-body">
                <form method="POST" action="{{ route('tahap-pertama-store') }}" class="needs-validation" novalidate="">
                  @csrf
                  <div class="form-group">
                    <label for="nama">Nama <b>*</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="nama"
                      name="nama"
                      aria-describedby="emailHelp"
                      required
                    />
                    <div class="invalid-feedback">
                      masukkan nama lengkap sesuai ijazah
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="umur">Umur<b>*</b></label>
                    <input
                      type="number"
                      name="umur"
                      class="form-control"
                      id="umur"
                      required
                    />
                    <div class="invalid-feedback">
                      masukkan umur anda dengan angka !. contoh : 20
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="no_wa"
                      >No WhatsApp<b>*</b></label
                    >
                    <input
                      type="text"
                      name="no_wa"
                      class="form-control"
                      id="no_wa"
                      required
                    />
                    <small id="emailHelp" class="form-text text-muted"
                      >Wajib mengunakan No Whatsapp karena info selanjutnya
                      melalui Whatsapp.</small
                    >
                    <div class="invalid-feedback">
                      masukkan no WhatsApp
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Kondisi Keluarga <b>*</b></label>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="keluarga"
                        id="kurang-mampu"
                        value="tidak-mampu"
                        required
                        
                      />
                      <label class="form-check-label" for="kurang-mampu">
                        Kurang Mampu
                      </label>
                      <div class="invalid-feedback">
                        wajib di isi
                      </div>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="keluarga"
                        id="mampu"
                        value="mampu"
                        required
                      />
                      <label class="form-check-label" for="mampu">
                        Mampu
                      </label>
                      <div class="invalid-feedback">
                        wajib di isi
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="jenis-kelamin"
                      >Jenis Kelamin, Wanita Belum Diterima <b>*</b></label
                    >
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="jenis_kelamin"
                        id="jenis_kelamin"
                        value="laki-laki"
                        required
                        
                      />
                      <label class="form-check-label" for="jeniskelamin">
                        Laki-Laki
                      </label>
                      <div class="invalid-feedback">
                        jenis kelamin harus di isi
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary float-right px-3">
                    Submit
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection