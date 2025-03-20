<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;

use Filament\Panel;
use Filament\Panel\Concerns\HasBrandLogo;
use Filament\Panel\Concerns\HasBrandName;

class FilamentBrand
{
    public static function brandName(): string
    {
        $user = Auth::user();

        if ($user) {
            return $user->role === 'admin' ? 'Admin Dashboard' : 'Petugas Dashboard';
        }

        return 'Panel'; 
    }
}
