<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepribadian extends Model
{
    use HasFactory;

    protected $table='soal_kepribadian';
    protected $fillable=['soal','a','b','c','d','e','poin_a', 'poin_b', 'poin_c', 'poin_d', 'poin_e'];
}
