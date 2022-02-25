<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\About;
use Illuminate\Contracts\Cache\Factory;

class AboutServiceProvider extends ServiceProvider
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
    public function boot(Factory $cache, About $about)
    {
        $about = $cache->remember('settings', 60, function() use ($about){
            // Laravel >= 5.2, use 'lists' instead of 'pluck' for Laravel <= 5.1
            return $about->pluck('value', 'name')->all();
        });
        config()->set('about', $about);
    }
}
