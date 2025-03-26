<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use App\Models\Rack;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        // Ambil relasi review  

        // $query = Buku::with('reviews'); 

        $query = Buku::with([
            'reviews' => function ($query) {
                $query->where('is_hidden', false)->with('user');
            }
        ]);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('judul_buku', 'like', "%{$search}%")
                ->orWhere('penulis', 'like', "%{$search}%")
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('nama', 'like', "%{$search}%"); // Sesuaikan dengan nama kolom kategori
                })
                ->orWhereHas('rack', function ($query) use ($search) {
                    $query->where('rack_name', 'like', "%{$search}%"); // Sesuaikan dengan nama kolom kategori
                });
        }

        if ($request->has('category') && !empty($request->category)) {
            $query->where('category_id', $request->category);
        }

        $categories = Category::all();

        // Ambil buku dengan pagination
        $bukus = $query->orderBy('created_at', 'desc')->paginate(12);

        // Hitung rating untuk setiap buku
        $bukus->getCollection()->transform(function ($buku) {
            $totalRatings = $buku->reviews->count();
            $averageRating = $totalRatings > 0 ? round($buku->reviews->avg('rating'), 1) : 0;

            $buku->averageRating = $averageRating;
            $buku->totalRatings = $totalRatings;
            return $buku;
        });

        return view('bukus.koleksi-buku', compact('bukus', 'categories'));
    }


    public function show($id)
    {
        // Ambil buku beserta review yang tidak disembunyikan
        $buku = Buku::with([
            'reviews' => function ($query) {
                $query->where('is_hidden', false)->with('user');
            }
        ])->findOrFail($id);

        // Hitung total rating dan rata-rata rating hanya dari review yang tidak disembunyikan
        $totalRatings = $buku->reviews->count();
        $averageRating = $totalRatings > 0 ? round($buku->reviews->avg('rating'), 1) : 0;

        return view('bukus.buku', compact('buku', 'averageRating', 'totalRatings'));
    }

}
