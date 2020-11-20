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
                    <label for="">Orang Tua<b>*</b></label>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="exampleRadios"
                        id="exampleRadios1"
                        value="option1"
                      />
                      <label class="form-check-label" for="exampleRadios1">
                        Lengkap
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
                        Bapak
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
                        Ibu
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
                        Yatim Piatu
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Ayah<b>*</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      name="last_education"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"
                      >Pekerjaan Ayah<b>*</b></label
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
                    <label for="exampleInputPassword1">Nama Ibu<b>*</b></label>
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
                      >Pekerjaan Ibu<b>*</b></label
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
                      >Total Penghasilan Orang Tua Perbulan<b>*</b></label
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
                    <label for="exampleInputPassword1">Anak Ke ?<b>*</b></label>
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
                      >Jumlah Saudara ?<b>*</b></label
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
                      >Nomor Kontak Orang Tua Wali ?<b>*</b></label
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
                      >Tambah Keterangan Jika Ada<b>*</b></label
                    >
                    <textarea
                      type="text"
                      class="form-control"
                      id="exampleInputPassword1"
                      name="school_end"
                      required
                    ></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Izin Orang Tua Atau TIdak ?<b>*</b></label>
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
                    <label for="">Punya Laptop Atau Tidak ?<b>*</b></label>
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
                  <div class="form-group mt-4">
                    <label for=""
                      >Demi Allah , Saya Bersumpah Semua Informasi Ini Benar
                      <b>*</b></label
                    >
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        value=""
                        id="defaultCheck1"
                      />
                      <label class="form-check-label" for="defaultCheck1">
                        Semua Informasi Ini Adalah Benar
                      </label>
                    </div>
                  </div>
                  <div class="my-5">
                    <b>*</b>
                    <small
                      >Periksa sekali lagi bahwa data yang anda masukkan sudah
                      benar dan sesuai, Setelah anda mengirim data tersebut anda
                      tidak bisa lagi melakukan perubahan terhadap data yang
                      anda kirim .</small
                    >
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
                      Kirim Data
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