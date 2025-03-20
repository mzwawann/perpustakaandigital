<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggleFavorite($bukuId)
    {
        $user = Auth::user();
        $buku = Buku::findOrFail($bukuId);

        if ($user->favorites()->where('buku_id', $bukuId)->exists()) {
            $user->favorites()->detach($bukuId);
            $status = 'removed';
            $message = 'Buku dihapus dari favorit.';
        } else {
            $user->favorites()->attach($bukuId);
            $status = 'added';
            $message = 'Buku ditambahkan ke favorit.';
        }

        // Cek apakah request berasal dari AJAX
        if (request()->expectsJson()) {
            return response()->json(['status' => $status]);
        }

        // Jika bukan AJAX, redirect ke halaman daftar favorit dengan pesan sukses
        return redirect()->route('favorites.index')->with('success', $message);
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $favorites = Auth::user()->favorites()->orderBy('pivot_created_at', 'desc')->get();
        
        return view('favorites.index', compact('favorites'));
    }

}


