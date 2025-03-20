<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'users';   

    protected $fillable = [
        'name',
        'telepon',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
