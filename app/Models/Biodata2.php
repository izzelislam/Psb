<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata2 extends Model
{
    use HasFactory;

    protected $table='biodata_2';

    protected $fillable =[
        'users_id','tahun_ajaran_id','tanggal_lahir','tempat_lahir',
        'alamt_lengkap','indonesia_provinces_id','indonesia_cities_id',
        'facebook','instagram','pendidikan_terakhir','asal_sekolah','jurusan',
        'pengalaman_organisasi','prestasi','hobi','cita_cita','skill','jumlah_hafalan',
        'tokoh_idola','ustadz_idola','tauhid','kajian','buku','perokok','punya_pacar','suka_game',
        'nama_game','waktu_game','alasan_mendaftar','kegiatan','kepribadian','orang_tua',
        'nama_ayah','pekerjaan_ayah','nama_ibu','pekerjaan_ibu','penghasilan_ortu','anak_ke',
        'saudara','no_wali','keterangan','izin_ortu','punya_laptop','setuju','status'
    ];

    public function tahun_ajaran()
    {
        return $this->belongsTo('App\Models\TahunAjaran','tahun_ajaran_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }

    public function kabupaten()
    {
        return $this->belongsTo(IndonesiaCity::class,'indonesia_cities_id','id');
    }

    public function provinsi()
    {
        return $this->belongsTo(IndonesiaProvince::class,'indonesia_provinces_id','id');
    }
}
