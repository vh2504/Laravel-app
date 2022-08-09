<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //..
        Blade::directive('show_date', function ($value) {
            if (!$value) {
                return "";
            }

            return "<?php echo \Carbon\Carbon::parse({$value})->format(__('common.format_show_date')); ?>";
        });
    }
}
