<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='video';
    protected $fillable=['users_id','tahun_ajaran_id','link','status'];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id','id')->withTrashed();
    }

    public function tahun_ajaran()
    {
        return $this->belongsTo(TahunAjaran::class,'tahun_ajaran_id','id')->withTrashed();
    }
}
