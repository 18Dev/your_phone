<?php

namespace App\Modules\Admin\ProductSmartPhonePrice\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Modules\Admin\ProductSmartPhonePrice\Http\Requests\ProductSmartPhonePriceRequest;
use App\Modules\Admin\ProductSmartPhonePrice\Interfaces\ProductSmartPhonePriceInterface;
use App\Modules\Admin\ProductSmartPhonePrice\Models\ProductSmartPhonePrice;

/**
 * @ProductSmartPhonePriceController
 */
class ProductSmartPhonePriceController extends Controller
{
    protected $productsmartphoneprice;

    /**
     * @param ProductSmartPhonePriceInterface $productsmartphoneprice
     */
    public function __construct(ProductSmartPhonePriceInterface $productsmartphoneprice)
    {
        $this->productsmartphoneprice = $productsmartphoneprice;
    }
}
