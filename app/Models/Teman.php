<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teman extends Model
{
    use HasFactory;

    protected $table='teman';
    protected $fillable=['users_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }

    public function chat()
    {
        return $this->hasMany(Chat::class);
    }
}
