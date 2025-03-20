<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create($buku_id)
    {
        $buku = Buku::findOrFail($buku_id);
        return view('reviews.create', compact('buku'));
    }

    public function store(Request $request, $buku_id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'buku_id' => $buku_id,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('buku.show', $buku_id)->with('success', 'Review berhasil ditambahkan.');
    }

}
