<?php

namespace App\Modules\Admin\ProductSmartPhoneAttr\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Modules\Admin\ProductSmartPhoneAttr\Interfaces\ProductSmartPhoneAttrInterface;
use App\Modules\Admin\ProductSmartPhoneAttr\Models\ProductSmartPhoneAttr;
use App\Modules\Media\Interfaces\MediaInterface;
use App\Services\BaseService;

/**
 * @ProductSmartPhoneAttrService
 */
class ProductSmartPhoneAttrService extends BaseService implements ProductSmartPhoneAttrInterface
{
    protected $media;

    /**
     * @param ProductSmartPhoneAttr $productsmartphoneattr
     * @param MediaInterface $media
     */
    public function __construct(ProductSmartPhoneAttr $productsmartphoneattr, MediaInterface $media)
    {
        $this->model = $productsmartphoneattr;
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
