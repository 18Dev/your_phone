<?php

namespace App\Providers;

use App\Modules\Admin\Brand\Interfaces\BrandInterface;
use App\Modules\Admin\Brand\Services\BrandService;
use App\Modules\Admin\Category\Interfaces\CategoryInterface;
use App\Modules\Admin\Category\Services\CategoryService;
use App\Modules\Admin\Product\Interfaces\ProductInterface;
use App\Modules\Admin\Product\Services\ProductService;
use App\Modules\Media\Interfaces\MediaInterface;
use App\Modules\Media\Services\MediaService;
use Illuminate\Support\ServiceProvider;

class InterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BrandInterface::class, BrandService::class);
        $this->app->bind(MediaInterface::class, MediaService::class);
        $this->app->bind(ProductInterface::class, ProductService::class);
        $this->app->bind(CategoryInterface::class, CategoryService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
