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
        return $this->hasMany('App\Models\Biodata1','id');
    }

    public function biodata2()
    {
        return $this->hasMany('App\Models\Biodata2','id');
    }
}
