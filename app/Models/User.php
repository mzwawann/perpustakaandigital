<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Favorite;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


// class User extends Authenticatable implements MustVerifyEmail
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

     protected $primaryKey = 'id';
     public $incrementing = false; 
     protected $keyType = 'integer';
 
     protected static function boot()
     {
         parent::boot();
 
         static::creating(function ($buku) {
             $buku->id = (int) (now()->format('Ymd') . rand(10000000, 99999999));
         });
     }

    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'telepon',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function favorites()
    {
        return $this->belongsToMany(Buku::class, 'favorites', 'user_id', 'buku_id')->withTimestamps();
    }

    public function anggota()
    {
        return $this->hasOne(Anggota::class, 'user_id');
    }

}
