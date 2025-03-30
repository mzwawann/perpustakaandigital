<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Buku extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $keyType = 'integer';
    protected $table = 'bukus'; 

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($buku) {
            $buku->id = (int) (now()->format('Ymd') . rand(10000000, 99999999));
        });

        static::deleting(function ($buku) {
            if ($buku->cover) {
                Storage::delete('uploads/covers/' . $buku->cover);
            }
        });
    }
    
    protected $fillable = [
        'judul_buku',
        'penulis',
        'penerbit',
        'description',
        'cover',
        'code_buku',
        'category_id',
        'rack_id',
        'tahun_terbit',
        'stock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function rack()
    {
        return $this->belongsTo(Rack::class);
    }

    public function favoritedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'buku_id');
    }


}
