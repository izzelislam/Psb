@extends('admin.pages.app')

@section('title','Edit Biodata Pendaftar')

@section('title-page','Edit Biodata Pendaftar')

@section('bread-crumb')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Edit Biodata Pendaftar</a></div>
    </div>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    {{-- feedback message --}}
    @if (session('hapus'))
        @if (session('hapus'))
            <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                {{ session('hapus') }}
            </div>
            </div>
        @endif
    @endif

    <div class="card">
      <div class="card-header">
        <h4>Edit Biodata Pendaftar</h4>
      </div>
      <div class="card-body">
        <form x-data="formdata()" method="POST" action="{{ route('status-pendaftar.update',$id=$biodata2->id) }}">
          @csrf
          @method('PUT')
          {{-- colom pertama --}}
          <input type="hidden" name="biodata1_id" value="{{ $biodata2->user->biodata1->id }}">
          <div class="row">
            <div class="col-md-5">
              
              {{-- nama --}}
              <div class="form-ggroup mb-3">
                <label for="">Nama</label>
                <input
                    type="text"
                    class="form-control"
                    id="nama"
                    name="nama"
                    value="{{ $biodata2->user->biodata1->nama }}"
                    required
                />
              </div>
              {{-- umur --}}
              <div class="form-group mb-3">
                <label for="">Umur</label>
                <input
                  type="number"
                  class="form-control"
                  value="{{ $biodata2->user->biodata1->umur }}"
                  name="umur"
                  aria-describedby="emailHelp"
                  required
                />
              </div>
              {{-- tanggal lahit --}}
              <div class="form-group mb-3">
                <label for="">Tanggal Lahir</label>
                <input
                  type="date"
                  class="form-control"
                  value="{{ $biodata2->user->biodata1->tanggal_lahir }}"
                  name="tanggal_lahir"
                  aria-describedby="emailHelp"
                  required
                />
              </div>
              {{-- hobi --}}
              <div class="form-group mb-3">
                <label for="">Hobi</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->hobi }}"
                    name="hobi"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- skill --}}
              <div class="form-group mb-3">
                <label for="">Skill</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->skill }}"
                    name="skill"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- cita-cita --}}
              <div class="form-group mb-3">
                <label for="">Cita Cita</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->cita_cita }}"
                    name="cita_cita"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- pendidikan terakhir --}}
              <div class="form-group mb-3">
                <label for="">Pendidikan Terakhir</label>
                <select name="pendidikan_terakhir" class="custom-select">
                  <option value="SD" {{ $biodata2->pendidikan_terakhir == 'SD' ? 'selected' :'' }}>SD SEDERAJAT</option>
                  <option value="SMP" {{ $biodata2->pendidikan_terakhir == 'SMP' ? 'selected' :'' }}>SMP SEDERAJAT</option>
                  <option value="SMA" {{ $biodata2->pendidikan_terakhir == 'SMA' ? 'selected' :'' }}>SMA SEDERAJAT</option>
                </select>
              </div>
              {{-- asal sekolah --}}
              <div class="form-group mb-3">
                <label for="">Asal Sekolah</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->asal_sekolah }}"
                    name="asal_sekolah"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- jurusan --}}
              <div class="form-group mb-3">
                <label for="">Jurusan</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->jurusan }}"
                    name="jurusan"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- prestasi --}}
              <div class="form-group mb-3">
                <label for="">Prestasi</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->prestasi }}"
                    name="prestasi"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- pengalaman organisasi --}}
              <div class="form-group mb-3">
                <label for="">Pengalaman Organisasi</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->pengalaman_organisasi }}"
                    name="pengalaman_organisasi"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              @php
                $provinsi=App\Models\IndonesiaProvince::all();
                //dd($biodata2->provinsi->name);
              @endphp
              {{-- provinsi --}}
              <div class="form-group mb-3">
                <label for="">Provinsi</label>
                <select name="indonesia_provinces_id" class="custom-select" x-on:change="getKabupaten(provin_id)" x-model="provin_id">
                    <option value="{{ $biodata2->indonesia_provinces_id }}">{{ $biodata2->provinsi->name }}</option>
                    @foreach ($provinsi as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
              </div>
              {{-- kabupaten --}}
              <div class="form-group mb-3">
                <select name="indonesia_cities_id" class="custom-select" >
                    <option value="{{ $biodata2->indonesia_cities_id }}">{{ $biodata2->kabupaten->name }}</option>
                    <template x-for="an in kabupatenids">
                        <option :value="an.id"><span x-html="an.name"></span></option>
                    </template>											
                </select>
              </div>
              {{-- alamat lengkap --}}
              <div class="form-group mb-3">
                <label for="">Alamat Lengkap</label>
                <input
                  type="text"
                  class="form-control"
                  value="{{ $biodata2->alamt_lengkap }}"
                  name="alamt_lengkap"
                  aria-describedby="emailHelp"
                  required
                />
              </div>
              {{-- no whatsapp --}}
              <div class="form-group mb-3">
                <label for="">No Whatsapp</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->user->biodata1->no_wa }}"
                    name="no_wa"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- facebook --}}
              <div class="form-group mb-3">
                <label for="">Facebook</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->facebook }}"
                    name="facebook"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- instagram --}}
              <div class="fomr-group mb-3">
                <label for="">Instagram</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->instagram }}"
                    name="instagram"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- orang tua --}}
              <div class="form-group mb-3">
                <label for="">Orang Tua</label>
                <select name="orang_tua" class="custom-select">
                    <option value="lengkap" {{ $biodata2->orang_tua == 'lengkap' ? 'selected' :'' }}>LENGKAP</option>
                    <option value="ayah" {{ $biodata2->orang_tua == 'ayah' ? 'selected' :'' }}>AYAH</option>
                    <option value="ibu" {{ $biodata2->orang_tua == 'ibu' ? 'selected' :'' }}>IBU</option>
                    <option value="yatim-piatu" {{ $biodata2->orang_tua == 'yatim-piatu' ? 'selected' :'' }}>YATIM-PIATU</option>
                </select>
              </div>
              {{-- nama ayah --}}
              <div class="form-group mb-3">
                <label for="">Nama Ayah</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->nama_ayah }}"
                    name="nama_ayah"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- nama ibu --}}
              <div class="form-group mb-3">
                <label for="">Nama Ibu</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->nama_ibu }}"
                    name="nama_ibu"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- pekerjaan Ayah --}}
              <div class="form-group mb-3">
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->pekerjaan_ayah }}"
                    name="pekerjaan_ayah"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- pekerjaan ibu --}}
              <div class="form-group mb-3">
                <label for="">Pekerjaan Ibu</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->pekerjaan_ibu }}"
                    name="pekerjaan_ibu"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- penghasilan orangtua --}}
              {{-- <div class="form-group mb-3">
                <label for="">Penghasilan orang TUa</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->penghasilan_ortu }}"
                    name="penghasilan_ortu"
                    aria-describedby="emailHelp"
                    required
                />
              </div> --}}
              {{-- jumlah saudara --}}
              {{-- <div class="form-group mb-3">
                <label for="">jumlah Saudara</label>
                <input
                    type="number"
                    class="form-control"
                    value="{{ $biodata2->saudara }}"
                    name="saudara"
                    aria-describedby="emailHelp"
                    required
                />
              </div> --}}
              {{-- anak ke --}}
              {{-- <div class="form-group mb-3">
                <label for="">Anak Ke</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->anak_ke }}"
                    name="anak_ke"
                    aria-describedby="emailHelp"
                    required
                />
              </div> --}}
              {{-- no hp wali --}}
              {{-- <div class="form-group mb-3">
                <label for="">No Hp Wali</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->no_wali }}"
                    name="no_wali"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
               --}}
            </div>
          
          {{-- colom kedua --}}
            <div class="col-md-5">
              {{-- kondisi keluarga --}}
              <div class="form-group mb-3">
                <label for="">Kondisi Keluarga</label>
                <span class="form-check d-inline mr-5">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="keluarga"
                        id="mampu"
                        value="mampu"
                        {{ $biodata2->user->biodata1->keluarga == 'mampu' ? 'checked' : '' }}
                        required
                    />
                    <label class="form-check-label" for="mampu">
                    mampu
                    </label>
                </span>
                <span class="form-check d-inline" >
                    <input
                        class="form-check-input"
                        type="radio"
                        name="keluarga"
                        id="tidak_mampu"
                        value="tidak-mampu"
                        required
                        {{ $biodata2->user->biodata1->keluarga != 'mampu' ? 'checked' : '' }}
                    />
                    <label class="form-check-label" for="tidak_mampu">
                    tidak-mampu
                    </label>
                </span>
              </div>
              {{-- penghasilan orangtua --}}
              <div class="form-group mb-3">
                <label for="">Penghasilan orang TUa</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->penghasilan_ortu }}"
                    name="penghasilan_ortu"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- jumlah saudara --}}
              <div class="form-group mb-3">
                <label for="">jumlah Saudara</label>
                <input
                    type="number"
                    class="form-control"
                    value="{{ $biodata2->saudara }}"
                    name="saudara"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- anak ke --}}
              <div class="form-group mb-3">
                <label for="">Anak Ke</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->anak_ke }}"
                    name="anak_ke"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- no hp wali --}}
              <div class="form-group mb-3">
                <label for="">No Hp Wali</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->no_wali }}"
                    name="no_wali"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- jumlah hafalan --}}
              <div class="form-group mb-3">
                <label for="">Jumlah Hafalan</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->jumlah_hafalan }}"
                    name="jumlah_hafalan"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- tokh idola --}}
              <div class="form-group mb-3">
                <label for="">Tokoh Idola</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->tokoh_idola }}"
                    name="tokoh_idola"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- ustad idola --}}
              <div class="form-group mb-3">
                <label for="">Ustadz Idola</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->ustadz_idola }}"
                    name="ustadz_idola"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- dimana Allah --}}
              <div class="form-group mb-3">
                <label for="">Dimana Allah</label>
                <textarea
                    class="form-control h-50"
                    name="tauhid"
                    aria-describedby="emailHelp"
                    required
                />
                  {{ $biodata2->tauhid }}
                </textarea>
              </div>
              {{-- Kajian Yang Sering Di Hadiri --}}
              <div class="form-group mb-3">
                <label for="">Kajian Yang Sering Di Hadiri</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->kajian }}"
                    name="kajian"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- Buku Bacaan Favorit --}}
              <div class="form-group mb-3">
                <label for="">Buku Bacaan Favorit</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $biodata2->buku }}"
                    name="buku"
                    aria-describedby="emailHelp"
                    required
                />
              </div>
              {{-- perokok --}}
              <div class="form-group mb-3">
                <label for="" class="d-block">Perokok</label>
                <span class="form-check d-inline mr-5">
                  <input
                      class="form-check-input"
                      type="radio"
                      name="perokok"
                      id="perokok_iya"
                      value="iya"
                      {{ $biodata2->perokok == 'iya' ? 'checked' :'' }}
                      required
                  />
                  <label class="form-check-label" for="perokok_iya">
                   Iya
                  </label>
                </span>
                <span class="form-check d-inline" >
                  <input
                      class="form-check-input"
                      type="radio"
                      name="perokok"
                      id="perokok_tidak"
                      value="tidak"
                      {{ $biodata2->perokok != 'iya' ? 'checked' :'' }}
                      required
                  />
                  <label class="form-check-label" for="perokok_tidak">
                   Tidak
                  </label>
                </span>
              </div>
              {{-- punya pacar --}}
              <div class="form-group mb-3">
                <label for="" class="d-block">Punya Pacar?</label>
                <span class="form-check d-inline mr-5">
                  <input
                      class="form-check-input"
                      type="radio"
                      name="punya_pacar"
                      id="punya_pacar_iya"
                      value="iya"
                      {{ $biodata2->punya_pacar == 'iya' ? 'checked' :'' }}
                      required
                  />
                  <label class="form-check-label" for="punya_pacar_iya">
                   Iya
                  </label>
                </span>
                <span class="form-check d-inline" >
                  <input
                      class="form-check-input"
                      type="radio"
                      name="punya_pacar"
                      id="punya_pacar_tidak"
                      value="tidak"
                      {{ $biodata2->punya_pacar != 'iya' ? 'checked' :'' }}
                      required
                  />
                  <label class="form-check-label" for="punya_pacar_tidak">
                   Tidak
                  </label>
                </span>
              </div>
              {{-- suka game --}}
              <div class="form-group mb-3">
                <label for="" class="d-block">Suka Game</label>
                <span class="form-check d-inline mr-5">
                  <input
                      class="form-check-input"
                      type="radio"
                      name="suka_game"
                      id="suka_game_iya"
                      value="iya"
                      {{ $biodata2->suka_game == 'iya' ? 'checked' :'' }}
                      required
                  />
                  <label class="form-check-label" for="suka_game_iya">
                   Iya
                  </label>
                </span>
                <span class="form-check d-inline" >
                  <input
                      class="form-check-input"
                      type="radio"
                      name="suka_game"
                      id="suka_game_tidak"
                      value="tidak"
                      {{ $biodata2->suka_game != 'iya' ? 'checked' :'' }}
                      required
                  />
                  <label class="form-check-label" for="suka_game_tidak">
                   Tidak
                  </label>
                </span>
              </div>
              {{-- jika suka --}}
              @if ($biodata2->suka_game == 'iya')
                <div class="form-group mb-3">
                  <label for="">Nama Game</label>
                  <input
                      type="text"
                      class="form-control"
                      value="{{ $biodata2->nama_game }}"
                      name="nama_game"
                      aria-describedby="emailHelp"
                      required
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="">Durasi Main Game</label>
                  <input
                      type="text"
                      class="form-control"
                      value="{{ $biodata2->waktu_game }}"
                      name="waktu_game"
                      aria-describedby="emailHelp"
                      required
                  />
                </div>
              @endif
              {{-- Punya Laptop --}}
              <div class="form-group mb-3">
                <label for="" class="d-block">Punya Laptop</label>
                <span class="form-check d-inline mr-5">
                  <input
                      class="form-check-input"
                      type="radio"
                      name="punya_laptop"
                      id="punya_laptop_iya"
                      value="iya"
                      {{ $biodata2->punya_laptop == 'iya' ? 'checked' :'' }}
                      required
                  />
                  <label class="form-check-label" for="punya_laptop_iya">
                   Iya
                  </label>
                </span>
                <span class="form-check d-inline" >
                  <input
                      class="form-check-input"
                      type="radio"
                      name="punya_laptop"
                      id="punya_laptop_tidak"
                      value="tidak"
                      {{ $biodata2->punya_laptop != 'iya' ? 'checked' :'' }}
                      required
                  />
                  <label class="form-check-label" for="punya_laptop_tidak">
                   Tidak
                  </label>
                </span>
              </div>
              {{-- izin Orang  tua --}}
              <div class="form-group mb-3">
                <label for="" class="d-block">Izin Orang Tua</label>
                <span class="form-check d-inline mr-5">
                  <input
                      class="form-check-input"
                      type="radio"
                      name="izin_ortu"
                      id="izin_ortu_iya"
                      value="iya"
                      {{ $biodata2->izin_ortu == 'iya' ? 'checked' :'' }}
                      required
                  />
                  <label class="form-check-label" for="izin_ortu_iya">
                   Iya
                  </label>
                </span>
                <span class="form-check d-inline" >
                  <input
                      class="form-check-input"
                      type="radio"
                      name="izin_ortu"
                      id="izin_ortu_tidak"
                      value="tidak"
                      {{ $biodata2->izin_ortu != 'iya' ? 'checked' :'' }}
                      required
                  />
                  <label class="form-check-label" for="izin_ortu_tidak">
                   Tidak
                  </label>
                </span>
              </div>
              {{-- setuju --}}
              <div class="form-group mb-3">
                <label for="" class="d-block">Setuju Dengan Ketetuan</label>
                <span class="form-check d-inline mr-5">
                  <input
                      class="form-check-input"
                      type="radio"
                      name="setuju"
                      id="setuju_iya"
                      value="1"
                      {{ $biodata2->setuju == 1 ? 'checked' :'' }}
                      required
                  />
                  <label class="form-check-label" for="setuju_iya">
                   Iya
                  </label>
                </span>
                <span class="form-check d-inline" >
                  <input
                      class="form-check-input"
                      type="radio"
                      name="setuju"
                      id="setuju_tidak"
                      value="tidak"
                      {{ $biodata2->setuju != 1 ? 'checked' :'' }}
                      required
                  />
                  <label class="form-check-label" for="setuju_tidak">
                   Tidak
                  </label>
                </span>
              </div>
              {{-- alasan mendaftar --}}
              <div class="form-group mb-3">
                <label for="">Alasan Mendaftar</label>
                <Textarea 
                  style="height: 150px;"
                  type="text"
                  class="form-control"
                  name="alasan_mendaftar" >
                  {{ $biodata2->alasan_mendaftar }}
                </Textarea>
              </div>
              {{-- kegiatan dari bangun sampai tidur --}}
              <div class="form-group mb-3">
                <label for="">Kegiatan Bangun Sampai TIdur</label>
                <textarea
                  style="height: 150px;"
                  type="text"
                  class="form-control"
                  name="kegiatan"
                >
                {{ $biodata2->kegiatan }}
                </textarea>
              </div>
              {{-- kepribadian --}}
              <div class="form-group mb-3">
                <label for="">Ceritakan Kepribadian</label>
                <textarea
                    style="height: 150px;"
                    type="text"
                    class="form-control"
                    name="kepribadian"  
                >
                    {{ $biodata2->kepribadian }}
                </textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <button class="btn btn-md btn-primary mx-3 my-5">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>            
</div>
@endsection
@push('end-script')
@php
  $kabupaten=App\Models\IndonesiaCity::all();
@endphp
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
<script>
function formdata(){
   const kabupatens=@json($kabupaten);
   return{
       // data
           provin_id:null,
           kabupatenids:[],                            
       // method
       getKabupaten(id){
           const dataKabupaten = kabupatens.filter((kabupaten) => kabupaten.province_id == id);
           this.kabupatenids=dataKabupaten;
           }
       
       }
   }
</script>  
@endpush
                            
                                