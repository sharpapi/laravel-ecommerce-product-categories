<?php

declare(strict_types=1);

namespace SharpAPI\EcommerceProductCategories;

use Illuminate\Support\ServiceProvider;

/**
 * @api
 */
class EcommerceProductCategoriesProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/sharpapi-ecommerce-product-categories.php' => config_path('sharpapi-ecommerce-product-categories.php'),
            ], 'sharpapi-ecommerce-product-categories');
        }
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        // Merge the package configuration with the app configuration.
        $this->mergeConfigFrom(
            __DIR__.'/../config/sharpapi-ecommerce-product-categories.php', 'sharpapi-ecommerce-product-categories'
        );
    }
}
