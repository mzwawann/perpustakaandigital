<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Review;
use Filament\Widgets\StatsOverviewWidget\Card;

class BukuDanAnggotaWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Card::make('Total Buku', Buku::count())
                ->description('Jumlah buku dalam perpustakaan')
                ->icon('heroicon-o-book-open')
                ->color('primary'),
            Card::make('Total Anggota', User::where('role', 'user')->count())
                ->description('Jumlah anggota terdaftar')
                ->icon('heroicon-o-user-group')
                ->color('success'),
            Card::make('Total Peminjaman', Peminjaman::count())
                ->icon('heroicon-o-arrow-uturn-right')
                ->description('Jumlah peminjaman')
                ->color('warning'),
            Card::make('Rata-rata Rating Buku', number_format(Review::avg('rating'), 2))
                ->description('Rating rata-rata dari semua buku')
                ->icon('heroicon-o-star')
                ->color('info'),
        ];
    }
}
