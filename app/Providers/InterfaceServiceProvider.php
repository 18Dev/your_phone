<?php

namespace App\Providers;

use App\Modules\Admin\Brand\Interfaces\BrandInterface;
use App\Modules\Admin\Brand\Services\BrandService;
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
