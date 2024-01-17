<?php

namespace App\Modules\Admin\Brand\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Brand\Http\Requests\BrandRequest;
use App\Modules\Admin\Brand\Interfaces\BrandInterface;
use App\Modules\Admin\Brand\Models\Brand;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @BrandController
 */
class BrandController extends Controller
{
    protected $brand;
    const pathView = 'admin.pages.brand.';

    /**
     * @param BrandInterface $brand
     */
    public function __construct(BrandInterface $brand)
    {
        $this->brand = $brand;
    }

    /**
     * @param Request $request
     *
     * @return Application|Factory|View|JsonResponse
     */
    public function index(Request $request)
    {
        $brands = $this->brand->search($request);

        if ($request->ajax()) {
            $view = view(self::pathView.'table', compact('brands'))->render();
            $paginate = view('admin.pagination.index')->with(['data' => $brands])->render();

            return $this->responseSuccess(data: ['html' => $view, 'pagination' => $paginate]);
        }

        return view(self::pathView.'index', compact('brands'));
    }

    /**
     * @param Brand $brand
     *
     * @return Application|Factory|View
     */
    public function show(Brand $brand)
    {
        return view(self::pathView.'update', compact('brand'));
    }

    /**
     * @param BrandRequest $brandRequest
     *
     * @return JsonResponse
     */
    public function store(BrandRequest $brandRequest)
    {
        $result = $this->brand->handle($brandRequest);
        return $result ? $this->responseSuccess(message: __('response.success.create', ['name' => 'brand']))
            : $this->responseFailed(message: __('response.failed.create', ['name' => 'brand']));
    }

    /**
     * @param BrandRequest $brandRequest
     * @param $brand
     *
     * @return JsonResponse
     */
    public function update(BrandRequest $brandRequest, Brand $brand)
    {
        $result = $this->brand->handle($brandRequest, $brand);
        return $result ? $this->responseSuccess(message: __('response.success.update', ['name' => "brand $result->name"]),
            data: [ 'name' => $result->name, 'avatar' => $result->avatar, 'status' => $result->status])
            : $this->responseFailed(message: __('response.failed.update', ['name' => 'brand']));
    }

    /**
     * @param Brand $brand
     *
     * @return JsonResponse
     */
    public function delete(Brand $brand)
    {
        $result = $this->brand->delete($brand);

        if ($result) {
            $brands = $this->brand->paginate(5);
            return $this->responseSuccess(message: __('response.success.delete'), data: $brands);
        }

        return $this->responseFailed(message: __('response.failed.delete'));
    }
}
