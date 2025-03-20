<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Buku;

class BukuChart extends ChartWidget
{
    protected static ?string $heading = 'Jumlah buku berdasarkan category';

    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $data = Buku::join('categories', 'bukus.category_id', '=', 'categories.id')
        ->selectRaw('categories.nama as category, COUNT(bukus.id) as jumlah')
        ->groupBy('categories.nama')
        ->pluck('jumlah', 'category'); 

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Buku',
                    'data' => $data->values(),
                    'backgroundColor' => ['#4CAF50', '#FF9800', '#2196F3', '#9C27B0'],
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
