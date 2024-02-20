<?php

namespace App\Modules\Admin\ProductSmartPhoneAttr\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Modules\Admin\ProductSmartPhoneAttr\Http\Requests\ProductSmartPhoneAttrRequest;
use App\Modules\Admin\ProductSmartPhoneAttr\Interfaces\ProductSmartPhoneAttrInterface;
use App\Modules\Admin\ProductSmartPhoneAttr\Models\ProductSmartPhoneAttr;

/**
 * @ProductSmartPhoneAttrController
 */
class ProductSmartPhoneAttrController extends Controller
{
    protected $productsmartphoneattr;

    /**
     * @param ProductSmartPhoneAttrInterface $productsmartphoneattr
     */
    public function __construct(ProductSmartPhoneAttrInterface $productsmartphoneattr)
    {
        $this->productsmartphoneattr = $productsmartphoneattr;
    }
}
