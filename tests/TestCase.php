<?php

declare(strict_types=1);

namespace SharpAPI\EcommerceProductCategories\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use SharpAPI\EcommerceProductCategories\EcommerceProductCategoriesProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [EcommerceProductCategoriesProvider::class];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('sharpapi-ecommerce-product-categories.api_key', 'test-key');
    }
}
