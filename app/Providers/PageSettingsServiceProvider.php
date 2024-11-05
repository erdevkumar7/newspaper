<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class PageSettingsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Use view composer to bind page settings to specific views
        View::composer(['*'], function ($view) {
            // $settings = DB::table('page_settings')
            //     ->whereIn('name', ['logo', 'address', 'email', 'telephone', 'payment_option', 'connect'])
            //     ->pluck('content', 'name');

            // Get logo from the `image` column
            $logoSetting = DB::table('page_settings')
                ->where('name', ['logo'])
                ->pluck('image', 'name');

            // Get other settings from the `content` column
            $contentSettings = DB::table('page_settings')
                ->whereIn('name', ['address', 'email', 'telephone', 'payment_option', 'connect'])
                ->pluck('content', 'name');
           
            // Merge both settings
            $settings = $logoSetting->merge($contentSettings);          
            $view->with([
                'logo_setting' => $settings['logo'] ?? null,
                'address_setting' => $settings['address'] ?? null,
                'email_setting' => $settings['email'] ?? null,
                'telephone_setting' => $settings['telephone'] ?? null,
                'payment_option_setting' => $settings['payment_option'] ?? null,
                'connect_setting' => $settings['connect'] ?? null,
            ]);
        });
    }

    public function register()
    {
        //
    }
}
