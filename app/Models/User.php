<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    protected $hidden = [
        'password',
    ];

    // Relasi: User punya banyak kehadiran
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    // Relasi: User punya banyak kehadiran lewat shift
    public function shifts()
    {
        return $this->belongsToMany(Shift::class, 'attendances');
    }
}
