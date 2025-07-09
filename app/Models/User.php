<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // ... [fillable, hidden, casts] tetap seperti sebelumnya

    protected $fillable = [
        'name',
        'email',
        'password',
        'isAdmin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    // 🟢 Tambahkan ini
    public function getRoleTextAttribute()
    {
        return match ($this->isAdmin) {
            1 => 'Admin',
            2 => 'Guru',
            3 => 'Guru',
            4 => 'Guru',
            default => 'Siswa',
        };
    }
}
