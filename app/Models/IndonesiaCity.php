<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndonesiaCity extends Model
{
    use HasFactory;

    protected $table='indonesia_cities';

    public function biodata2()
    {
        return $this->hasMany(Biodata2::class,'id');
    }
}
