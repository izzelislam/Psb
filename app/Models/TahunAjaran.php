<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;

    protected $table= 'tahun_ajaran';

    protected $fillable =['tahun','gelombang','status'];

    public function biodata1()
    {
        return $this->hasMany(Biodata1::class,'id');
    }

    public function biodata2()
    {
        return $this->hasMany(Biodata2::class,'id');
    }

    public function quis()
    {
        return $this->hasMany(Quis::class,'id');
    }
}
