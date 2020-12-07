<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table='chat';
    protected $fillable=['users_id','teman_id','pesan','read'];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }

    public function teman()
    {
        return $this->belongsTo(Teman::class,'teman_id','id');
    }
}
