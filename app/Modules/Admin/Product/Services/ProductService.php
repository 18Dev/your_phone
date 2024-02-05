<?php

namespace App\Modules\Admin\Product\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Modules\Admin\Product\Interfaces\ProductInterface;
use App\Modules\Admin\Product\Models\Product;
use App\Modules\Media\Interfaces\MediaInterface;
use App\Services\BaseService;

/**
 * @ProductService
 */
class ProductService extends BaseService implements ProductInterface
{
    protected $media;

    /**
     * @param Product $product
     * @param MediaInterface $media
     */
    public function __construct(Product $product, MediaInterface $media)
    {
        $this->model = $product;
        $this->media = $media;
    }

    /**
    * @param $update
    * @param $request
    * @param $model
    *
    * @return bool
    */
    private function uploadAvatar($update, $request, $model): bool
    {
        if ($update) {
            if ($request->hasFile('avatar')) {
                $media = $this->media->upload($request->file('avatar'), FILESYSTEM_DISK_MEDIA, 'product');
            }
            if (!empty($media) && $model->hasMedia(TAG_AVATAR)) {
                $this->media->deleteExistingFile($model->getMedia(TAG_AVATAR)->first());
            }
            empty($media) ?: $model->syncMedia($media, TAG_AVATAR);

            return true;
        }

        return false;
    }
}
