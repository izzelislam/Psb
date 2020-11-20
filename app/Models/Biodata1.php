<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata1 extends Model
{
    use HasFactory;

    protected $table = 'biodata_1';
    
    protected $fillable=[
        'users_id',
        'tahun_ajaran_id',
        'nama',
        'keluarga',
        'umur',
        'no_wa',
        'jenis_kelamin'];

    public function user()
    {
        return $this->belongsTo(User::class,'id','users_id');
    }

    public function tahun_ajaran()
    {
        return $this->belongsTo('App\Models\TahunAjaran','tahun_ajaran_id','id');
    }
    
    public function scopeTahunAjaran($query)
    {
        $query->with(['tahun_ajaran'=>function($query){
            $query->where('status','=','aktif');
        }]);
    }
}
