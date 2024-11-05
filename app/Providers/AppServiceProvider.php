<?php

namespace App\Providers;
use App\Models\GeneralSettings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\Adress;
use App\Policies\AddressPolicy;
use App\Models\Product;
use App\Policies\ProductPolicy;
use Illuminate\Support\Facades\Gate;

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
        
        Gate::policy(Product::class, ProductPolicy::class);
        
        
        Paginator::useBootstrapFive();

        /** Set Time Zone */
        $generaleSettings = GeneralSettings::first();
        Config::set('app.timezone', $generaleSettings->time_zone);

        /** Share Variable In All Views  */

        View::composer('*', function($view) use ($generaleSettings){
            $view->with('settings', $generaleSettings);
        });
    }
}
