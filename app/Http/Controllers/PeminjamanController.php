<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{

    public function index()
    {
        $peminjaman = Peminjaman::where('anggota_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        // Update denda secara otomatis
        $dendaPerHari = DB::table('settings')->where('key', 'denda_per_hari')->value('value') ?? 5000;
        
        foreach ($peminjaman as $item) {
            if ($item->status === 'dipinjam' && $item->tanggal_harus_kembali < now()) {
                $hariTerlambat = now()->diffInDays(Carbon::parse($item->tanggal_harus_kembali));
                $item->denda = $hariTerlambat * $dendaPerHari;
                $item->save();
            }
        }
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function store(Request $request, $bukuId)
    {
        $buku = Buku::findOrFail($bukuId);

        if ($buku->stock <= 0) {
            return redirect()->back()->with('error', 'Buku ini sedang tidak tersedia untuk dipinjam.');
        }

        $request->validate([
            'tanggal_peminjaman' => 'required|date|after_or_equal:today',
            'tanggal_harus_kembali' => 'required|date|after:tanggal_peminjaman',
        ]);

        Peminjaman::create([
            'buku_id' => $bukuId,
            'anggota_id' => Auth::id(),
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_harus_kembali' => $request->tanggal_harus_kembali,
            'status' => 'menunggu konfirmasi',
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diajukan!');
    }

    public function formPeminjaman($id)
    {
        $buku = Buku::findOrFail($id);
        $tanggalHariIni = now()->format('Y-m-d');
        return view('bukus.form-peminjaman', compact('buku', 'tanggalHariIni'));
    }
}   
