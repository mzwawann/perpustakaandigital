<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Buku;
use Filament\Widgets\ChartWidget;

class BukuBulananChart extends ChartWidget
{
    protected static ?string $heading = 'Jumlah buku masuk';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = Buku::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as bulan, COUNT(*) as jumlah')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('jumlah', 'bulan');

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Buku',
                    'data' => $data->values(),
                    'backgroundColor' => '#4CAF50',
                ],
            ],
            'labels' => $data->keys(),
            
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
