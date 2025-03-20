<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Peminjaman;

class PeminjamanChart extends ChartWidget
{
    protected static ?string $heading = 'Jumlah peminjaman';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = Peminjaman::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->map(fn($value) => (int) $value);

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Peminjaman',
                    'data' => $data->values(),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $data->keys()->map(fn ($bulan) => date("F", mktime(0, 0, 0, $bulan, 1)))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
