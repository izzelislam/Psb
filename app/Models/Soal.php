<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table ='soal_iq';
    protected $fillable=['soal','gambar','a','b','c','d','e','kunci_jawaban'];
}
