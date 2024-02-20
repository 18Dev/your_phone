<?php

namespace App\Modules\Admin\ProductSmartPhonePrice\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Modules\Admin\ProductSmartPhonePrice\Interfaces\ProductSmartPhonePriceInterface;
use App\Modules\Admin\ProductSmartPhonePrice\Models\ProductSmartPhonePrice;
use App\Modules\Media\Interfaces\MediaInterface;
use App\Services\BaseService;

/**
 * @ProductSmartPhonePriceService
 */
class ProductSmartPhonePriceService extends BaseService implements ProductSmartPhonePriceInterface
{
    protected $media;

    /**
     * @param ProductSmartPhonePrice $productsmartphoneprice
     * @param MediaInterface $media
     */
    public function __construct(ProductSmartPhonePrice $productsmartphoneprice, MediaInterface $media)
    {
        $this->model = $productsmartphoneprice;
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
                // TODO param directory
                $media = $this->media->upload($request->file('avatar'), FILESYSTEM_DISK_MEDIA, ??);
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
