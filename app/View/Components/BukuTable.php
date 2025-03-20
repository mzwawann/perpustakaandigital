<?php

namespace App\View\Components;

use Closure;
use App\Models\Buku;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class BukuTable extends Component
{
    public $bukus;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->bukus = Buku::all(); // Mengambil semua data buku
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buku-table');
    }
}
