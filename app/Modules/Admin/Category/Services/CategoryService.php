<?php

namespace App\Modules\Admin\Category\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Modules\Admin\Category\Interfaces\CategoryInterface;
use App\Modules\Admin\Category\Models\Category;
use App\Modules\Media\Interfaces\MediaInterface;
use App\Services\BaseService;

/**
 * @CategoryService
 */
class CategoryService extends BaseService implements CategoryInterface
{
    protected $media;

    /**
     * @param Category $category
     * @param MediaInterface $media
     */
    public function __construct(Category $category, MediaInterface $media)
    {
        $this->model = $category;
        $this->media = $media;
    }

//    /**
//    * @param $update
//    * @param $request
//    * @param $model
//    *
//    * @return bool
//    */
//    private function uploadAvatar($update, $request, $model): bool
//    {
//        if ($update) {
//            if ($request->hasFile('avatar')) {
//                // TODO param directory
//                $media = $this->media->upload($request->file('avatar'), FILESYSTEM_DISK_MEDIA, ??);
//            }
//            if (!empty($media) && $model->hasMedia(TAG_AVATAR)) {
//                $this->media->deleteExistingFile($model->getMedia(TAG_AVATAR)->first());
//            }
//            empty($media) ?: $model->syncMedia($media, TAG_AVATAR);
//
//            return true;
//        }
//
//        return false;
//    }

}
