<div class="container">
   <form action="{{ route('status-pendaftar.update', $biodata2->id) }}" x-data="formdata()" x-init="()=>{getKabupaten()}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
            <h6 class="section-title">Biodata</h6>
                <table cellpadding="5">
                    <tr>
                        <td style="width: 280px;" >Nama</td>
                        <input type="hidden" name="biodata1_id" value="{{ $biodata2->user->biodata1->id }}">
                        <td style="width: 800px;">
                            <input
                                type="text"
                                class="form-control"
                                id="nama"
                                name="nama"
                                value="{{ $biodata2->user->biodata1->nama }}"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Umur</td>
                        <td>
                            <input
                                type="number"
                                class="form-control"
                                value="{{ $biodata2->user->biodata1->umur }}"
                                name="umur"
                                aria-describedby="emailHelp"
                                required
                            />
                            </td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>
                            <input
                                type="date"
                                class="form-control"
                                value="{{ $biodata2->user->biodata1->tanggal_lahir }}"
                                name="tanggal_lahir"
                                aria-describedby="emailHelp"
                                required
                            />
                            </td>
                    </tr>
                    <tr>
                        <td>Hobi</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->hobi }}"
                                name="hobi"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Skill</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->skill }}"
                                name="skill"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>cita cita </td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->cita_cita }}"
                                name="cita_cita"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Pendidikan Terakhir</td>
                        <td>
                            <select name="pendidikan_terakhir" class="custom-select">
                                <option value="SD" {{ $biodata2->pendidikan_terakhir == 'SD' ? 'selected' :'' }}>SD SEDERAJAT</option>
                                <option value="SMP" {{ $biodata2->pendidikan_terakhir == 'SMP' ? 'selected' :'' }}>SMP SEDERAJAT</option>
                                <option value="SMA" {{ $biodata2->pendidikan_terakhir == 'SMA' ? 'selected' :'' }}>SMA SEDERAJAT</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Asal Sekolah</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->asal_sekolah }}"
                                name="asal_sekolah"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->jurusan }}"
                                name="jurusan"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Prestasi</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->prestasi }}"
                                name="prestasi"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Pengalaman Organisai</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->pengalaman_organisasi }}"
                                name="pengalaman_organisasi"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <div >
                        <tr>
                            <td>Provinsi</td>
                            @php
                                $provinsi=App\Models\IndonesiaProvince::all();
                                dd($biodata2->provinsi->name);
                            @endphp
                            <td>
                                <select name="indonesia_provinces_id" class="custom-select" x-on:change="getKabupaten(provin_id)" x-model="provin_id">
                                    {{-- <option value="{{ $biodata2->indonesia_provinces_id }}">{{ $biodata2->provinsi->name }}</option> --}}
                                    @foreach ($provinsi as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Kabupaten</td>
                            <td>
                                <select name="indonesia_cities_id" class="custom-select" >
                                        <option value="{{ $biodata2->indonesia_cities_id }}">{{ $biodata2->kabupaten->name }}</option>
                                    <template x-for="an in kabupatenids">
                                        <option :value="an.id"><span x-html="an.name"></span></option>
                                    </template>											
                                </select>
                            </td>
                        </tr>
                    </div>
                    <tr>
                        <td>Alamat Lengkap</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->alamt_lengkap }}"
                                name="alamt_lengkap"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                </table>
            </div>
    </div>
        <div class="row mt-4">
            <div class="col">
            <h6>Contact</h6>
                <table cellpadding="5">
                    <tr>
                        <td style="width: 280px;">No WhatsApp</td>
                        <td style="width: 800px;">
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->user->biodata1->no_wa }}"
                                name="no_wa"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Facebook</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->facebook }}"
                                name="facebook"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Instagram</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->instagram }}"
                                name="instagram"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
            <h6>Biodata Orang Tua</h6>
                <table cellpadding="5">
                    <tr>
                        <td style="width: 280px;">Orang Tua</td>
                        <td style="width: 800px;">
                            <select name="orang_tua" class="custom-select">
                                <option value="lengkap" {{ $biodata2->orang_tua == 'lengkap' ? 'selected' :'' }}>LENGKAP</option>
                                <option value="ayah" {{ $biodata2->orang_tua == 'ayah' ? 'selected' :'' }}>AYAH</option>
                                <option value="ibu" {{ $biodata2->orang_tua == 'ibu' ? 'selected' :'' }}>IBU</option>
                                <option value="yatim-piatu" {{ $biodata2->orang_tua == 'yatim-piatu' ? 'selected' :'' }}>YATIM-PIATU</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 280px;">Nama Ayah</td>
                        <td style="width: 800px;">
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->nama_ayah }}"
                                name="nama_ayah"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Ibu</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->nama_ibu }}"
                                name="nama_ibu"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Pekerjaan Ayah</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->pekerjaan_ayah }}"
                                name="pekerjaan_ayah"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Pekerjaan Ibu</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->pekerjaan_ibu }}"
                                name="pekerjaan_ibu"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Kondisi Keluarga</td>
                        <td>
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
                        </td>
                    </tr>
                    <tr>
                        <td>Penghasilan Ortu</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->penghasilan_ortu }}"
                                name="penghasilan_ortu"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah Saudara</td>
                        <td>
                            <input
                                type="number"
                                class="form-control"
                                value="{{ $biodata2->saudara }}"
                                name="saudara"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Anak Ke</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->anak_ke }}"
                                name="anak_ke"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>No Hp Wali</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->no_wali }}"
                                name="no_wali"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
            <h6>Pertanyaan 1</h6>
                <table cellpadding="5">
                    <tr>
                        <td style="width: 280px;">Jumlah Hafalan</td>
                        <td style="width: 800px;">
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->jumlah_hafalan }}"
                                name="jumlah_hafalan"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Tokoh Idola</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->tokoh_idola }}"
                                name="tokoh_idola"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Ustadz Idola</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->ustadz_idola }}"
                                name="ustadz_idola"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Dimana Allah ?</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->tauhid }}"
                                name="tauhid"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Kajian Yang Sering Di Hadiri</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->kajian }}"
                                name="kajian"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Buku Bacaan Favorit</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->buku }}"
                                name="buku"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
            <h6>Pertanyaan 2</h6>
                <table cellpadding="5">
                    <tr>
                        <td style="width: 280px;">Perokok</td>
                        <td style="width: 800px;">
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
                        </td>
                    </tr>
                    <tr>
                        <td>Punya Pacar</td>
                        <td>
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
                        </td>
                    </tr>
                    <tr>
                        <td>Suka Game ?</td>
                        <td>
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
                        </td>
                    </tr>
                    @if ($biodata2->suka_game == 'iya')
                        <tr>
                            <td>Nama Game</td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata2->nama_game }}"
                                    name="nama_game"
                                    aria-describedby="emailHelp"
                                    required
                                />
                            </td>
                    </tr>
                    <tr>
                        <td>Durasi Main Game</td>
                        <td>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $biodata2->waktu_game }}"
                                name="waktu_game"
                                aria-describedby="emailHelp"
                                required
                            />
                        </td>
                    </tr> 
                    @endif
                    <tr>
                        <td>Punya Laptop</td>
                        <td>
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
                        </td>
                    </tr>
                    <tr>
                        <td>Izin Orrang Tua</td>
                        <td>
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
                        </td>
                    </tr>
                    <tr>
                        <td>Srtuju dengan ketentuan</td>
                        <td>
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
                        </td>
                    </tr>
                </table>
            </div>
        </div>
         <div class="row mt-4">
            <div class="col">
             <h6>Pertanyaan 3</h6>
                <table cellpadding="5">
                    <tr>
                        <td style="width: 280px;">Alasan Mendaftar</td>
                        <td style="width: 800px;">
                            <textarea
                                
                                style="height: 150px;"
                                type="text"
                                class="form-control"
                                name="alasan_mendaftar"  
                            >
                                {{ $biodata2->alasan_mendaftar }}
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Kegiatan Dari Bangun Sampai Tidur</td>
                        <td>
                            <textarea
                                style="height: 150px;"
                                type="text"
                                class="form-control"
                                name="kegiatan"  
                            >
                                {{ $biodata2->kegiatan }}
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Kepribadian</td>
                        <td>
                            <textarea
                                style="height: 150px;"
                                type="text"
                                class="form-control"
                                name="kepribadian"  
                            >
                                {{ $biodata2->kepribadian }}
                            </textarea>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary btn-md mt-5 px-5 float-right">
                    Update
                </button>
            </div>
        </div>
   </form>    
</div>
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
