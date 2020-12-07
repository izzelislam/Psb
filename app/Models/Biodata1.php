<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biodata1 extends Model
{
    use HasFactory;
    use SoftDeletes;

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
        return $this->belongsTo(User::class,'users_id','id')->withTrashed();
    }

    public function tahun_ajaran()
    {
        return $this->belongsTo(TahunAjaran::class,'tahun_ajaran_id','id')->withTrashed();
    }
    
    public function scopeTahunAjaran($query)
    {
        $query->with(['tahun_ajaran'=>function($query){
            $query->where('status','=','aktif');
        }]);
    }
}
