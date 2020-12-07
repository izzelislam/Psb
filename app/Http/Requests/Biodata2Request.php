<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Biodata2Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tanggal_lahir'=>'required',
            'tempat_lahir'=>'required',
            'alamat_lengkap'=>'required',
            'indonesia_provinces_id'=>'required',
            'indonesia_cities_id'=>'required',
            'facebook'=>'required',
            'instagram'=>'required',
            'pendidikan_terakhir'=>'required',
            'asal_sekolah'=>'required',
            'jurusan'=>'required',
            'pengalaman_organisasi'=>'required',
            'prestasi'=>'required',
            'hobi'=>'required',
            'cita_cita'=>'required',
            'skill'=>'required',
            'jumlah_hafalan'=>'required',
            'tokoh_idola'=>'required',
            'ustadz_idola'=>'required',
            'tauhid'=>'required',
            'kajian'=>'required',
            'buku'=>'required',
            'perokok'=>'required',
            'punya_pacar'=>'required',
            'suka_game'=>'required',
            'alasan_mendaftar'=>'required',
            'kegiatan'=>'required',
            'kepribadian'=>'required',
            'orang_tua'=>'required',
            'nama_ayah'=>'required',
            'pekerjaan_ayah'=>'required',
            'nama_ibu'=>'required',
            'pekerjaan_ibu'=>'required',
            'penghasilan_ortu'=>'required',
            'anak_ke'=>'required',
            'saudara'=>'required',
            'no_wali'=>'required',
            'keterangan'=>'required',
            'izin_ortu'=>'required',
            'punya_laptop'=>'required',
            'setuju'=>'required',
            'status'=>'required',
        ];
    }
}
