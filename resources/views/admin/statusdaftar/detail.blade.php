<div class="container">
    <div class="row">
        <div class="col">
        <h6 class="section-title">Biodata</h6>
            <table cellpadding="5">
                <tr>
                    <td style="width: 280px;" >Nama</td>
                    <td>{{ $biodata2->user->biodata1->nama }}</td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>{{ $biodata2->user->biodata1->umur }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>{{ $biodata2->user->biodata1->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td>Hobi</td>
                    <td>{{ $biodata2->hobi }}</td>
                </tr>
                <tr>
                    <td>cita-cita</td>
                    <td>{{ $biodata2->cita_cita }}</td>
                </tr>
                <tr>
                    <td>Pendidikan Terakhir</td>
                    <td>{{ $biodata2->pendidikan_terakhir }}</td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td>{{ $biodata2->asal_sekolah }}</td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>{{ $biodata2->jurusan }}</td>
                </tr>
                <tr>
                    <td>Prestasi</td>
                    <td>{{ $biodata2->prestasi }}</td>
                </tr>
                <tr>
                    <td>Pengalaman Organisai</td>
                    <td>{{ $biodata2->pengalaman_organisasi }}</td>
                </tr>
                <tr>
                    <td>Kabupaten</td>
                    <td>{{ $biodata2->kabupaten->name }}</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>{{ $biodata2->provinsi->name }}</td>
                </tr>
                <tr>
                    <td>Alamat Lengkap</td>
                    <td>{{ $biodata2->alamt_lengkap }}</td>
                </tr>
            </table>
        </div>
    </div>
    @if (isset($biodata2->user->quis) || isset($biodata2->user->video))
        <div class="row mt-4">
            <div class="col">
            <h6>Nilai</h6>
                <table cellpadding="5">
                    <tr>
                        <td style="width: 280px;">Nilai Tes Iq</td>
                        <td>{{ $biodata2->user->quis->nilai_tes_iq }}</td>
                    </tr>
                    <tr>
                        <td style="width: 280px;">Nilai Tes Kepribadian</td>
                        <td>{{ $biodata2->user->quis->nilai_tes_kepribadian }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @if (isset($biodata2->user->video))
            <div class="row mt-4">
                <div class="col">
                <h6>Video</h6>
                    <table cellpadding="5">
                        <tr>
                            <td style="width: 280px;">Link Viedo</td>
                            <td><a href="{{ $biodata2->user->video->link }}">{{ $biodata2->user->video->link }}</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        @endif
    @endif
    <div class="row mt-4">
        <div class="col">
        <h6>Contact</h6>
            <table cellpadding="5">
                <tr>
                    <td style="width: 280px;">No WhatsApp</td>
                    <td>{{ $biodata2->user->biodata1->no_wa }}</td>
                </tr>
                <tr>
                    <td>Facebook</td>
                    <td><a href="{{ $biodata2->facebook }}" target="blank">{{ $biodata2->facebook }}</a></td>
                </tr>
                <tr>
                    <td>Instagram</td>
                    <td><a href="{{ $biodata2->instagram }}" target="blank">{{ $biodata2->instagram }}</a></td>
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
                    <td>{{ $biodata2->orang_tua }}</td>
                </tr>
                <tr>
                    <td >Nama Ayah</td>
                    <td>{{ $biodata2->nama_ayah }}</td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>{{ $biodata2->nama_ibu }}</td>
                </tr>
                <tr>
                    <td>Kondidi Keluarga</td>
                    <td>{{ $biodata2->user->biodata1->keluarga }}</td>
                </tr
                <tr>
                    <td>Pekerjaan Ayah</td>
                    <td>{{ $biodata2->pekerjaan_ayah }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan Ibu</td>
                    <td>{{ $biodata2->pekerjaan_ibu }}</td>
                </tr>
                <tr>
                    <td>Penghasilan Ortu</td>
                    <td>Rp.{{ $biodata2->penghasilan_ortu }}</td>
                </tr>
                <tr>
                    <td>Jumlah Saudara</td>
                    <td>{{ $biodata2->saudara }}</td>
                </tr>
                <tr>
                    <td>Anak Ke</td>
                    <td>{{ $biodata2->anak_ke }}</td>
                </tr>
                <tr>
                    <td>No Hp Wali</td>
                    <td>{{ $biodata2->no_wali }}</td>
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
                    <td>{{ $biodata2->jumlah_hafalan }}</td>
                </tr>
                <tr>
                    <td>Tokoh Idola</td>
                    <td>{{ $biodata2->tokoh_idola }}</td>
                </tr>
                <tr>
                    <td>Ustadz Idola</td>
                    <td>{{ $biodata2->ustadz_idola }}</td>
                </tr>
                <tr>
                    <td>Dimana Allah ?</td>
                    <td>{{ $biodata2->tauhid }}</td>
                </tr>
                <tr>
                    <td>Kajian Yang Sering Di Hadiri</td>
                    <td>{{ $biodata2->kajian }}</td>
                </tr>
                <tr>
                    <td>Buku Bacaan Favorit</td>
                    <td>{{ $biodata2->buku }}</td>
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
                    <td>{{ $biodata2->perokok }}</td>
                </tr>
                <tr>
                    <td>Punya Pacar</td>
                    <td>{{ $biodata2->punya_pacar }}</td>
                </tr>
                <tr>
                    <td>Suka Game ?</td>
                    <td>{{ $biodata2->suka_game }}</td>
                </tr>
                @if ($biodata2->suka_game == 'iya')
                    <tr>
                        <td>Nama Game</td>
                        <td>{{ $biodata2->nama_game }} &nbsp; Jam</td>
                   </tr>
                   <tr>
                        <td>Durasi Main Game</td>
                        <td>{{ $biodata2->waktu_game }} &nbsp; Jam</td>
                   </tr> 
                @endif
                <tr>
                    <td>Punya Laptop</td>
                    <td>{{ $biodata2->punya_laptop }}</td>
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
                    <td>{{ $biodata2->alasan_mendaftar }}</td>
                </tr>
                <tr>
                    <td>Kegiatan Dari Bangun Sampai Tidur</td>
                    <td>{{ $biodata2->kegiatan }}</td>
                </tr>
                <tr>
                    <td>Kepribadian</td>
                    <td>{{ $biodata2->kepribadian }}</td>
                </tr>
            </table>
        </div>
    </div>
    
</div>
