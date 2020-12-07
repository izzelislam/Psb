<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function biodata2()
    {
        return $this->hasOne(Biodata2::class,'users_id')->withTrashed();
    }

    public function biodata1()
    {
        return $this->hasOne(Biodata1::class,'users_id')->withTrashed();
    }

    public function quis()
    {
        return $this->hasOne(Quis::class,'users_id')->withTrashed();
    }

    public function video()
    {
        return $this->hasOne(Video::class,'users_id')->withTrashed();
    }

    public function wawancara()
    {
        return $this->hasOne(Wawancara::class,'users_id')->withTrashed();
    }
}
