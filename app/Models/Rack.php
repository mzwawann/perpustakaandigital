<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rack extends Model
{
    use HasFactory;

    protected $fillable = ['rack_name'];

    public function books()
    {
        return $this->hasMany(Buku::class);
    }
}
