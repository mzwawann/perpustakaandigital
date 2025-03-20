<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Peminjaman;
use App\Models\Setting;
use Carbon\Carbon;

class UpdateDendaHarian extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'denda:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update denda setiap hari jika status masih dipinjam';

    /**
     * Execute the console command.
     */
    
    public function handle()
    {
        $dendaPerHari = Setting::where('key', 'denda_per_hari')->value('value') ?? 5000;
        $today = Carbon::now()->startOfDay();

        $peminjamanTerlambat = Peminjaman::where('status', 'dipinjam')
            ->whereDate('tanggal_harus_kembali', '<', $today)
            ->get();

        foreach ($peminjamanTerlambat as $peminjaman) {
            $tanggalHarusKembali = Carbon::parse($peminjaman->tanggal_harus_kembali)->startOfDay();
            $hariTerlambat = $tanggalHarusKembali->diffInDays($today);

            // Update denda hanya jika ada keterlambatan
            if ($hariTerlambat > 0) {
                $peminjaman->update([
                    'denda' => $hariTerlambat * $dendaPerHari
                ]);
            }
        }

        $this->info('Denda berhasil diperbarui!');
    }
}
