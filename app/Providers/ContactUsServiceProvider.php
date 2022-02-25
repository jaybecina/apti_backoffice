<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ContactUs;
use Illuminate\Contracts\Cache\Factory;

class ContactUsServiceProvider extends ServiceProvider
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
    public function boot(Factory $cache, ContactUs $contact_us)
    {
        $contact_us = $cache->remember('contact_us_settings', 60, function() use ($contact_us){
            // Laravel >= 5.2, use 'lists' instead of 'pluck' for Laravel <= 5.1
            return $contact_us->pluck('value', 'name')->all();
        });
        config()->set('contact_us', $contact_us);
    }
}
