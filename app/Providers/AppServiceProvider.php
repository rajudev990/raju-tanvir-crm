<?php

namespace App\Providers;

use App\Models\Setting;
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
        $settings = Setting::first();

        if ($settings) {
            config([
                'services.stripe.key' => $settings->stripe_key,
                'services.stripe.secret' => $settings->stripe_secret,
            ]);
        }
    }
}
