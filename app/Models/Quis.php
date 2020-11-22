<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quis extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    protected $fillable = ['users_id','tahun_ajaran_id','nilai_tes_iq','nilai_tes_kepribadian','status'];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }

    public function tahun_ajaran()
    {
        return $this->belongsTo(TahunAjaran::class,'tahun_ajaran_id','id');
    }
}
