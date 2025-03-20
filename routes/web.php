<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\FavoriteController;
use App\Http\Middleware\RedirectIfAdminOrPetugas;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

Route::get('/admin-only', function () {
    return "Halaman Admin";
})->middleware(EnsureAdmin::class);

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard')->middleware(RedirectIfAdminOrPetugas::class);

Route::get('/settings', function () {
    return view('settings');
})->name('settings')->middleware(['auth', RedirectIfAdminOrPetugas::class]);

Route::get('/about', function () {
    return view('about');
})->name('about')->middleware(RedirectIfAdminOrPetugas::class);

Route::get('/bukus', [BukuController::class, 'index'])->name('bukus.index')->middleware(['auth', RedirectIfAdminOrPetugas::class]);

Route::get('/bukus.form-peminjaman', function () {
    return view('bukus.form-peminjaman');
})->middleware(['auth', RedirectIfAdminOrPetugas::class])->name('bukus.form-peminjaman');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(['guest'])
    ->name('login');

Route::get('/bukus.koleksi-buku', [BukuController::class, 'index'])->name('bukus.koleksi-buku')->middleware(RedirectIfAdminOrPetugas::class);

Route::get('/bukus.buku/{id}', [BukuController::class, 'show'])->name('buku.show')->middleware(RedirectIfAdminOrPetugas::class);

Route::middleware('auth')->group(function () {
    Route::post('/favorite/{bukuId}', [FavoriteController::class, 'toggleFavorite'])->name('favorite.toggle')->middleware(['auth', RedirectIfAdminOrPetugas::class]);
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index')->middleware(['auth', RedirectIfAdminOrPetugas::class]);
});

use App\Http\Controllers\PeminjamanController;

Route::get('/bukus/form-peminjaman/{id}', [PeminjamanController::class, 'formPeminjaman'])
    ->name('bukus.formPeminjaman')->middleware(['auth', RedirectIfAdminOrPetugas::class]);

Route::post('/peminjaman/{id}', [PeminjamanController::class, 'store'])->name('peminjaman.store')->middleware(['auth', RedirectIfAdminOrPetugas::class]);

Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index')->middleware(['auth', RedirectIfAdminOrPetugas::class]);

Route::get('/peminjaman/{id}', [PeminjamanController::class, 'show'])->name('peminjaman.show')->middleware(['auth', RedirectIfAdminOrPetugas::class]);

use App\Http\Controllers\ReviewController;

Route::post('/review/{buku_id}', [ReviewController::class, 'store'])->name('review.store')->middleware(['auth', RedirectIfAdminOrPetugas::class]);
Route::get('/reviews/create/{buku_id}', [ReviewController::class, 'create'])->name('reviews.create')->middleware(['auth', RedirectIfAdminOrPetugas::class]);
// Route::get('/review/{buku}', [ReviewController::class, 'create'])->name('review.form');













