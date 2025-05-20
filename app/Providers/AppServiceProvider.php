<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Blade::directive('formatDate', function ($expression) {
            return "<?php echo Date::parse($expression)->format('jS M Y'); ?>";
        });

        Blade::directive('formatDateTime', function ($expression) {
            return "<?php echo Date::parse($expression)->format('jS M Y h:i A'); ?>";
        });

        Blade::directive('formatCurrency', function ($expression) {
            return "<?php echo '₦' . number_format($expression, 0, '.', ','); ?>";
        });
        JsonResource::withoutWrapping();
    }
}
