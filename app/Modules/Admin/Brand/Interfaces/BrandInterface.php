<?php

namespace App\Modules\Admin\Brand\Interfaces;

/**
 * @BrandInterface
 */
interface BrandInterface
{
    public function handle($request, $brand);
    public function delete($brand);
    public function search($request);
}
