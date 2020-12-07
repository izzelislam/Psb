<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahunAjaran extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table= 'tahun_ajaran';

    protected $fillable =['tahun','gelombang','status'];

    public function biodata1()
    {
        return $this->hasMany(Biodata1::class)->withTrashed();
    }

    public function biodata2()
    {
        return $this->hasMany(Biodata2::class)->withTrashed();
    }

    public function quis()
    {
        return $this->hasMany(Quis::class)->withTrashed();
    }

    public function video()
    {
        return $this->hasMany(Video::class)->withTrashed();
    }

    public function wawancara()
    {
        return $this->hasMany(Wawancara::class)->withTrashed();
    }
}
