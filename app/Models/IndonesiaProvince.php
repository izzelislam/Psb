<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndonesiaProvince extends Model
{
    use HasFactory;

    public function biodata2()
    {
        return $this->hasMany(Biodata2::class,'id');
    }
}
