<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\Setting;

class Peminjaman extends Model
{
    protected $table = 'peminjamen';
    protected $guarded = [];

    protected $casts = [
        'tanggal_pengembalian' => 'datetime',
        'tanggal_peminjaman' => 'datetime',
        'tanggal_harus_kembali' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($peminjaman) {
            $peminjaman->denda = $peminjaman->hitungDenda();
        });
    }


    public function hitungDenda()
    {
        if (!$this->tanggal_harus_kembali) {
            return 0;
        }

        $tanggalHarusKembali = Carbon::parse($this->tanggal_harus_kembali)->startOfDay();
        $tanggalPengembalian = now()->startOfDay(); // Denda berjalan setiap hari

        // Ambil denda per hari dari tabel settings
        $dendaPerHari = Setting::getValue('denda_per_hari', 5000);

        if ($this->status === 'dipinjam' && $tanggalPengembalian->greaterThan($tanggalHarusKembali)) {
            // Hitung denda harian secara berjalan
            $selisihHari = $tanggalHarusKembali->diffInDays($tanggalPengembalian);
            return $selisihHari * $dendaPerHari;
        }

        // Jika status sudah "dikembalikan", gunakan denda yang tersimpan di database
        return $this->denda ?? 0;
    }


    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    public function anggota()
    {
        return $this->belongsTo(User::class, 'anggota_id');
    }
}