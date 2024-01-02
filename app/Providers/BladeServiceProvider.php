<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('selisihTanggal', function ($expression) {
            // Isi dengan logika pemanggilan fungsi Anda di sini
            // Contoh:
            return "<?php echo selisihTanggal({$expression}); ?>";
        });
    }
}
